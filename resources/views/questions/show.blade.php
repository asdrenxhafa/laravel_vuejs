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
                            <div class="d-fex flex-column vote-controls">
                                <a title="This question is useful" class="vote-up">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">1230</span>
                                <a title="This question is not useful" class="vote-down off">
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <a title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 favorited">
                                    <i class="fas fa-star fa-2x"></i>
                                    <span class="favorites-count">123</span>
                                </a>
                            </div>
                            <div class="media-body">
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

                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if(session()->has('failure'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session()->get('failure') }}
                                </div>
                            @endif

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

                                        <a title="Mark this answer as best answer" class="{{ $answer->status }} mt-2">
                                            <i class="fas fa-check fa-2x"></i>
                                        </a>

                                    </div>
                                    <div class="media-body">
                                        {{ $answer->body }}
                                        <div class="float-right">
                                            <span class="text-muted">Answered {{ $answer->created_at->diffForHumans() }}</span>
                                            @if(Auth::user()->can('update',$answer))
                                                <div class="ml-auto">
                                                    <a href="{{ route('answers.edit',[$answer,$question]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                                </div>
                                            @endif
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




            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h2>Your Answer</h2>
                            </div>

                            <div class="media">
                                <div class="media-body">
                                    <form method="POST" action="{{ route('answers.store',['question_id'=>$question->id]) }}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Explain your Answer</label>
                                            <textarea name="body" class="form-control" required style="height: 275px;"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="Post Your Answer" >
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>

            </div>
        </div>
        </div>

@endsection
