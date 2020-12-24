<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span>
                <a href="/admin/category">Управление категориями</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Удалить категорию</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="icon-delete display-3 text-success"></span>
                <h2 class="display-3 text-black">Удалить категорию #<?php echo $id; ?></h2>
                <form method="post">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <input class="btn btn-outline-primary btn-sm btn-block" value="Удалить" type="submit" name="submit">

                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="/admin/category" class="btn btn-outline-primary btn-sm btn-block">Категории</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>