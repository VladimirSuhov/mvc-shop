
<?php require_once ROOT . '/views/layout/header.php';?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Войдите в ваш аккаунт</h2>
                        <form action="#">
                            <input type="text" placeholder="Имя" />
                            <input type="email" placeholder="Email" />
                            <span>
								<input type="checkbox" class="checkbox">
								Запомнить меня
							</span>
                            <button type="submit" class="btn btn-default">Вход</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php require_once ROOT . '/views/layout/footer.php';?>
