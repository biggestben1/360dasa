@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pollsurvey Response
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pollsurveyResponse, ['route' => ['pollsurveyResponses.update', $pollsurveyResponse->id], 'method' => 'patch']) !!}

                        @include('pollsurvey_responses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection