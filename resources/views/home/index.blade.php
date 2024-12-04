@extends("layouts.app")

@php
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
    $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
@endphp

@section("content")
    <div class="container_my">
        <div class="my_page">
            <div style="display: flex; flex-direction: row; flex-wrap: wrap; margin-bottom: 40px">
                <img class="avatar" src="https://ionicframework.com/docs/img/demos/avatar.svg" alt="Avatar">
                <div style="margin: 3px 10px">
                    <h1 style="display: block; padding: 3px 10px">{{ $user->name }}</h1>
                    <p><a href="">Settings</a></p>
                    <div style="margin: 10px; padding: 6px">
                        <a href="{{ route("home.post") }}">Add Post</a>
                    </div>
                </div>
            </div>

            <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between">
                @foreach($posts_my as $post)
                    <div class="post-card" data-id="{{ $post->id }}">
                        <p>{{ $post->title }}</p>
                        <p>{{ $post->content }}</p>
                        @if(isset($post->media))
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
