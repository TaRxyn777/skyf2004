<?php
require_once("../database.php");
require_once("../models/articles.php");

$link = db_connect();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

if ($action == "add") {
    if (!empty($_POST)) {
        $result = articles_new($link, $_POST['title'], $_POST['date'], $_POST['content']);
        if ($result) {
            header("Location: index.php");
            exit;
        } else {
            echo "Ошибка при добавлении статьи.";
        }
    }
    include("../views/article_admin.php");
} elseif ($action == "edit") {
    if (!isset($_GET['id'])) header("Location: index.php");
    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0) {
        articles_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['content']);
    }
    $article = articles_get($link, $id);
    include("../views/article_admin.php");
} elseif ($action == "delete") {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }
    $id = $_GET['id'];

    if (isset($_POST['confirm']) && $_POST['confirm'] == 'Да') {
        $article = articles_delete($link, $id);
        header("Location: index.php");
        exit;
    } elseif (isset($_POST['confirm']) && $_POST['confirm'] == 'Нет') {
        // Если пользователь нажал "Нет", перенаправляем его обратно
        header("Location: index.php");
        exit;
    } else {
        // Если пользователь попал на страницу удаления напрямую, выводим форму подтверждения
        $article = articles_get($link, $id);
        ?>
        <div style="text-align: center; font-size: 28px;">
            <p>Вы уверены, что хотите удалить статью "<?php echo $article['title']; ?>"?</p>
            <form method="post">
                <input type="submit" name="confirm" value="Да" style="margin-right: 20px;">
                <input type="submit" name="confirm" value="Нет">
            </form>
        </div>
        <?php
    }
} else {
    $articles = articles_all($link);
    include("../views/articles_admin.php");
}
?>