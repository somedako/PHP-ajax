<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Test';
    require_once __DIR__ . '/blocks/head.php'
    ?>
</head>
<body>

    <?php require_once __DIR__ . '/blocks/header.php'?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
               <?php

                    require_once 'connection.php';

                    $sql = 'SELECT * FROM articles ORDER BY date DESC';
                    $query = $pdo->query($sql);
                    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        echo "<h2>$row->title</h2>
                        <p>$row->intro</p>
                        <p><b>Автор статьи:</b> <mark>$row->author</mark></p>
                        <a href='/news.php?id=$row->id' title='$row->title'>
                            <button class='btn btn-warning mb-5'>Подробнее</button>
                        </a>";
                    }
               ?>
            </div>

            <?php require_once __DIR__ . '/blocks/aside.php'?>

        </div>
    </main>

    <?php require_once __DIR__ . '/blocks/footer.php'?>
</body>
</html>
