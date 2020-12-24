<section> <div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="post">
                <h2 class="title"><a href="/blog/<?php echo $newsItem['id']; ?>"><?php echo $newsItem['title']; ?></a></h2>
                <br />
                <p><b><?php echo $newsItem['author_name']; ?></b> at <?php echo $newsItem['date']; ?></p>
                <div class="entry">
                    <p><?php echo $newsItem['content']; ?></p>
                </div>
                <div class="meta">
                    <p class="links"><a href="/blog/" class="comments">Back to all news</a></p>
                </div>
            </div>
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