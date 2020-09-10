@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h1>Editing answer for question: <strong>{{ $answer->title }}</strong></h1>
                                <div class="ml-auto">
{{--                                    <a href="{{ route('questions.show') }}" class="btn btn-outline-secondary">Back to all Questions</a>--}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form action="{{ route('answers.update',[$answer, 'question' => $question]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="7" name="body" style="height: 360px;">{{ old('body', $answer->body) }}</textarea>
                                @if ($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
