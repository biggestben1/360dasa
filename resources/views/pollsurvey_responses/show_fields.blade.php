<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pollsurveyResponse->id !!}</p>
</div>

<!-- Survey Id Field -->
<div class="form-group">
    {!! Form::label('survey_id', 'Survey Id:') !!}
    <p>{!! $pollsurveyResponse->survey_id !!}</p>
</div>

<!-- Question Id Field -->
<div class="form-group">
    {!! Form::label('question_id', 'Question Id:') !!}
    <p>{!! $pollsurveyResponse->question_id !!}</p>
</div>

<!-- Answer Id Field -->
<div class="form-group">
    {!! Form::label('answer_id', 'Answer Id:') !!}
    <p>{!! $pollsurveyResponse->answer_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pollsurveyResponse->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pollsurveyResponse->updated_at !!}</p>
</div>

