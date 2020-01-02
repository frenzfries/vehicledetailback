<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <h1>ENQUIRIES</h1>

            <!-- Table to output data -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>VEHICLE</th>
                        <th>CUSTOMER NAME</th>
                        <th>SALES PERSON</th>
                        <th>DATE/TIME</th>
                        <th>ENQUIRY TYPE</th>
                        <th>ENQUIRY STATUS</th>
                        <th>ENQUIRY SOURCE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach ($enquiries as $enquiry)
                        <td>{{ $enquiry->vehicle }}</td>
                        <td>{{ $enquiry->customer_name }}</td>
                        <td>{{ $enquiry->sales_person }}</td>
                        <td>{{ $enquiry->date_timestamp_get }}</td>
                        <td>{{ $enquiry->enquiry_type }}</td>
                        <td>{{ $enquiry->enquiry_status }}</td>
                        <td>{{ $enquiry->enquiry_source }}</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                            <button class="btn btn-primary">Edit</button>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>

            <hr />

        </div>    
    </div>
</div>  