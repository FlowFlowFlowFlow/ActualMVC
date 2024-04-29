<ul class="navbar">
    <li class="navbar-item float-left"><?= url_is("/") || url_is("/first-page")  ? '<p class="current">First Page</p>' : '<a href="/first-page">First Page</a>' ?></li>
    <li class="navbar-item float-left"><?= url_is("/second-page") ? '<p class="current">Second Page</p>' : '<a href="/second-page">Second Page</a>' ?></li>
    <li class="navbar-item float-left"><?= url_is("/third-page") ? '<p class="current">Third Page</p>' : '<a href="/third-page">Third Page</a>' ?></li>
    <li class="navbar-item navbar-in-between-pages-and-signup-login"><p><wbr></p></li>
    <?php if ($_SESSION["user"] ?? false) : ?>
        <li class="navbar-item float-right"><p><?= $_SESSION["user"]["username"] ?></p></li>
        <li class="navbar-item float-right">
            <form method="POST" action="/login">
                <input type="hidden" name="_method" value="DELETE" />
                <button class="navbar-button">Log Out</button>
            </form>
        </li>
    <?php else : ?>
        <li class="navbar-item float-right"><?= url_is("/login") ? '<p class="current">Log In</p>' : '<a href="/login">Log In</a>' ?></li>
        <li class="navbar-item float-right"><?= url_is("/signup") ? '<p class="current">Sign Up</p>' : '<a href="/signup">Sign Up</a>' ?></li>
    <?php endif; ?>
</ul>
<div class="empty-space-overlaid-by-navbar"><wbr></div>