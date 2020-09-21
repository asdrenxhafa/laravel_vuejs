@extends('layouts.app')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="card-title">--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <h1>{{ $question->title }}</h1>--}}
{{--                                <div class="ml-auto">--}}
{{--                                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr>--}}

{{--                        <div class="media">--}}
{{--                            <div>--}}

{{--                            @include ('shared.vote', [--}}
{{--                                'model' => $question--}}
{{--                            ])--}}

{{--                                <vote :model="{{ $question }}" name="question"></vote>--}}

{{--                            </div>--}}
{{--                            <div class="media-body">--}}
{{--                    <div class="card-body">--}}
{{--                        {{ $question->body }}--}}
{{--                        <div class="float-right">--}}
{{--                            <div class="media mt-2">--}}
{{--                                <div class="media-body mt-1">--}}
{{--                                    <user-info :model="{{ $question }}" label="Asked"></user-info>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--                <answers :question="{{ $question }}"></answers>--}}

{{--            </div>--}}

<question-page :question="{{ $question }}"></question-page>

@endsection



