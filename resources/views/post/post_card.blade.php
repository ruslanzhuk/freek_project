<div class="post-card" data-id="{{ $post->id }}">
    <h3>{{ $post->title }}</h3>
    @if(!empty($post->media))
        @php $uploads_array = json_decode($post->media) @endphp
        @foreach($uploads_array as $upload)
                <?php $fileExtension = pathinfo($upload, PATHINFO_EXTENSION); ?>
            @if(in_array($fileExtension, $imageExtensions))
                <img src="{{ asset('storage/' . $upload) }}" alt="image" />
            @elseif(in_array($fileExtension, $videoExtensions))
                <video src="{{ asset('storage/' . $upload) }}"></video>
            @else
            @endif
        @endforeach
    @endif
    <p>{{ $post->content }}</p>
    <span>{{ $post->posted_at }}</span>
</div>
