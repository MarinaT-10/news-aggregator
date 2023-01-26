<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Blog Template for Bootstrap</title>

       <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">
    <x-header></x-header>
    <x-menu></x-menu>
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">О нас</h1>
            <p class="lead my-3">Мы создаем информационное поле новостей на каждый день, чтобы держать вас в курсе
            событий из разных областей жизни человека и общества. Без желтой прессы. Без кликбейта. Без громких заголовков.
            Без воды. Всё только по существу.</p>
            <p class="lead my-3">Ценим наших читателей и их время!</p>
        </div>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">Наша команда</h2>
                <p><strong>Аналитик:</strong></p>
                <p>Иванов Иван</p>
                <hr>
                <p><strong>Журналисты:</strong></p>
                <ul>
                    <li>Иванов Иван</li>
                    <li>Петров Петр</li>
                    <li>Иванов Иван</li>
                    <li>Петров Петр</li>
                </ul>
                <hr>
                <p><strong>Главный редактор:</strong></p>
                <p>Иванов Иван</p>
                <hr>
                <p><strong>Редакторы:</strong></p>

                <ul>
                    <li>Иванов Иван</li>
                    <li>Петров Петр</li>
                    <li>Иванов Иван</li>
                    <li>Петров Петр</li>
                </ul>
                <hr>
                <h2 class="blog-post-title">Контакты</h2>
               <div>
                   <p>Email:</p>
                   <p>Phone:</p>
                   <div>

        </div><!-- /.blog-main -->


    </div><!-- /.row -->

</main><!-- /.container -->

<x-footer text="Новостной портал"></x-footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/js/holder.min.js') }}"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
