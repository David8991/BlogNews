<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="News from all over the world and different categories!">
    <meta name="author" content="David Muradyan and Bootstrap contributors">
    <title>Blog News · @yield("title")</title>
    <meta name="keywords" content="BlogNews, Blog, News, World news, Новости">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <link rel="shortcut icon" href="../favicon.png" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @include("inc.style")
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

    <style>
        .ck-editor__editable {
            min-height: 150px;
            overflow-y: auto;
        }
    </style>
    <!-- Custom styles for this template -->
    @vite(['resources/css/news.css'])
</head>
