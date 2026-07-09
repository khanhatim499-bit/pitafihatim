<?php

session_start();

require_once "../includes/functions.php";


// Check login

if(!isLoggedIn())
{
    redirect("login.php");
}


?>


<!DOCTYPE html>

<html>

<head>

<title>
Admin Dashboard | Hatim Education Site
</title>


<link rel="stylesheet" href="../css/style.css">


</head>


<body>


<header class="admin-header">

<div class="container">


<h2>
Hatim Education Site Admin
</h2>


<a href="logout.php">
Logout
</a>


</div>

</header>



<section class="container py">


<h1>
Welcome, 
<?php echo clean($_SESSION['username']); ?>
</h1>


<div class="dashboard-grid">


<div class="card">

<h3>
Posts
</h3>

<p>
Manage articles and tutorials
</p>

<a href="posts.php" class="btn">
Manage Posts
</a>

</div>



<div class="card">

<h3>
Categories
</h3>

<p>
Create and manage categories
</p>

<a href="categories.php" class="btn">
Categories
</a>

</div>




<div class="card">

<h3>
Media
</h3>

<p>
Manage uploaded images and files
</p>

<a href="media.php" class="btn">
Media Library
</a>

</div>



<div class="card">

<h3>
Downloads
</h3>

<p>
Manage PDF notes and files
</p>

<a href="downloads.php" class="btn">
Downloads
</a>

</div>



</div>


</section>



</body>

</html>
