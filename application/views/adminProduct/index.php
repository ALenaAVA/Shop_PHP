<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Управление товарами</strong>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <div class="col-md-7">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <a class="btn btn-outline-primary btn-sm btn-block" href="/admin/product/create">Добавить товар</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID товара</th>
                                <th>Артикул</th>
                                <th>Название товара</th>
                                <th>Цена</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productsList as $product) : ?>
                                <tr>
                                    <td><?php echo $product['id']; ?></td>
                                    <td><?php echo $product['code']; ?></td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><span class="icon-edit"></span></a></td>
                                    <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить">X</a></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>