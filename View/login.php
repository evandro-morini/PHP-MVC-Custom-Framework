<?php require_once('header.php') ?>

    <div style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%)">
        <form method="post" action="page?controller=LoginController&action=login">
            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
            <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" required>
            <input type="submit" name="submit" id="submit" value="Login" class="btn btn-primary mb-2">
            <p><?=isset($error)?$error:''?></p>
        </form>
    </div>

<?php require_once('footer.php') ?>