<?php

session_start();

require_once "../includes/db.php";
require_once "../includes/functions.php";

if(!isLoggedIn())
{
    redirect("login.php");
}

if(!isset($_GET['id']))
{
    redirect("posts.php");
}

$id = (int)$_GET['id'];

// Get image filename before deleting
$result = mysqli_query($conn, "SELECT featured_image FROM posts WHERE id=$id LIMIT 1");

if(mysqli_num_rows($result) == 1)
{
    $post = mysqli_fetch_assoc($result);

    if(!empty($post['featured_image']))
    {
        $imagePath = "../uploads/" . $post['featured_image'];

        if(file_exists($imagePath))
        {
            unlink($imagePath);
        }
    }
}

// Delete post
mysqli_query($conn, "DELETE FROM posts WHERE id=$id");

// Back to posts page
redirect("posts.php");

?>
