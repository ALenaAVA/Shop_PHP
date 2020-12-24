<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-9 order-1">
                <div class="row align">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left">
                            <h2 class="text-black h5">Товары</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <?php foreach ($productsFound as $product) : ?>
                        <div class="col-lg-6 col-md-6 item-entry mb-4">

                            <!-- <img src="<?php echo application\models\Product::getImage($product['id']); ?>" alt="" /> -->

                            <a href="/product/<?php echo $product['id']; ?>" class="product-item md-height bg-gray d-block">
                                <img src="<?php echo application\models\Product::getImage($product['id']); ?>" alt="Image" class="img-fluid">
                            </a>
                            <h2 class="item-title">
                                <a href="/product/<?php echo $product['id']; ?>">
                                    <?php echo $product['name']; ?>
                                </a></h2>
                            <strong class="item-price">$<?php echo $product['price']; ?></strong>
                            <div class="col-4 col-md-6 m-auto">
                                <button class="btn btn-outline-primary btn-sm btn-block add-to-cart" data-id="<?php echo $product['id']; ?>">Купить</button>
                            </div>
                            <?php if ($product['is_new']) : ?>
                                <img src="/public/images/home/new.png" class="new" alt="" />
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="site-block-27">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- filters -->

            <div class="col-md-3 order-2 mb-5 mb-md-0">
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Категории</h3>
                    <ul class="list-unstyled mb-0">
                        <?php foreach ($categories as $categoryItem) : ?>
                            <li class="mb-1">
                                <a href="/category/<?php echo $categoryItem['id']; ?>" class="d-flex">
                                    <span><?php echo $categoryItem['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
<!-- 
                <div class="border p-4 rounded mb-4">
                    <div class="mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                        <div id="slider-range" class="border-primary"></div>
                        <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>