<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Unit Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_price', 'Unit Price:') !!}
    {!! Form::text('unit_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    <input type="file" class="form-control image-preview-option" data-image-preview="image-preview" name="image" accept="image/*">
    <img class="hide image-preview" src="#" alt="Preview image" />


    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-default ajax-load-media" data-url="{!! route('admin.files.medias') !!}">
        Medias
    </button>

    <!-- Modal -->
    <div id="loadMedia" class="modal  fade" role="dialog">
        <div class="modal-dialog cs-modal-fullscreen">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Media files</h4>
                </div>
                <div class="modal-body">
                    <div class="media-list"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-media-select">OK</button>
                </div>
            </div>

        </div>
    </div>

    <img class="hide media-img-list-item media-img-preview" src="" >
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.products.index') !!}" class="btn btn-default">Cancel</a>
</div>
