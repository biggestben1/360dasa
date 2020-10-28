@extends('layouts.app')

@section('content')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="{{ asset('js/qupdat.js') }}" defer></script
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/questionnaires/create" class="btn btn-dark "> Create New Questionnaire</a>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">My Questionnaires</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questionnaires as $questionnaire)
                                <li class="list-group-item">
                                    <a href="#" class="xedit"
                                       data-pk="{{$questionnaire->id}}"
                                       data-name="title">
                                        {{$questionnaire->title}}</a>

                                    <div class="mt-2">

                                    </div>



                                </li>

                                <li class="list-group-item">

                                    {{ $questionnaire->purpose }}
                                    <div class="mt-2">

                                    </div>



                                </li>
                            @endforeach
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
