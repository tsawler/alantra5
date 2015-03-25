@extends('vcms5::base')

@section('top-white')
    <h1>Product</h1>
@stop


@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    @if ($product_id > 0)
                        Edit Product
                    @else
                        Add Product
                    @endif
                </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                {!! Form::model($product, array(
                                        'role' => 'form',
                                        'name' => 'bookform', 'id' => 'bookform',
                                        'url' => 'admin/products/product',
                                        'files' => true
                                        )
                           )
                !!}

                <div role="tabpanel">
                    <br>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#english" aria-controls="english" role="tab" data-toggle="tab">English</a>
                        </li>
                        @if (Config::get('vcms5.use_fr'))
                            <li role="presentation">
                                <a href="#french" aria-controls="french" role="tab" data-toggle="tab">French</a>
                            </li>
                        @endif
                    </ul>

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade in active" id="english">
                            <br>
                            <div class="form-group">
                                {!! Form::label('title', 'Title', array('class' => 'control-label')); !!}
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {!! Form::text('title', null, array('class' => 'required form-control',
                                                                            'style' => 'max-width: 400px;',
                                                                            'placeholder' => 'Page title')); !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description', array('class' => 'control-label')); !!}
                                <div class="controls">
                                    {!! Form::textarea('description', null); !!}
                                </div>
                            </div>
                        </div>

                        @if (Config::get('vcms5.use_fr'))
                            <div role="tabpanel" class="tab-pane fade" id="french">
                                <br>
                                @if (Config::get('vcms5.use_fr'))
                                    <div class="form-group">
                                        {!! Form::label('title_fr', 'Title (French)', array('class' => 'control-label')); !!}
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                                {!! Form::text('title_fr', null, array('class' => 'required form-control',
                                                                                    'style' => 'max-width: 400px;',
                                                                                    'placeholder' => 'Page title')); !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('description_fr', 'Description (French)', array('class' => 'control-label')); !!}
                                        <div class="controls">
                                            {!! Form::textarea('description_fr', null ); !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('active', 'Product active?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('active', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        1,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h2>Images</h2>

                    <div class="form-group">
                        {!! Form::label('image_name', 'Product Image', ['class' => 'control-label']) !!}
                        <br>

                        @if (sizeof($product->images) > 0)
                            @foreach($product->images as $image)
                                <img alt="image" class="img-thumbnail"
                                     src="/product_images/thumbs/{!! $image->image_name !!}" />
                                &nbsp;
                                <a href="#!" onclick="confirmDeleteImage({!! $image->id !!})">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endforeach
                        @else
                            <img class="img-thumbnail" src="http://placehold.it/140x100&text=No+Image">
                        @endif
                        <br><br>
                        <div class="controls">
                            {!! Form::file('image_name',['id' => 'image_name']) !!}
                        </div>
                    </div>

                    <hr>

                    <h2>Drawings</h2>

                    <div class="form-group">
                        <br>

                        @if (sizeof($product->drawings) > 0)
                            <ul>
                                @foreach($product->drawings as $drawing)
                                    <li>
                                        <a href="/drawings/{!! $drawing->drawing_file !!}">
                                            {!! $drawing->drawing_title !!}
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="#!" onclick="confirmDeleteDrawing({!! $drawing->id !!})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul>
                                <li>No drawings</li>
                            </ul>
                        @endif
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('drawing_title', 'Add a Drawing', array('class' => 'control-label')); !!}
                            <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                    {!! Form::text('drawing_title', null, array('class' => 'form-control',
                                                                        'style' => 'max-width: 400px;',
                                                                        'placeholder' => 'Title')); !!}
                                </div>
                            </div>
                        </div>

                        <div class="controls">
                            {!! Form::file('drawing_name',['id' => 'drawing_name']) !!}
                        </div>
                    </div>

                    <hr>

                    <h2>Features</h2>

                    <div class="form-group">
                        {!! Form::label('electric_heat', 'Electric Heat?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('electric_heat', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('electric_mast', 'Electric Mast?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('electric_mast', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('communications_panel', 'Communications Panel?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('communications_panel', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('ac', 'Air Conditioning?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('ac', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('drawing_tables', 'Drawing Tables?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('drawing_tables', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('emergency_lights', 'Emergency Lights?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('emergency_lights', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('coat_hooks', 'Coat Hooks?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('coat_hooks', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('bulletin_boards', 'Bulletin Boards?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('bulletin_boards', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('window_bars', 'Security Window Bars?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('window_bars', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('water_septic', 'Water and Septic?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('water_septic', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('exhaust_fans', 'Exhaust Fans?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('exhaust_fans', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('hot_water_heaters', 'Hot Water Heaters?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('hot_water_heaters', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('laundry_sink', 'Laundry Sink?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('laundry_sink', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('hand_dryers', 'Hand Dryers?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('hand_dryers', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('toilets', 'Toilets?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('toilets', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('urinals', 'Urinals?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('urinals', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sinks', 'Sinks?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('sinks', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h2>Options</h2>

                    <div class="form-group">
                        {!! Form::label('office_desks', 'Office Desks Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('office_desks', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('office_chairs', 'Office Chairs Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('office_chairs', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('folding_chairs', 'Folding Chairs Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('folding_chairs', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('folding_tables', 'Folding Tables Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('folding_tables', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('filing_cabinets', 'Filing Cabinets Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('filing_cabinets', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lockers', 'Lockers Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('lockers', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('fridges', 'Fridges Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('fridges', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('microwaves', 'Microwaves Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('microwaves', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('water_coolers', 'Water Coolers Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('water_coolers', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('insurance', 'Insurance Available?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('insurance', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>




                    <hr>
                    <div class="form-group">
                        <div class="controls">
                            {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}

                            <a class="btn btn-info" href="#!" onclick="saveContinue()">Save and Continue</a>

                            @if ($product_id > 0)
                                <a class="btn btn-danger" href="#!" onclick='confirmDelete({!!$product_id!!})'>Delete this product</a>
                            @endif
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    {!! Form::hidden('product_id', $product_id )!!}
                    {!! Form::hidden('action', 0, ['id' => 'action'] )!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @stop

        @section('bottom-js')
            <script>
                function confirmDelete(x){
                    bootbox.confirm("Are you sure you want to delete this product?", function(result) {
                        if (result==true)
                        {
                            window.location.href = '/admin/products/deleteproduct?id='+x;
                        }
                    });
                }

                function confirmDeleteImage(x){
                    bootbox.confirm("Are you sure you want to delete this image?", function(result) {
                        if (result==true)
                        {
                            window.location.href = '/admin/products/deleteproductimage?pid={!! $product_id !!}&id='+x;
                        }
                    });
                }

                function confirmDeleteDrawing(x){
                    bootbox.confirm("Are you sure you want to delete this drawing?", function(result) {
                        if (result==true)
                        {
                            window.location.href = '/admin/products/deleteproductdrawing?pid={!! $product_id !!}&id='+x;
                        }
                    });
                }

                function saveContinue(){
                    $("#action").val(1);
                    $("#bookform").submit();
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

                    CKEDITOR.replace( 'description',
                            {
                                toolbar : 'MyToolbar',
                                forcePasteAsPlainText: true,
                                filebrowserBrowseUrl : '/filemgmt/browse.php?type=files',
                                filebrowserImageBrowseUrl : '/filemgmt/browse.php?type=images',
                                filebrowserFlashBrowseUrl : '/filemgmt/browse.php?type=flash',
                                enterMode : '1'
                            });

                    @if (Config::get('vcms5.use_fr'))
                    CKEDITOR.replace( 'description_fr',
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