<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $file->id !!}</p>
</div>

<!-- Original Name Field -->
<div class="form-group">
    {!! Form::label('original_name', 'Original Name:') !!}
    <p>{!! $file->original_name !!}</p>
</div>

<!-- Filename Field -->
<div class="form-group">
    {!! Form::label('filename', 'Filename:') !!}
    <p>{!! $file->filename !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $file->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $file->updated_at !!}</p>
</div>

