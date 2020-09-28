<?php
if ($_COOKIE['login'] == '') {
    header('Locattion: /reg.php');
    exit();
}
?>
<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Добавление статьи';
    require_once __DIR__ . '/blocks/head.php'
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'?>

<main class="container mt-5">
    <div class="row">

        <div class="col-md-8 mb-3">
            <h4>Добавление статьи</h4>
            <form action="" method="">
                <label for="title">Заголовок статьи</label>
                <input type="text" name="title" id="title" class="form-control">

                <label for="intro">Интро статьи</label>
                <textarea name="intro" id="intro" class="form-control"></textarea>

                <label for="text">Текст статьи</label>
                <textarea name="text" id="text" class="form-control"></textarea>

                <div  class="alert alert-success mt-2" id="success_block" style="display: none"></div>

                <div  class="alert alert-danger mt-2" id="error_block" style="display: none"></div>

                <button type="button" id="reg_user" class="btn btn-success mt-5">Добавить статью</button>
            </form>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'?>
    </div>
</main>

<?php require_once __DIR__ . '/blocks/footer.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#reg_user').click(function () {
        let title = $('#title').val();
        let intro = $('#intro').val();
        let text = $('#text').val();


        $.ajax({
            url: 'ajax/add_article.php',
            type: 'POST',
            cache: false,
            data: {'title' : title, 'intro' : intro, 'text' : text},
            dataType: 'html',
            success: function (data) {
                if(data == 'Готово') {
                    $('#success_block').show();
                    $('#success_block').text('Вcе готово');
                    $('#error_block').hide();
                } else {
                    $('#error_block').show();
                    $('#error_block').text(data);
                }
            }
        });
    });
</script>
</body>
</html>
