<!DOCTYPE html>
<html lang="en">

<head>
    <title>ShopMax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="/public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/magnific-popup.css">
    <link rel="stylesheet" href="/public/css/jquery-ui.css">
    <link rel="stylesheet" href="/public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/public/css/aos.css">
    <link rel="stylesheet" href="/public/css/style.css">

</head>

<body>
    <div class="site-wrap">
        <div class="site-navbar bg-white py-2">

            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="index.html" class="/public/js-logo-clone">ShopMax</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/catalog/">Shop</a></li>
                                <li><a href="/about/">About</a></li>
                                <li><a href="/contact/">Contact</a></li>
                                <?php if (application\models\User::isGuest()) : ?>
                                    <li class="has-children ">
                                        <a href="#"><span class="icon-user"></span></a>
                                        <ul class="dropdown">
                                            <li><a href="/user/login">Login</a></li>
                                            <li><a href="/user/register">Register</a></li>
                                        </ul>
                                    </li>
                                <?php else : ?>
                                    <li><a href="/cabinet/" class="icons-btn d-inline-block"><span class="icon-user"></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                        <a href="/cart/" class="icons-btn d-inline-block bag">
                            <span class="icon-shopping-bag"></span>
                            <span class="number" id="cart-count"><?php echo \application\models\Cart::countItems(); ?></span> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class=" text-black"><b>Ошибка 404</b>. Страница не найдена</h4>
                    </div>
                </div>
            </div>
        </div>

        <footer class="site-footer custom-border-top">
            <div class="container">
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>