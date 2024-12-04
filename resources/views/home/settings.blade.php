@extends("layouts.app")

@section("content")
    <h2>Your name: {{ $user->name }}</h2>
    <h2>Your email: {{ $user->email }}</h2>
    <h2>Change your avatar: {{ $user->avatar }}</h2>
    <h2>Change your password: <a href="#">change_pass</a></h2>
    <div>
        <h3>Change Avatar</h3>
        <form action="{{ route('avatar.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" required>
            <button type="submit">Upload</button>
        </form>

        <h3>Previous Avatars</h3>
        @foreach(auth()->user()->avatars as $avatar)
            <div>
                <img src="{{ asset('storage/' . $avatar->path) }}" alt="Avatar" width="100">
                @if(!$avatar->is_current)
                    <form action="{{ route('avatar.revert', $avatar->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Revert</button>
                    </form>
                @else
                    <span>Current Avatar</span>
                @endif
            </div>
        @endforeach
    </div>

@endsection
