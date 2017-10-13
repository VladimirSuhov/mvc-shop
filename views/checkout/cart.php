<?php require_once ROOT . '/views/layout/header.php';?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <?php if($productsInCart):?>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="quantity">Количество</td>
                    <td class="total">Всего</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <?php print_r($products); ?>
                <tr>
                    <td class="cart_product">
                        <a href="/product/<?php echo $product['id'];?>"><img src="<?php echo $product['image'];?>" width="100px" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?php echo $product['name'];?></a></h4>
                        <p>Web ID: <?php echo $product['code'];?></p>
                    </td>
                    <td class="cart_price">
                        <p><?php echo $product['price'];?> $</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href=""> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="<?php $productsInCart[$product['id']]; ?>" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href=""> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price"<?php echo $totalPrice;?>></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    </div>
</section> <!--/#cart_items-->
<?php require_once ROOT . '/views/layout/footer.php';?>