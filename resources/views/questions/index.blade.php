@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Questions') }}</div>

                    <div class="card-body">
                        @foreach($questions as $q)
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-3">{{  $q->title }}</h3>
                                    {{ $q->body }}
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <div class="pagination justify-content-center">
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
