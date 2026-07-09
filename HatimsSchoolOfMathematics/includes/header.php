<?php
if (!isset($pageTitle)) {
    $pageTitle = "Hatim Education Site";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo htmlspecialchars($pageTitle); ?></title>

<meta name="description" content="Hatim Education Site - Mathematics, Programming, Technology, AI, Notes, Tutorials and Exam Preparation.">

<link rel="stylesheet" href="css/style.css">

<link rel="icon" href="images/favicon.png">

</head>

<body>

<header class="site-header">

    <div class="container">

        <div class="logo">

            <a href="index.php">
                Hatim <span>Education Site</span>
            </a>

        </div>

        <nav>

            <ul>

                <li><a href="index.php">Home</a></li>

                <li><a href="blog.php">Blog</a></li>

                <li><a href="tutorials.php">Tutorials</a></li>

                <li><a href="notes.php">Notes</a></li>

                <li><a href="downloads.php">Downloads</a></li>

                <li><a href="contact.php">Contact</a></li>

            </ul>

        </nav>

        <div class="header-right">

            <form action="search.php" method="GET">

                <input
                    type="text"
                    name="search"
                    placeholder="Search..."
                >

                <button type="submit">
                    Search
                </button>

            </form>

            <a href="admin/login.php" class="login-btn">
                Login
            </a>

        </div>

    </div>

</header>

<main>
