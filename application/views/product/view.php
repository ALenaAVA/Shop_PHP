<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Главная</a> <span class="mx-2 mb-0">/</span> <a href="shop.html">Магазин</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Gray Shoe</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="item-entry">
          <a href="#" class="product-item md-height bg-gray d-block">
            <img src="<?php echo application\models\Product::getImage($product['id']); ?>" alt="Image" class="img-fluid">
          </a>

        </div>

      </div>
      <div class="col-md-6">
        <h2 class="text-black"><?php echo $product['name']; ?></h2>
        <p><?php echo $product['description']; ?></p>
        <p class="mb-4">Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p>
        <p><strong class="text-primary h4">$<?php echo $product['price']; ?></strong></p>
        <div class="col-4 col-md-6 m-auto">
          <button class="btn btn-outline-primary btn-sm btn-block add-to-cart" data-id="<?php echo $product['id']; ?>">Купить</button>
        </div>
      </div>
    </div>
  </div>
</div>