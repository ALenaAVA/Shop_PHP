<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Главная</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Кабинет</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 text-center">
                <h2 class="display-3 text-black">Кабинет пользователя</h2>
                <p class="lead mb-5">Привет, <?php echo $user['name']; ?>!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">

                <form action="#" method="post">

                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <a class="btn btn-outline-primary btn-sm btn-block" href="/">Назад</a>
                                <a class="btn btn-outline-primary btn-sm btn-block" href="/cabinet/edit">Редактировать</a>
                                <!-- <a class="btn btn-outline-primary btn-sm btn-block" href="/cabinet/history">History</a> -->
                                <?php if ($_SESSION['user']['role'] === 'admin') : ?>

                                    <a class="btn btn-outline-primary btn-sm btn-block" href="/admin">Панель администратора</a>

                                <?php endif; ?>
                                <a class="btn btn-outline-primary btn-sm btn-block" href="/user/logout">Выход</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>