<!-- Survey Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('survey_id', 'Survey Id:') !!}
    {!! Form::number('survey_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question_id', 'Question Id:') !!}
    {!! Form::number('question_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_id', 'Answer Id:') !!}
    {!! Form::number('answer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pollsurveyResponses.index') !!}" class="btn btn-default">Cancel</a>
</div>
