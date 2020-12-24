<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Управление категориями</strong></div>
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
                                <a class="btn btn-outline-primary btn-sm btn-block" href="/admin/category/create">Добавить категорию</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">ID категории</th>
                                <th class="product-name">Название категории</th>
                                <th class="product-price">Порядковый номер</th>
                                <th class="product-quantity">Статус</th>
                                <th class="product-total"></th>
                                <th class="product-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categoriesList as $category) : ?>
                                <tr>
                                    <td><?php echo $category['id']; ?></td>
                                    <td><?php echo $category['name']; ?></td>
                                    <td><?php echo $category['sort_order']; ?></td>
                                    <td><?php echo \application\models\Category::getStatusText($category['status']); ?></td>
                                    <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать"><span class="icon-edit"></span></a></td>
                                    <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить">X</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>