<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        return view('index', [ 'enquiries' => Enquiry::findOrFail($id)]);
    }
}
