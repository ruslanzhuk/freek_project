@extends("layouts/app")


{{--And, now November 9 of 2024. I need to do so much homework from fucked University, but I really want to practice in PHP .--}}
{{--Why I must do this all stuff :(--}}

{{--Okej, Im cool, let's do it. Just go--}}
@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form class="form" style="background: #226a2a; display: flex; flex-direction: column; text-align: center" method="POST" action="/post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="author_id" value="{{$user->id}}" />
            <input style="display: block" type="text" name="title" placeholder="title" />
            <textarea style="display: block" name="description" cols="25" rows="15"></textarea>

            <label for="media">Add images or videos:</label>
            <input type="file" name="media[]" id="media" multiple accept="image/*,video/*">

            <select name="comments_type" id="comments_type">
                <option value="published">published</option>
                <option value="only_friends">only_friends</option>
                <option value="unpublished">unpublished</option>
            </select>

            <button type="submit" name="submit">Post</button>
        </form>
    </div>
@endsection
