@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Edit your Question</h3>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}">Back to All Question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="modal-content" style="border-style: none;">
                            <form method="POST" action=" {{ route('questions.update',$question) }} ">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">

                                    @if($errors->has('title'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </div>
                                        <div></div>
                                    @endif

                                    <div class="form-group">
                                        <label>Question Title</label>
                                        <input name="title" type="text" value="{{ $question->title }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" required>
                                    </div>


                                    @if($errors->has('body'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label>Explain your Question</label>
                                        <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" required>{{ $question->body }}</textarea>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" value="Anulo" >
                                    <input type="button" href="#deleteModal" class="btn btn-sm btn-outline-danger" data-toggle="modal" value="Delete">
                                    <input type="submit" class="btn btn-primary" value="Edit" >
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="deleteModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <form class="form-delete" method="POST" action="{{ route('questions.destroy',$question) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
