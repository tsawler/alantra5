@extends('vcms5::base')

@section('top-white')
    <h1>Request for Quotation</h1>
@stop

@section('content-title')

@stop

@section('content')
    <p>The following request for a quotation was received from the website on {!! $quote->created_at !!}:</p>

    <div class="panel panel-success">
        <div class="panel-heading">Request for Quotation</div>
        <div class="panel-body">

            <p><strong>Company:</strong> {!! $quote->company !!}</p>
            <p><strong>Sender:</strong> {!! $quote->full_name !!}</p>
            <p><strong>Email:</strong> <a href="mailto:{!! $quote->email !!}">{!! $quote->email !!}</a></p>
            <p><strong>Phone:</strong> {!! $quote->phone !!}</p>
            <p><strong>Address:</strong> {!! $quote->address !!}</p>
            <p><strong>City:</strong> {!! $quote->city !!}</p>
            <p><strong>Province:</strong> {!! $quote->province !!}</p>
            <p><strong>Date Needed:</strong> {!! $quote->date_needed !!}</p>
            <p><strong>Interested In:</strong> {!! $quote->interested_in !!}</p>
            <p><strong>Message: </strong><br>
                {!! nl2br($quote->message) !!}
            </p>

        </div>
    </div>

    <br><br>
    <a class="btn btn-primary" href="/admin/quotes/all-quotes">Back to Requests for Quotation</a>
    <a class="btn btn-danger" onclick="confirmDelete({!! $quote->id !!})" href="#!">Delete this request</a>
@stop

@section('bottom-js')
    <script>
        function confirmDelete(x){
            bootbox.confirm("Are you sure you want to delete this request for quotation?", function(result) {
                if (result==true)
                {
                    window.location.href = '/admin/quotes/deletequote?id='+x;
                }
            });
        }
    </script>
@stop