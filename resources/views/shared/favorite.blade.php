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
