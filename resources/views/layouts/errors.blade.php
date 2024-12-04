@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ //return redirect()->route('main.index', ['title' => 'Main', 'posts_friends' => [], 'posts_all' => []]); }}
