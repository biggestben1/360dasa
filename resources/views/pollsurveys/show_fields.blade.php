<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pollsurvey->id !!}</p>
</div>

<!-- Questionnaire Id Field -->
<div class="form-group">
    {!! Form::label('questionnaire_id', 'Questionnaire Id:') !!}
    <p>{!! $pollsurvey->questionnaire_id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $pollsurvey->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $pollsurvey->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pollsurvey->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pollsurvey->updated_at !!}</p>
</div>

