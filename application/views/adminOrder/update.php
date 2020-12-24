<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/admin">Админпанель</a> <span class="mx-2 mb-0">/</span>
                <a href="/admin/order">Управление заказ</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Редактировать заказ</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black"> Редактировать заказ #<?php echo $id; ?></h2>
            </div>
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="p-3 p-lg-5 border">
                    <form action="/admin/order/update/<?php echo $order['id'] ?>" method="post">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="userName" class="text-black">Имя клиента<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="userName" value="<?php echo $order['user_name']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="userLName" value="<?php echo $order['user_lname']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="userAddress" class="text-black">Address</label>
                                <input type="text" class="form-control" name="userAddress" placeholder="Street address" value="<?php echo $order['user_address']; ?>">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Email Address</label>
                                <input type="text" class="form-control" name="userEmail" value="<?php echo $order['user_email']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="userPhone" class="text-black">Телефон клиента<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="userPhone" value="<?php echo $order['user_phone']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="c_order_notes" class="text-black">Статус</label>
                            <select name="status">
                                <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                                <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                                <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                                <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Save">
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