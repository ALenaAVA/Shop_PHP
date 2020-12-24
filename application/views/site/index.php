  <div class="site-section">
      <div class="container">
          <div class="title-section mb-5">
              <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
          </div>
          <div class="row align-items-stretch">
              <div class="col-lg-8">
                  <div class="product-item sm-height full-height bg-gray">
                      <a href="/category/13" class="product-category"><?= $categories[0]['name'] ?></a>
                      <img src="/public/images/model_4.png" alt="Image" class="img-fluid">
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="product-item sm-height bg-gray mb-4">
                      <a href="/category/14" class="product-category"><?= $categories[1]['name'] ?></a>
                      <img src="/public/images/model_5.png" alt="Image" class="img-fluid">
                  </div>

                  <div class="product-item sm-height bg-gray">
                      <a href="/category/15" class="product-category"><?= $categories[2]['name'] ?></a>
                      <img src="/public/images/purepng.png" alt="Image" class="img-fluid">
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="site-section">
      <div class="container">
          <div class="row">
              <div class="title-section mb-5 col-12">
                  <h2 class="text-uppercase">Популярные продукты</h2>
              </div>
          </div>
          <div class="row">
              <?php if (empty($latestProducts)) : ?>
                  <p>Список товаров пуст.</p>
              <?php else : ?>
                  <?php foreach ($latestProducts as $product) : ?>
                      <div class="col-lg-4 col-md-6 item-entry mb-4">
                          <a href="/product/<?php echo $product['id']; ?>" class="product-item md-height bg-gray d-block">
                          <!-- <img src="<?php echo application\models\Product::getImage($product['id']); ?>" alt="" /> -->
                              <img src="<?php echo application\models\Product::getImage($product['id']); ?>" alt="Image" class="img-fluid">
                          </a>
                          <h2 class="item-title"><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h2>
                          <strong class="item-price"><?php echo $product['price']; ?> грн</strong>
                          <div class="col-4 col-md-6 m-auto"> 
                              <button class="btn btn-outline-primary btn-sm btn-block add-to-cart" data-id="<?php echo $product['id']; ?>">Купить</button>
                          </div>
                      </div>
                  <?php endforeach; ?>
              <?php endif; ?>
          </div>
      </div>
  </div>