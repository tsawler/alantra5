@extends('vcms5::base')


@section('top-white')
    <h1>Requests for Quotation</h1>
@stop

@section('content-title')

@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Requests for Qutation</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">

                <table id="itable" class="table table-compact table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Company</th>
                        <th>Contact</th>
                        <th>Date needed</th>
                        <th>Date of request</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($quotes as $quote)
                        <tr>
                            <td><a href="/admin/quotes/quote?id={!! $quote->id!!}">{!! $quote->company !!}</a></td>
                            <td>{!! $quote->full_name !!}</td>
                            <td>{!! $quote->date_needed !!}</td>
                            <td>{!! $quote->created_at !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('bottom-js')
    <script>
        $(document).ready(function() {
            $('#itable').dataTable({
                responsive: true,
                stateSave: true
            });
        });
    </script>
@stop