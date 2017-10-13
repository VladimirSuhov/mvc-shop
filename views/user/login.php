<?php require_once ROOT . '/views/layout/header.php';?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <div class="login-form"><!--login form-->

                        <?php if( isset($errors) && is_array($errors) ): ?>
                            <ul style="padding-left: 0">
                                <?php foreach ($errors as $error): ?>
                                    <li style="color: red"><?php echo $error;?></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                        <h2>Войдите в ваш аккаунт</h2>
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Email" value="<?php echo $email?>"/>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password?>"/>
                            <span>
								<input type="checkbox" class="checkbox">
								Запомнить меня
							</span>
                            <button type="submit" name="submit" class="btn btn-default">Вход</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php require_once ROOT . '/views/layout/footer.php';
