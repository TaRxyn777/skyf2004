<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf8">
        <title> Концепция MVC</title>
        <link rel="stylesheet" href="#">
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootsrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-
        Gn5384xqQlaoWXA+058RXPg6fy4Iwh0E263XmFcJISAGgFAW/dais6JXm"
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Концепция MVC</h1>
        <a href= "admin">Вход в админ-панель</a>

        <div>
            <?php foreach ($articles as $a): ?>
                <div class="article">
                    <h3><a herf="article.php?id=<?=$a['id']?><?=$a['title']?></a></h3>

                    <em>Опубликовано: <?=$a['date']?></em>
                    <p><?=$a['content']?></p>
            </div>
            <?php endforeach ?>
            </div>
            <footer>
                <p>Концепция MVC <br>Copyright &copy; 2018</p>
            </footer>
            </div>
            </body>
            </html>
