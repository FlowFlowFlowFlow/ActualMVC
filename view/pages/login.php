<?php use Core\Session ?>
<!DOCTYPE html>
    <?php view("partials/head"); ?>
    <body>
        <?php view("partials/navbar"); ?>
        <form class="signup-or-login-form" action="/login" method="POST">
            <input type="text" name="email" placeholder="Enter your e-mail adress here..." value="<?= old("email"); ?>">
            <input type="password" name="password" placeholder="Enter your password here...">
            <button class="signup-or-login-button">Log In</button>
        </form>
        <?php if (Session::has("errors")) { view("partials/errors", ["errors" => Session::get("errors")]); } ?>
    </body>
</html>