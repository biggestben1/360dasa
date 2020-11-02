<table class="table table-responsive" id="pollanswers-table">
    <thead>
        <tr>

        <th>Answer</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pollanswers as $pollanswer)
        <tr>

            <td>{!! $pollanswer->answer !!}</td>
            <td>
                {!! Form::open(['route' => ['pollanswers.destroy', $pollanswer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pollanswers.edit', [$pollanswer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit">edit</i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>