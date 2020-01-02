<?php

namespace App\Http\Controllers\API;

use App\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'error' => false,
            'enquiries'  => Enquiry::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'enquiry' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $customer = new Customer();
            $customer->customer_name = $request->name;
            $customer->tel_no = $request->tel;
            $customer->email = $request->email;
            $customer->message = $request->enquiry;
            $customer->save();

            $enquiry = new Enquiry();
            $enquiry->vehicle = $request->vehicle;
            $enquiry->customer_name = $request->name;
            $enquiry->sales_person = Auth::user()->name;
            $enquiry->enquiry_type = $request->enquiry_type;
            $enquiry->enquiry_status = $request->enquiry_status;
            $enquiry->enquiry_source = $request->enquiry_source;
            $enquiry->save();
    
            return response()->json([
                'error' => false,
                'customer'  => $customer,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        if(is_null($employee)){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $id not found",
            ], 404);
        }

        return response()->json([
            'error' => false,
            'employee'  => $employee,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($id != null) {
            Customer::where('id', $id)->update($request->all());  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != null) {
            $product = Customer::find($id);
            $product->delete();    
        }
    }
}
