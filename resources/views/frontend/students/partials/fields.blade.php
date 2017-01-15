<div class="form-group col-sm-12">
    <label for="name" class="col-sm-2">Name</label>
    <input type="text" name="name" id="name" class="form-input col-sm-10"
       @if(isset($student)) value="{!! $student->name !!}" @endif  >
</div>

<div class="form-group col-sm-12">
    <label for="sex" class="col-sm-2">Sex</label>
    <select id="sex" name="sex" class="col-sm-10">
        <option value="M" @if(isset($student) && $student->sex == 'M') selected @endif>M</option>
        <option value="F" @if(isset($student) && $student->sex == 'F') selected @endif>F</option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('students.index') !!}" class="btn btn-default">Cancel</a>
</div>
