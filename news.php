<!doctype html>
<html lang="ru">
<head>
    <?php
    require_once 'connection.php';

    $sql = 'SELECT * FROM articles WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_GET['id']]);
    $article = $query->fetch(PDO::FETCH_OBJ);


    $website_title = $article->title;
    require_once __DIR__ . '/blocks/head.php'
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">

            <div class="jumbotron">

                <h1><?=$article->title?></h1>
                <span><b>Автор статьи:</b> <mark><?=$article->author?></mark></span>

                <?php
                    $date = date('d ', $article->date);
                    $array = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
                    $date .= $array[date('n', $article->date) - 1];
                    $date .= date(' H:i', $article->date);
                ?>

                <p><b>Дата публикации:</b> <u><?=$date?></u></p>

                <div class="mt-3">
                    <p><?=$article->intro?></p>
                    <p><?=$article->text?></p>
                </div>

                <h3 class="mt-5">Коментарии</h3>
                <form action="/news.php?id=<?=$_GET['id']?>" method="post">

                    <label for="username">Ваше имя</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?=$_COOKIE['login']?>">

                    <label for="mess">Сообщение</label>
                    <textarea  name="mess" id="mess" class="form-control"></textarea>

                    <div  class="alert alert-success mt-2" id="success_block" style="display: none"></div>

                    <div  class="alert alert-danger mt-2" id="error_block" style="display: none"></div>

                    <button type="submit" id="mess_send" class="btn btn-success mt-3 mb-5">Добавить комментарий</button>

                </form>
                <?php if($_POST['username'] != '' && $_POST['mess'] != '') {
                    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                    $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                    $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
                    $query = $pdo->prepare($sql);
                    $query->execute([$username, $mess, $_GET['id']]);
                }


                    $sql = 'SELECT * FROM comments WHERE article_id = :id ORDER BY id DESC';
                    $query = $pdo->prepare($sql);
                    $query->execute(['id' => $_GET['id']]);
                    $comments = $query->fetchAll(PDO::FETCH_OBJ);

                foreach ($comments as $comment) {
                    echo "<div class='alert alert-info mb-2'>
                            <h4>$comment->name</h4>
                            <p>$comment->mess</p>
                          </div>";
                }
                unset($_POST);
                ?>
            </div>

        </div>

        <?php require_once __DIR__ . '/blocks/aside.php'?>

    </div>
</main>

<?php require_once __DIR__ . '/blocks/footer.php'?>
</body>
</html>
