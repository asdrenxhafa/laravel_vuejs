@if ($answersCount > 0)
    <div class="row mt-4 v-cloak">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . 'Answer', $answersCount }}</h2>
                    </div>
                    <hr>

                    @include('layouts.messages')


                    @foreach ($answers as $answer)
                        @include ('answers.answers')
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endif
