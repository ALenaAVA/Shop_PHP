<section></section>
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <?php if (empty($newsList)) : ?>
                <p>Список новостей пуст</p>
            <?php else : ?>
                <?php foreach ($newsList as $newsItem) : ?>
                    <div class="post">
                        <h2 class="title"><a href="/blog/<?php echo $newsItem['id']; ?>"><?php echo $newsItem['title']; ?></a></h2>
                        <p class="byline"><?php echo $newsItem['date']; ?></p>
                        <div class="entry">
                            <p><?php echo $newsItem['short_content']; ?></p>
                        </div>
                        <div class="meta">
                            <p class="links"><a href="/blog/<?php echo $newsItem['id']; ?>" class="comments">Read more</a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <div id="sidebar">
                <ul>
                    <li>
                        <h2 class="categories">Lorem Ipsum</h2>
                        <ul>
                            <li><a href="#">Fusce dui neque fringilla</a></li>
                            <li><a href="#">Eget tempor eget nonummy</a></li>
                            <li><a href="#">Magna lacus bibendum mauris</a></li>
                            <li><a href="#">Nec metus sed donec</a></li>
                            <li><a href="#">Magna lacus bibendum mauris</a></li>
                            <li><a href="#">Velit semper nisi molestie</a></li>
                            <li><a href="#">Eget tempor eget nonummy</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>