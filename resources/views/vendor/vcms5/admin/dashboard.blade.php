@extends('vcms5::vcms-base')

@section('content')
 <div class="col-sm-6">
        <div class="flot-chart dashboard-chart">
            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
        </div>
        <div class="row text-left">
            <div class="col-xs-4">
                <div class=" m-l-md">
                <span class="h4 font-bold m-t block">$ 406,100</span>
                <small class="text-muted m-b block">Sales marketing report</small>
                </div>
            </div>
            <div class="col-xs-4">
                <span class="h4 font-bold m-t block">$ 150,401</span>
                <small class="text-muted m-b block">Annual sales revenue</small>
            </div>
            <div class="col-xs-4">
                <span class="h4 font-bold m-t block">$ 16,822</span>
                <small class="text-muted m-b block">Half-year revenue margin</small>
            </div>

        </div>
    </div>

@stop