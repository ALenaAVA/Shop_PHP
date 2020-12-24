<div class="custom-border-bottom py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Главная</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Корзина</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <?php if ($productsInCart) : ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Изображение</th>
                                    <th class="product-name">Товар</th>
                                    <th class="product-price">Цена</th>
                                    <th class="product-quantity">Количество</th>
                                    <th class="product-total">Итого</th>
                                    <th class="product-remove">Удалить</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="<?php echo application\models\Product::getImage($product['id']); ?>" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><a href="/product/<?php echo $product['id']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a></h2>
                                        </td>
                                        <td><?php echo $product['price']; ?></td>
                                        <td>
                                            <p><?php echo $productsInCart[$product['id']]; ?></p>
                                        </td>
                                        <td><?php echo ($product['price'] * $productsInCart[$product['id']]); ?></td>
                                        <td><a href="/cart/delete/<?php echo $product['id']; ?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <a class="btn btn-outline-primary btn-sm btn-block" href="/">Продолжить покупки</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Итого</h3>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Итого</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">$<?php echo $totalPrice; ?></strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-primary btn-lg btn-block" href="/cart/checkout">Оформить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>