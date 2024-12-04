@if((auth()->check() && auth()->id() === $post->author_id))
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea name="comment" rows="3" required placeholder="Add your comment..."></textarea>
        <button type="submit">Comment</button>
    </form>
{{--    I want to be Your Friend! :)--}}
{{--    Let's be them XD--}}
@elseif($post->comments_type !== 'unpublished')
    @if($post->comments_type == "published")
        {{ $post->author }}
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <textarea name="comment" rows="3" required placeholder="Add your comment..."></textarea>
            <button type="submit">Comment</button>
        </form>
    @elseif($post->comments_type == "only_friends")
        @auth()
            @if($post->author->isFriendWith(\Illuminate\Support\Facades\Auth::user()))
                <form action="{{ route('comments.store', $post) }}" method="POST">
                    @csrf
                    <textarea name="comment" rows="3" required placeholder="Add your comment..."></textarea>
                    <button type="submit">Comment</button>
                </form>
            @else
                <div><p>You must be friends with the author.</p></div>
            @endif
        @else
            <div><p>You must be logged in to comment this post.</p></div>
        @endauth
    @endif
@else
    <div><p>The author denied to comment this post</p></div>
@endif

<div class="comments">
    @foreach($post->comments as $comment)
        <div class="comment">
            <p><strong>{{ $comment->user ? $comment->user->name : 'Guest' }}</strong>: {{ $comment->comment }}</p>
        </div>
    @endforeach
</div>

