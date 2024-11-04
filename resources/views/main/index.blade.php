@extends("layouts/app")

@php
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
    $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
@endphp

@section("content")
    <h1>Last posts from your friends</h1>
    <p>...</p>
    <h1>Internet web</h1>
    @foreach($posts_all as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            @foreach($post->media as $upload)
                    <?php $fileExtension = pathinfo($upload, PATHINFO_EXTENSION); ?>
                @if(in_array($fileExtension, $imageExtensions))
                    <img src="{{ asset($upload) }}" alt="image" />
                @elseif(in_array($fileExtension, $videoExtensions))
                    <video src="{{ asset($upload) }}"></video>
                @else
                @endif
            @endforeach
            <p>{{ $post->content }}</p>
            <span>{{ $post->posted_at }}</span>
        </div>
    @endforeach
@endsection
