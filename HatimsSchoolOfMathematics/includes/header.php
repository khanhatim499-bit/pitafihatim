<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo SITE_NAME; ?></title>

<meta name="description" content="Hatim's School of Mathematics - Learn Mathematics with notes, blogs, solved examples and tutorials.">

<link rel="stylesheet" href="/css/style.css">

</head>

<body>

<header class="site-header">

    <div class="container">

        <div class="logo">

            <a href="<?php echo SITE_URL; ?>">
                Hatim's School of Mathematics
            </a>

        </div>

        <nav>

            <ul>

                <li><a href="<?php echo SITE_URL; ?>">Home</a></li>

                <li><a href="<?php echo SITE_URL; ?>/about.php">About</a></li>

                <li><a href="<?php echo SITE_URL; ?>/blog.php">Blog</a></li>

                <li><a href="<?php echo SITE_URL; ?>/notes.php">Notes</a></li>

                <li><a href="<?php echo SITE_URL; ?>/category.php">Categories</a></li>

                <li><a href="<?php echo SITE_URL; ?>/contact.php">Contact</a></li>

            </ul>

        </nav>

        <div class="header-right">

            <form action="<?php echo SITE_URL; ?>/search.php" method="GET">

                <input
                    type="text"
                    name="search"
                    placeholder="Search..."
                >

                <button type="submit">Search</button>

            </form>

            <a class="login-btn" href="<?php echo SITE_URL; ?>/login.php">
                Login
            </a>

        </div>

    </div>

</header>
