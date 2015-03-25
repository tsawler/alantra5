@extends('vcms5::base')

@section('top-white')
    <h1>All Testimonials</h1>
@stop

@section('content-title')

@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Testimonials</h5>
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
                        <th>Testimonial</th>
                        <th>Company</th>
                        <th>Date</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($testimonials as $t)
                        <tr>
                            <td><a href="/admin/testimonials/testimonial?id={!! $t->id!!}">{!! $t->person !!}</a></td>
                            <td>{!! $t->company !!}</td>
                            <td>{!! $t->testimonial_date !!}</td>
                            <td>{!! $t->created_at !!}</td>
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