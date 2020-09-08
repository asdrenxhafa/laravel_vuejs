@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Make Questions</h3>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}">Back to All Question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                            <div class="modal-content" style="border-style: none;">
                                <form method="POST" action=" {{ route('questions.store') }} ">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Question Title</label>
                                            <input name="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" required>
                                        </div>

                                        @if($errors->has('title'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Explain your Question</label>
                                            <textarea name="body" type="" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" required></textarea>
                                        </div>

                                        @if($errors->has('body'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('body') }}</strong>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" value="Anulo" >
                                        <input type="submit" class="btn btn-primary" value="Shto" >
                                    </div>
                                </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
