@extends('vcms5::base')

<?php
$active = ['<span class="text-danger">Inactive</span>', '<span class="text-success">Active</span>'];
?>

@section('top-white')
    <h1>All Products</h1>
@stop

@section('content-title')

@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Products</h5>
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
                        <th>Product</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><a href="/admin/products/product?id={!! $product->id!!}">{!! $product->title !!}</a></td>
                            <td>{!! $product->created_at !!}</td>
                            <td>{!! $product->updated_at !!}</td>
                            <td>{!! $active[$product->active] !!}</td>
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