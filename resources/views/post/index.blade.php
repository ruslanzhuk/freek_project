@extends("layouts.app")

@php
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
    $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
@endphp

@section("content")
    <div class="post-full">
        <h2>{{ $post->title }}</h2>
        <p class="description">{{ $post->content }}</p>
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
        <p>Author: {{ $post->author->name }}</p>
        <span>Posted at: {{ $post->posted_at }}</span><br />
        <span>Updated at: {{ $post->updated_at }}</span><br />
    </div>

    @include('post.comments_form', ['post' => $post])
@endsection
