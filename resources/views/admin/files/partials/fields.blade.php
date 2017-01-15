<!-- Filename Field -->
<div class="form-group col-sm-6">
    <label for="file">Upload file</label>
    <input type="file" required id="file" name="file" >
</div>

<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.files.index') !!}" class="btn btn-default">Cancel</a>
</div>
