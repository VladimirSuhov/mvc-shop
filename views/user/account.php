<?php require_once ROOT . '/views/layout/header.php';?>

<section>
    <div class="container">
        <div class="row">
        <h1>Кабинет пользователя</h1>
            <h3>Привет, <?php echo $user['name'];?></h3>
            <ul>
                <li><a href="/account/edit">Редактировать профиль</a></li>
            </ul>
        </div>
    </div>
</section>

<?php require_once ROOT . '/views/layout/footer.php';?>
