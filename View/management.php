<?php require_once('header.php') ?>

    <h2>Authors</h2>
    <table class="table">
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Bio</th>
            <th scope="col">Birth Date</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>
        <tbody>
            <?php if(empty(count($authors))) : ?>
            <tr>
                <td colspan="5">No authors found, <a href="">create</a> a new one!.</td>
            </tr>
            <?php else : ?>
                <?php foreach($authors as $author) : ?>
                    <tr>
                        <td><?=$author->getName()?></td>
                        <td><?=$author->getEmail()?></td>
                        <td><?=$author->getBio()?></td>
                        <td><?=$author->getBirthDate()?></td>
                        <td><a href="">Edit</a></td>
                        <td><a href="">Delete</a></td>
                    </tr>
                <?php endforeach;?>
            <?php endif; ?>
        </tbody>
    </table>
    
    <h2>Articles</h2>
    <table class="table">
        <thead>
            <th scope="col">Title</th>
            <th scope="col">Publish Date</th>
            <th scope="col">Author</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>
        <tbody>
            <?php if(empty(count($articles))) : ?>
            <tr>
                <td colspan="5">No articles found, <a href="">create</a> a new one!.</td>
            </tr>
            <?php else : ?>
                <?php foreach($articles as $article) : ?>
                    <tr>
                        <td><?=$article->getTitle()?></td>
                        <td><?=$article->getPublishDate()?></td>
                        <td><?=$article->getAuthor()->getName()?></td>
                        <td><a href="page?controller=ArticleController&action=editArticle&id=<?=$article->getId()?>">Edit</a></td>
                        <td><a href="page?controller=ArticleController&action=deleteArticle&id=<?=$article->getId()?>">Delete</a></td>
                    </tr>
                <?php endforeach;?>
            <?php endif; ?>
        </tbody>
    </table>
    
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary" role="button" href="">New Author</a>
            <a class="btn btn-secondary" role="button" href="page?controller=ArticleController&action=newArticle">New Article</a>
        </div>
    </div>
    
<?php require_once('footer.php') ?>