<div class="custom-border-bottom py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Главная</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Контакты</strong></div>
    </div>
  </div>
</div>


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Обращение</h2>
      </div>
      <div class="col-md-7">
        <form action="/contact" method="post">

          <div class="p-3 p-lg-5 border">
            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_fname" class="text-black">Имя <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="userName">
              </div>
              <div class="col-md-6">
                <label for="c_lname" class="text-black">Фамилия <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="userLName">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_email" class="text-black">Почта <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="c_email" name="userEmail">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_subject" class="text-black">Тема </label>
                <input type="text" class="form-control" name="subject">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_message" class="text-black">Сообщение </label>
                <textarea name="userText" id="c_message" cols="30" rows="7" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-12">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Отправить">
              </div>
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