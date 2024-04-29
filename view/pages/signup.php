<?php use Core\Session ?>
<!DOCTYPE html>
    <?php view("partials/head"); ?>
    <body>
        <?php view("partials/navbar"); ?>
        <form class="signup-or-login-form" action="/signup" method="POST">
            <input type="text" name="username" placeholder="Choose a username here..." value="<?= old("username"); ?>">
            <input type="text" name="email" placeholder="Enter your e-mail adress here..." value="<?= old("email"); ?>">
            <input type="password" name="password" placeholder="Choose a password here...">
            <button class="signup-or-login-button">Sign Up</button>
        </form>
        <?php if (Session::has("errors")) { view("partials/errors", ["errors" => Session::get("errors")]); } ?>
    </body>
</html>