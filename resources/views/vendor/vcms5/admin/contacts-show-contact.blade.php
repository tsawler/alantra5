@extends('vcms5::base')

@section('top-white')
    <h1>Website Contact</h1>
@stop

@section('content-title')

@stop

@section('content')
    <p>The following message was received from the website on {!! $contact->created_at !!}:</p>

    <div class="panel panel-success">
        <div class="panel-heading">Website Contact</div>
        <div class="panel-body">

            <p><strong>Sender:</strong> {!! $contact->full_name !!}</p>
            <p><strong>Email:</strong> <a href="mailto:{!! $contact->email !!}">{!! $contact->email !!}</a></p>
            <p><strong>Subject:</strong> {!! $contact->subject !!}</p>
            <p><strong>Message: </strong><br>
                {!! nl2br($contact->message) !!}

            </p>

        </div>
    </div>

    <br><br>
    <a class="btn btn-primary" href="/admin/contacts/list-all-website-contacts">Back to Website Contacts</a>
    <a class="btn btn-danger" onclick="confirmDelete({!! $contact->id !!})" href="#!">Delete this message</a>
@stop

@section('bottom-js')
    <script>
        function confirmDelete(x){
            bootbox.confirm("Are you sure you want to delete this message?", function(result) {
                if (result==true)
                {
                    window.location.href = '/admin/contacts/deletecontact?id='+x;
                }
            });
        }
    </script>
@stop