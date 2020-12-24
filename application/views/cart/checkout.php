<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Главная</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Корзина</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Заказать</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <?php if ($result) : ?>
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="display-3 text-black">Спасибо!</h2>
                    <p class="lead mb-5">Заказ оформлен. Мы Вам перезвоним.</p>
                </div>
            <?php else : ?>
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Детали</h2>
                    <div class="p-3 p-lg-5 border">
                        <form action="/cart/checkout" method="post">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">Имя <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="userName" value="<?php echo $userName; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Фамилия <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="userLName" value="<?php echo $userLName; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Адресс</label>
                                    <input type="text" class="form-control" id="c_address" name="userAddress" placeholder="Street address" value="<?php echo $userAddress; ?>">
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Почта</label>
                                    <input type="email" class="form-control" pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" placeholder="test@gmail.com" title="test@gmail.com" name="userEmail" value="<?php echo $userEmail; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Телефон <span class="text-danger">*</span></label>
                                    <input id="userPhone" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="097-000-00-00" title="097-000-00-00" class="form-control" name="userPhone" value="<?php echo $userPhone; ?>">

                        
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Заметки</label>
                                <textarea name="userComment" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."><?php echo $userComment; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Заказ</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Товар</th>
                                        <th>Итого</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td> <?php echo $product['name']; ?> <strong class="mx-2">x</strong> <?php echo $productsInCart[$product['id']]; ?></td>
                                                <td><?php echo $product['price']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Итого</strong></td>
                                            <td class="text-black font-weight-bold"><strong>$<?php echo $totalPrice; ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li class="text-danger"> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>