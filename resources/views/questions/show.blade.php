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
                        <hr>

                        <div class="media">
                            @include ('shared.vote', [
                                'model' => $question
                            ])


                                <a title="Click to mark as favorite question (Click again to undo) "
                                   class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '') }}"
                                   onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question->id }}').submit();">
                                    <i class="fas fa-star fa-2x"></i>
                                    <span class="favorites-count">{{ $question->favorites_count }}</span>
                                </a>

                                <form id="favorite-question-{{ $question->id }}" action="/questions/{{ $question->id }}/favorites" method="POST" style="display:none;">
                                    @csrf
                                    @if ($question->is_favorited)
                                        @method ('DELETE')
                                    @endif
                                </form>

                            </div>
                            <div class="media-body">
                    <div class="card-body">
                        {{ $question->body }}
                        <div class="float-right">
                            <div class="media mt-2">
                                <div class="media-body mt-1">
                                    <user-info :model="{{ $question }}" label="Asked"></user-info>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


                @include ('answers.index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
        ])
                @include ('answers.create')
        </div>

@endsection


