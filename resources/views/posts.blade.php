<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My blog</title>

    <link rel="stylesheet" href="/style.css">
</head>
<body>
<?php foreach($posts as $post): ?>
<article>
    <a href="/posts/<?= $post->slug ?>">
        <h1><?= $post->title ?></h1>
    </a>
    <p><?= $post->excerpt ?></p>

</article>
<?php endforeach; ?>
</body>
</html>