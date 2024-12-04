@extends("layouts/app")

@php
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
    $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
@endphp

@section("content")
    @if(isset($var1))
        <?php dump($var1); ?>
    @endif
    <h1>Last posts from your friends</h1>
    <p>...</p>
    <h1>Internet web</h1>
    @foreach($posts_all as $post)
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
    @endforeach
@endsection
