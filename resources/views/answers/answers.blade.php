<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">

        @include ('shared.vote', [
            'model' => $answer
        ])

        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea rows="10" v-model="body" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button class="btn btn-outline-secondary" @click="cancel" type="button">Cancel</button>
            </form>
            <div v-else>
                <div v-html="bodyHtml"></div>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            @can ('update', $answer)
                                <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                            @endcan
                                @can ('delete', $answer)
                                    <button @click="destroy" class="btn btn-sm btn-outline-danger">Delete</button>
                                @endcan
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                    </div>
                </div>
            </div>
        </div>
    </div>

</answer>
<hr>




{{--                                <div class="media">--}}
{{--                                    <div class="d-fex flex-column vote-controls">--}}
{{--                                        <a title="This answer is useful"--}}
{{--                                           class="vote-up {{ Auth::guest() ? 'off' : '' }}"--}}
{{--                                           onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{ $answer->id }}').submit();">--}}
{{--                                            <i class="fas fa-caret-up fa-3x"></i>--}}
{{--                                        </a>--}}
{{--                                        <form id="up-vote-answer-{{ $answer->id }}" action="/answers/{{ $answer->id }}/vote" method="POST" style="display:none;">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="vote" value="1">--}}
{{--                                        </form>--}}

{{--                                        <span class="votes-count">{{ $answer->votes_count }}</span>--}}

{{--                                        <a title="This answer is not useful"--}}
{{--                                           class="vote-down {{ Auth::guest() ? 'off' : '' }}"--}}
{{--                                           onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{ $answer->id }}').submit();">--}}
{{--                                            <i class="fas fa-caret-down fa-3x"></i>--}}
{{--                                        </a>--}}

{{--                                        <form id="down-vote-answer-{{ $answer->id }}" action="/answers/{{ $answer->id }}/vote" method="POST" style="display:none;">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="vote" value="-1">--}}
{{--                                        </form>--}}


{{--                                        @can ('accept', $answer)--}}
{{--                                            <a title="Mark this answer as best answer"--}}
{{--                                               class="{{ $answer->status }} mt-2"--}}
{{--                                               onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();"--}}
{{--                                            >--}}
{{--                                                <i class="fas fa-check fa-2x"></i>--}}
{{--                                            </a>--}}
{{--                                            <form id="accept-answer-{{ $answer->id }}" action="{{ route('answers.accept', $answer->id) }}" method="POST" style="display:none;">--}}
{{--                                                @csrf--}}
{{--                                            </form>--}}
{{--                                        @else--}}
{{--                                            @if ($answer->is_best)--}}
{{--                                                <a title="The question owner accepted this answer as best answer"--}}
{{--                                                   class="{{ $answer->status }} mt-2">--}}
{{--                                                    <i class="fas fa-check fa-2x"></i>--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                        @endcan--}}
{{--                                    </div>--}}

{{--                                    <div class="media-body">--}}
{{--                                        {{ $answer->body }}--}}
{{--                                        <div class="float-right">--}}
{{--                                            @if(Auth::user()->can('update',$answer))--}}
{{--                                                <div class="ml-auto">--}}
{{--                                                    <a href="{{ route('answers.edit',[$answer,$question]) }}" class="btn btn-sm btn-outline-info">Edit</a>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                            <div class="media mt-2">--}}
{{--                                                <div class="media-body mt-1">--}}
{{--                                                        <user-info :model="{{ $answer }}" label="Answered"></user-info>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
