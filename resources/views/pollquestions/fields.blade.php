<!-- Questionnaire Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questionnaire_id', 'Questionnaire Id:') !!}
    {!! Form::number('questionnaire_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pollquestions.index') !!}" class="btn btn-default">Cancel</a>
</div>
