<table class="table table-responsive" id="pollquestions-table">
    <thead>
        <tr>

        <th>Question</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pollquestions as $pollquestion)
        <tr>

            <td>{!! $pollquestion->question !!}</td>
            <td>
                {!! Form::open(['route' => ['pollquestions.destroy', $pollquestion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="/mychoice/{!! $pollquestion->id!!}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-eye-open">choice({{ \App\Models\Pollanswer::where(['pollquestion_id' => $pollquestion->id])->get()->count() }})</i></a>
                    <a href="{!! route('pollquestions.edit', [$pollquestion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit">edit</i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>