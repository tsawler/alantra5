@extends('vcms5::public.base-inside')

@section('content')
    @include('vcms5::public.partials.edit-region')
@stop

@section('browser-title')
    {!! $page_title !!}
@stop


@section('breadcrumb')
    <li>{!! $page_title !!} </li>
@stop

@section('title')
    @include('vcms5::public.partials.edit-title')
@stop

@section('banner')
    @if (sizeof($images) > 0)
        @if (sizeof($images) == 1)
            <div class="slider fullwidthbanner-container roundedcorners">
                <div class="fullwidthbanner">
                    <img src="/page_images/{!! $images[0]->image_name !!}">
                </div>
            </div>
        @else
            <div class="fullwidthbanner-container roundedcorners">
                <div class="owl-carousel controlls-over fullwidthbanner"
                     data-plugin-options='{
                                "items": {!! sizeof($images) !!},
                                "singleItem": true,
                                "navigation": true,
                                "autoPlay": true,
                                "pagination": false}'>
                    @foreach($images as $image)
                        <div>
                            <img alt="" class="img-responsive" src="/page_images/{!! $image->image_name !!}">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@stop