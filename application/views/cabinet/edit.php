<div class="site-wrap">

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Главная</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Редактировать</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Редактировать</h2>
                </div>
                <div class="col-md-7">
                    <form action="/cabinet/edit" method="post">
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name" class="text-black">Имя <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="name" value="<?= $name ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="text-black">Пароль <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="password" value="<?= $password ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12">
                                    <label for="email" class="text-black">Почта <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="email" value="<?= $email ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Edit" />
                            </div>
                        </div>
                    </form>
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
</div>