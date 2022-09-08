<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/ARM/admin/Assets/image/favicon.ico">

    <title>Авторизация</title>

	<link href="/ARM/content/themes/default/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="/ARM/content/themes/default/css/simplelineicons.github.io-master  /css/simple-line-icons.css">
    <link href="/ARM/admin/Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ARM/admin/Assets/css/login.css" rel="stylesheet">

</head>

<body>


<div class="container">
	<div class="screen">
		<div class="screen__content">

			<p class="text">Авторизация</p>
			
			<form class="login" role="form" method ="POST" action = "/ARM/admin/auth/">
				<div class="login__field">
					<i class="icon-user login__icon"></i>
					<input type="text" name="login" class="login__input" placeholder="Фамилия И.О." autocomplete="off">
					<ul class='login_search_result'></ul>
				</div>
				<div class="login__field">
					<i class="icon-lock login__icon"></i>
					<!--i class="login__icon fas fa-lock"></i-->
					<input type="password" name="password" class="login__input" placeholder="Пароль">
				</div>
				<button class="button button__submit">
					<span class="button__text">Войти</span>
					<i class="icon-control-play button__icon"></i>
				</button>				
			</form>
			<div class="social">
				<p>ПК "АРМ Инспектора"</p>
			</div>
			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<script src="/ARM/admin/Assets/js/jquery-2.0.3.min.js"></script>
<script src="/ARM/admin/Assets/js/login-script.js"></script>
</body>
</html>
