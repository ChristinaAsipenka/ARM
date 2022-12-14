<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>Авторизация</title>

    <!-- Bootstrap core CSS -->
    <link href="/ARM/admin/Assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/ARM/admin/Assets/css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
		<h2 class="form-signin-heading">Авторизация в ПК "АРМ Инспектора"</h2>
        <form class="form-signin" role="form" method ="POST" action = "/ARM/admin/auth/">

            <p class="form-signin">Введите свои учетные данные</p>
            <input type="text" name="login" class="form-control" placeholder="Логин" autocomplete="off">
			<ul class='search_result login_search_result'></ul>
            
			<input type="password" name="password" class="form-control" placeholder="Пароль">
            
			<label class="checkbox">
                <input type="checkbox" value="remember-me"> запомнить учетные данные
            </label>
			
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Войти">
        </form>

    </div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/ARM/admin/Assets/js/jquery-2.0.3.min.js"></script>
<script src="/ARM/admin/Assets/js/login-script.js"></script>
</body>
</html>