<?php require_once('header.php') ?>

<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
            <a href="#">
                <h2 style="text-align: center"><?=$article->getTitle()?></h2>
            </a>
            <p style="text-align: right;"><i>Posted by <?=$article->getAuthor()->getName()?> on <?=$article->getPublishDate()?></i></p>
            <p style="text-align: justify;"><?=$article->getContent()?></p>
            <p><a href="index.php">Return to Articles</a></p>
        </div>
    </div>
</div>

<?php require_once('footer.php') ?>