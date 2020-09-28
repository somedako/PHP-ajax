<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Авторизация на сайте';
    require_once __DIR__ . '/blocks/head.php'
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'?>

<main class="container mt-5">
    <div class="row">

        <div class="col-md-8 mb-3">
            <?php if ($_COOKIE['login'] == ''):?>
            <h4>Форма авторизации</h4>
            <form action="" method="">

                <label for="login">Логин</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div  class="alert alert-success mt-2" id="success_block" style="display: none"></div>

                <div  class="alert alert-danger mt-2" id="error_block" style="display: none"></div>

                <button type="button" id="auth_user" class="btn btn-success mt-5">Войти</button>
            </form>
            <?php else: ?>
            <h2><?= $_COOKIE['login']?></h2>
            <button class="btn btn-danger" id="exit_btn">Выйти</button>
            <?php endif; ?>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'?>
    </div>
</main>

<?php require_once __DIR__ . '/blocks/footer.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#auth_user').click(function () {
        let login = $('#login').val();
        let pass = $('#pass').val();

        $.ajax({
            url: 'ajax/auth.php',
            type: 'POST',
            cache: false,
            data: {'login' : login, 'pass' : pass},
            dataType: 'html',
            success: function (data) {
                if(data == 'Готово') {
                    $('#success_block').show();
                    $('#success_block').text('Вы успешно вошли');
                    $('#error_block').hide();
                    document.location.reload(true);
                } else {
                    $('#error_block').show();
                    $('#error_block').text(data);
                }
            }
        });
    });

    $('#exit_btn').click(function () {

        $.ajax({
            url: 'ajax/exit.php',
            type: 'POST',
            cache: false,
            data: {},
            dataType: 'html',
            success: function (data) {
                document.location.reload(true);
            }
        });
    });
</script>
</body>
</html>

