<?php require_once('header.php') ?>

    <?php foreach($articles as $article): ?>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href="page?controller=ArticleController&action=showArticle&id=<?=$article->getId()?>">
                        <h2 class="post-title"><?=$article->getTitle()?></h2>
                    </a>
                    <p><?=mb_substr($article->getContent(), 0, 250).'...'?></p>
                </div>
                <hr>
            </div>
        </div>
    <?php endforeach?>

<?php require_once('footer.php') ?>