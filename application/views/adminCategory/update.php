<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span>
                <a href="/admin/category">Управление категориями</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Редактировать категорию</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black"> Редактировать категорию "<?php echo $category['name']; ?>"</h2>
            </div>
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="p-3 p-lg-5 border">
                    <form action="#" method="post">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="text-black">Название<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="<?php echo $category['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="sort_order" class="text-black">Порядковый номер<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sort_order" value="<?php echo $category['sort_order']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="c_order_notes" class="text-black">Статус</label>
                            <select name="status">
                                <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                                <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
                            </select> </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
            <?php if (isset($errors) && is_array($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li class="text-danger"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>