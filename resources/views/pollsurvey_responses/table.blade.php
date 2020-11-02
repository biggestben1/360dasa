<table class="table table-responsive" id="pollsurveyResponses-table">
    <thead>
        <tr>
            <th>Survey Id</th>
        <th>Question Id</th>
        <th>Answer Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pollsurveyResponses as $pollsurveyResponse)
        <tr>
            <td>{!! $pollsurveyResponse->survey_id !!}</td>
            <td>{!! $pollsurveyResponse->question_id !!}</td>
            <td>{!! $pollsurveyResponse->answer_id !!}</td>
            <td>
                {!! Form::open(['route' => ['pollsurveyResponses.destroy', $pollsurveyResponse->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pollsurveyResponses.show', [$pollsurveyResponse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pollsurveyResponses.edit', [$pollsurveyResponse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>