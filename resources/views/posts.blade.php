<!DOCTYPE html>
<head>
    <link href="app.css" rel="stylesheet">
</head>

    @foreach($posts as $post)
       <h1> <a href="/post/{{ $post->slug }}">{{ $post->title }}</a> </h1>
        <p>{{ $post->excerpt}}</p>
    @endforeach

   </body>

