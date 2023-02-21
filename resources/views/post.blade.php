<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="" href="/app.css">

    <title>Post</title>
    <article>
        <h1> {{ $post->title }} </h1>
        <p>
            By <a href="/users/{{ $post->user->name }}">{{ $post->user->name }}</a> in <a
                href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }}</a>
        </p>
        <div> {!! $post->body !!} </div>
    </article>
    <a href="/">Go back</a>
</head>           

<body>

</body>

</html>
