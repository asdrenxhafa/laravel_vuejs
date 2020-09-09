@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>{{ $question->title }}</h3>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}">Back to All Question</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $question->body }}

                        <div class="container">
                            <div class="col-md-8">
                        <div class="float-right">
{{--                            <span class="text-muted">Answered {{ $question->created_date }}</span>--}}
                            <div class="media mt-2">
                                <a href="{{ $question->user->url }}" class="pr-2">
                                </a>
                                <div class="media-body mt-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>{{ $question->answers_count  . ' Answers'}}</h2>
                        </div>
                        <hr>
                        @foreach ($question->answers as $answer)
                            <div class="media">
                                <div class="media-body">
                                    {!! $answer->body !!}
                                    <div class="float-right">
                                        <span class="text-muted">Answered {{ $answer->created_at->diffForHumans() }}</span>
                                        <div class="media mt-2">
                                            <a href="{{ $answer->user->url }}" class="pr-2">
                                                <img src="{{ $answer->user }}">
                                            </a>
                                            <div class="media-body mt-1">
                                                <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach


                    </div>




                    </div>
        </div>
    </div>
@endsection
