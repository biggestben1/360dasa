<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pollquestion->id !!}</p>
</div>

<!-- Questionnaire Id Field -->
<div class="form-group">
    {!! Form::label('questionnaire_id', 'Questionnaire Id:') !!}
    <p>{!! $pollquestion->questionnaire_id !!}</p>
</div>

<!-- Question Field -->
<div class="form-group">
    {!! Form::label('question', 'Question:') !!}
    <p>{!! $pollquestion->question !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pollquestion->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pollquestion->updated_at !!}</p>
</div>

