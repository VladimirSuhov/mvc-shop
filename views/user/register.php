<?php require_once ROOT . '/views/layout/header.php';?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 flex-container">
                <div class="register-wrapper">
                <div class="signup-form"><!--sign up form-->
                    <?php if($result): ?>
                        <p>Вы зарегистрированы!</p>
                    <?php else: ?>
                    <?php if( isset($errors) && is_array($errors) ): ?>
                        <ul style="padding-left: 0">
                            <?php foreach ($errors as $error): ?>
                                <li style="color: red"><?php echo $error;?></li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                    <h2>Зарегистрируйтесь</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name?>"/>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email?>"/>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password?>"/>
                        <button type="submit" name="submit" class="btn btn-default">Регистрация</button>
                    </form>
                </div><!--/sign up form-->
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php require_once ROOT . '/views/layout/footer.php';?>
