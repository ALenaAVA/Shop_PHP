9<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span>
                <a href="/admin/product">Управление товарами</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Добавить товар</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Новый товар</h2>
            </div>
            <div class="col-md-6 mb-5 mb-md-0">

                <div class="p-3 p-lg-5 border">
                    <form action="/admin/product/create" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="text-black">Название<span class="text-danger">*</span></label>
                                <input value = "<?= $options['name']?>" type="text" class="form-control" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="code" class="text-black">Артикул <span class="text-danger">*</span></label>
                                <input value = "<?= $options['code']?>"  type="text" class="form-control" name="code">
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="text-black">Стоимость <span class="text-danger">*</span></label>
                                <input value = "<?= $options['price']?>" type="text" class="form-control" name="price">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <p>Категория</p>
                                <select name="category_id">
                                    <?php if (is_array($categoriesList)) : ?>
                                        <?php foreach ($categoriesList as $category) : ?>
                                            <option value="<?php echo $category['id']; ?>">
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="brand" class="text-black">Производитель <span class="text-danger">*</span></label>
                                <input value = "<?= $options['brand']?>" type="text" class="form-control" name="brand">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="image" class="text-black">Изображение</label>
                                <input type="file" class="form-control" name="image" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="text-black">Описание</label>
                            <textarea name="description" cols="30" rows="5" class="form-control"><?= $options['description']?></textarea>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="availability" class="text-black">Наличие на складе</label>
                                <select name="availability">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select> </div>
                            <div class="col-md-6">
                                <label for="is_new" class="text-black">Новинка </label>
                                <select name="is_new">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select> </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="is_recommended" class="text-black">Рекомендуемые </label>
                                <select name="is_recommended">
                                    <option value="1" selected="selected">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="text-black">Статус </label>
                                <select name="status">
                                    <option value="1" selected="selected">Отображается</option>
                                    <option value="0">Скрыт</option>
                                </select> </div>
                        </div>

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