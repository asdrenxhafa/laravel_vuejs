@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h1>{{ $question->title }}</h1>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        {{ $question->body }}
                        <div class="media">
                            <div class="media-body">
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
                                <h2>{{ $question->answers_count . ' Answers'  }}</h2>
                            </div>
                            <hr>
                            @foreach ($question->answers as $answer)
                                <div class="media">
                                    <div class="d-fex flex-column vote-controls">
                                        <a title="This answer is useful" class="vote-up">
                                            <i class="fas fa-caret-up fa-3x"></i>
                                        </a>
                                        <span class="votes-count">1230</span>
                                        <a title="This answer is not useful" class="vote-down off">
                                            <i class="fas fa-caret-down fa-3x"></i>
                                        </a>
                                        <a title="Mark this answer as best answer" class="vote-accepted mt-2">
                                            <i class="fas fa-check fa-2x"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        {{ $answer->body }}
                                        <div class="float-right">
                                            <span class="text-muted">Answered {{ $answer->created_at->diffForHumans() }}</span>
                                            <div class="media mt-2">
                                                <a href="{{ $answer->user->url }}" class="pr-2">
                                                    <img src="{{ $answer->user->avatar }}">
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
        </div>
@endsection
