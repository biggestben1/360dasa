<table class="table table-responsive" id="questionnaires-table">
    <thead>
        <tr>
          
       
        <th>Title</th>
        <th>Purpose</th>
        <th>Share URL</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($questionnaires as $questionnaire)
        <tr>
         
            
            <td>{!! $questionnaire->title !!}</td>
            <td>{!! $questionnaire->purpose !!}</td>
            <td><a href="{{!! $questionnaire->publicPath() !!}}">{{ $questionnaire->publicPath() }}</a></td>
            <td>
                {!! Form::open(['route' => ['questionnaires.destroy', $questionnaire->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                <?php $id=Auth::user()->id;?>
                    <a href="{!! route('questionnaires.show', [$questionnaire->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open">Create Questions</i></a>
                    <a href="seeallmyquestions/{!! $questionnaire->id!!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open">view( {{ \App\Models\Pollquestion::where(['questionnaire_id' => $questionnaire->id])->get()->count() }})</i></a>
                    <a href="{!! route('questionnaires.edit', [$questionnaire->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit">Edit</i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">Delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>