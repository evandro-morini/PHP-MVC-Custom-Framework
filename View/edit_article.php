<?php require_once('header.php') ?>

    <div class="row">
        <div class="col-md-5">
            <h4>Edit Article</h4>
        </div>
    </div>
    <?php if(isset($success) && $success==1): ?>
        <div class="col-md-5 alert alert-success">
            Article updated!
        </div>
    <?php elseif(isset($success) && $success==2): ?>
        <div class="col-md-5 alert alert-danger">
            Sorry! An error has occurred...
        </div>
    <?php endif; ?>
    <form method="post" action="page?controller=ArticleController&action=editArticle&id=<?=$article->getId()?>">
        <div class="row">
            <div class="col-md-5">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?=$article->getTitle()?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label for="content">Content</label>
                <textarea class="form-control" rows="6" id="content" name="content" required><?=$article->getContent()?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label for="content">Author</label>
                <select class="custom-select d-block w-100" id="author" name="author" required>
                    <option value="">Choose...</option>
                    <?php foreach($authors as $author) : ?>
                    <option value="<?=$author->getId()?>" <?=$article->getAuthor()->getId()==$author->getId()?'selected':''?>>
                        <?=$author->getName()?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <hr class="mb-3">
                <input type="hidden" name="id" value="<?=$article->getId()?>">
                <a class="btn btn-secondary" role="button" href="page?controller=AdminController&action=management" role="button">Return to Management</a>
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Send">
            </div>
        </div>
    </form>

<?php require_once('footer.php') ?>