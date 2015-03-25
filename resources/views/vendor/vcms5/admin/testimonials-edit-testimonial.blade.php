@extends('vcms5::base')

@section('top-white')
    <h1>Testimonial</h1>
@stop


@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    @if ($testimonial_id > 0)
                        Edit Testimonial
                    @else
                        Add Testimonial
                    @endif
                </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                {!! Form::model($testimonial, array(
                                        'role' => 'form',
                                        'name' => 'bookform', 'id' => 'bookform',
                                        'url' => 'admin/testimonials/testimonial'
                                        )
                           )
                !!}

                <div class="form-group">
                    {!! Form::label('company', 'Company', array('class' => 'control-label')); !!}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            {!! Form::text('company', null, array('class' => 'required form-control',
                                                                'style' => 'max-width: 400px;',
                                                                'placeholder' => 'Company')); !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('person', 'Person', array('class' => 'control-label')); !!}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('person', null, array('class' => 'required form-control',
                                                                'style' => 'max-width: 400px;',
                                                                'placeholder' => 'Name of person')); !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('testimonial_date', 'Date', array('class' => 'control-label')); !!}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {!! Form::text('testimonial_date', null, array('class' => 'required form-control datepicker',
                                                                'style' => 'max-width: 400px;',
                                                                'placeholder' => 'YYYY-MM-DD')); !!}
                        </div>
                    </div>
                </div>

                <div role="tabpanel">
                    <br>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#english" aria-controls="english" role="tab" data-toggle="tab">English</a>
                        </li>
                        <li role="presentation">
                            <a href="#french" aria-controls="french" role="tab" data-toggle="tab">French</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade in active" id="english">
                            <br>

                            <div class="form-group">
                                {!! Form::label('testimonial', 'Testimonial', array('class' => 'control-label')); !!}
                                <div class="controls">
                                    {!! Form::textarea('testimonial', null); !!}
                                </div>
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="french">
                            <br>
                            @if (Config::get('vcms5.use_fr'))
                                <div class="form-group">
                                    {!! Form::label('testimonial_fr', 'Testimonial (French)', array('class' => 'control-label')); !!}
                                    <div class="controls">
                                        {!! Form::textarea('testimonial_fr', null); !!}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="controls">
                            {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}
                            @if ($testimonial_id> 0)
                                <a class="btn btn-danger" href="#!" onclick='confirmDelete({!! $testimonial_id !!})'>Delete this item</a>
                            @endif
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    {!! Form::hidden('testimonial_id', $testimonial_id )!!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @stop

        @section('bottom-js')
            <script>
                function confirmDelete(x){
                    bootbox.confirm("Are you sure you want to delete this item?", function(result) {
                        if (result==true)
                        {
                            window.location.href = '/admin/testimonials/deletetestimonial?id='+x;
                        }
                    });
                }
                $(document).ready(function () {
                    $("#bookform").validate({
                        errorClass:'has-error',
                        validClass:'has-success',
                        errorElement:'span',
                        highlight: function (element, errorClass, validClass) {
                            $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function (element, errorClass, validClass) {
                            $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
                        }
                    });

                    $(".datepicker").datepicker({format: 'yyyy-mm-dd', autoclose: true});

                    CKEDITOR.replace( 'testimonial',
                            {
                                toolbar : 'MyToolbar',
                                forcePasteAsPlainText: true,
                                filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
                                filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
                                filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
                                enterMode : '1'
                            });

                    @if (Config::get('vcms5.use_fr'))
                    CKEDITOR.replace( 'testimonial_fr',
                            {
                                toolbar : 'MyToolbar',
                                forcePasteAsPlainText: true,
                                filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
                                filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
                                filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
                                enterMode : '1'
                            });
                    @endif

                    });
            </script>
@stop