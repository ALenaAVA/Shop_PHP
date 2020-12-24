<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0">
        <a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span>
        <a href="/admin/order">Управление заказами</a> <span class="mx-2 mb-0">/</span>
        <strong class="text-black">Просмотр заказа</strong></div>
    </div>
  </div>
</div>


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Просмотр заказа #<?php echo $order['id']; ?></h2>
        <p class="lead mb-5">Информация о заказе:</p>
      </div>
      <div class="col-md-7">
        <div class="site-blocks-table">
          <table class="table-bordered table-striped table">
            <tr>
              <td>Номер заказа</td>
              <td><?php echo $order['id']; ?></td>
            </tr>
            <tr>
              <td>Имя клиента</td>
              <td><?php echo $order['user_name']; ?></td>
            </tr>
            <tr>
              <td>Фамилия клиента</td>
              <td><?php echo $order['user_lname']; ?></td>
            </tr>
            <tr>
              <td>Телефон клиента</td>
              <td><?php echo $order['user_phone']; ?></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td><?php echo $order['user_email']; ?></td>
            </tr>
            <tr>
              <td>Адресс</td>
              <td><?php echo $order['user_address']; ?></td>
            </tr>
            <tr>
              <td>Комментарий клиента</td>
              <td><?php echo $order['user_comment']; ?></td>
            </tr>
            <?php if ($order['user_id'] != 0) : ?>
              <tr>
                <td>ID клиента</td>
                <td><?php echo $order['user_id']; ?></td>
              </tr>
            <?php endif; ?>
            <tr>
              <td><b>Статус заказа</b></td>
              <td><?php echo \application\models\Order::getStatusText($order['status']); ?></td>
            </tr>
            <tr>
              <td><b>Дата заказа</b></td>
              <td><?php echo $order['date']; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-12">
        <p class="lead mb-5">Товары:</p>
      </div>
      <div class="col-md-12">
        <div class="site-blocks-table">
          <table class="table-bordered table-striped table">
            <thead>
              <tr>
                <th>ID товара</th>
                <th>Артикул товара</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product) : ?>
                <tr>
                  <td><?php echo $product['id']; ?></td>
                  <td><?php echo $product['code']; ?></td>
                  <td><?php echo $product['name']; ?></td>
                  <td>$<?php echo $product['price']; ?></td>
                  <td><?php echo $productsQuantity[$product['id']]; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6">
            <a class="btn btn-outline-primary btn-sm btn-block" href="/admin/order">Назад</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>