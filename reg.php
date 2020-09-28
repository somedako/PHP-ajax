<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Регистрация на сайте';
    require_once __DIR__ . '/blocks/head.php'
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'?>

<main class="container mt-5">
    <div class="row">

        <div class="col-md-8 mb-3">
            <h4>Форма регистрации</h4>
            <form action="" method="">
                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">

                <label for="login">Логин</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div  class="alert alert-success mt-2" id="success_block" style="display: none"></div>

                <div  class="alert alert-danger mt-2" id="error_block" style="display: none"></div>

                <button type="button" id="reg_user" class="btn btn-success mt-5">Зарегистрироваться</button>
            </form>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'?>
    </div>
</main>

<?php require_once __DIR__ . '/blocks/footer.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#reg_user').click(function () {
    let name = $('#username').val();
    let email = $('#email').val();
    let login = $('#login').val();
    let pass = $('#pass').val();

    $.ajax({
        url: 'ajax/reg.php',
        type: 'POST',
        cache: false,
        data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
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
