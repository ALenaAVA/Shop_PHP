<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Управление заказами</strong>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="site-blocks-table">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">ID заказа</th>
                            <th class="product-name">Покупатель</th>
                            <th class="product-price">Телефон</th>
                            <th class="product-quantity">Дата</th>
                            <th class="product-total">Статус</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ordersList as $order) : ?>
                            <tr>
                                <td><a href="/admin/order/view/<?php echo $order['id']; ?>">
                                        <?php echo $order['id']; ?>
                                    </a></td>
                                <td><?php echo $order['user_name']; ?></td>
                                <td><?php echo $order['user_phone']; ?></td>
                                <td><?php echo $order['date']; ?></td>
                                <td>
                                    <?php echo \application\models\Order::getStatusText($order['status']); ?>
                                </td>
                                <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть"><span class="icon-eye"></span></a></td>
                                <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><span class="icon-edit"></span></a></td>
                                <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить">X</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>