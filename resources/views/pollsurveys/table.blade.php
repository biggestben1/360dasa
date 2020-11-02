<table class="table table-responsive" id="pollsurveys-table">
    <thead>
        <tr>
            <th>Questionnaire Id</th>
        <th>Name</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pollsurveys as $pollsurvey)
        <tr>
            <td>{!! $pollsurvey->questionnaire_id !!}</td>
            <td>{!! $pollsurvey->name !!}</td>
            <td>{!! $pollsurvey->email !!}</td>
            <td>
                {!! Form::open(['route' => ['pollsurveys.destroy', $pollsurvey->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pollsurveys.show', [$pollsurvey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pollsurveys.edit', [$pollsurvey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>