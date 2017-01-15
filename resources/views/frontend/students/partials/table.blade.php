<table class="table table-responsive" id="students-table">
    <thead>
        <th>Name</th>
        <th>Sex</th>
        <th>Address</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{!! $student->name !!}</td>
            <td>{!! $student->sex !!}</td>
            <td>{!! $student->address !!}</td>
            <td>{!! $student->created_at !!}</td>
            <td>{!! $student->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('students.show', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('students.edit', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>