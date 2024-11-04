@extends("layouts/app")



@section("content")
    <form action="/" method="post">
        <input type="text" name="title" placeholder="title" />
        <textarea name="content" cols="25" rows="15"></textarea>

        <label for="media">Add images or videos:</label>
        <input type="file" name="media[]" id="media" multiple accept="image/*,video/*">

        <button type="submit" name="submit">Post</button>
    </form>
@endsection
