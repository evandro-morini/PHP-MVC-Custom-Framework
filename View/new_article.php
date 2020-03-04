<?php require_once('header.php') ?>

    <div class="row">
        <div class="col-md-5">
            <h4>New Article</h4>
        </div>
    </div>
    <?php if(isset($success) && $success==1): ?>
        <div class="col-md-5 alert alert-success">
            A new Article is available!
        </div>
    <?php elseif(isset($success) && $success==2): ?>
        <div class="col-md-5 alert alert-danger">
            Sorry! An error has occurred...
        </div>
    <?php endif; ?>
    <form method="post" action="page?controller=ArticleController&action=newArticle">
        <div class="row">
            <div class="col-md-5">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label for="content">Content</label>
                <textarea class="form-control" rows="6" id="content" name="content" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <hr class="mb-3">
                <a class="btn btn-secondary" role="button" href="page?controller=AdminController&action=management" role="button">Return to Management</a>
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Send">
            </div>
        </div>
    </form>

<?php require_once('footer.php') ?>