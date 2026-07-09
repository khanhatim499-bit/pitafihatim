<?php

session_start();

require_once "../includes/db.php";
require_once "../includes/functions.php";


if(!isLoggedIn())
{
    redirect("login.php");
}


$message = "";


/* Get categories */

$catQuery = "SELECT * FROM categories WHERE status=1";

$categories = mysqli_query($conn,$catQuery);



if(isset($_POST['add_post']))
{

    $title = clean($_POST['title']);

    $slug = createSlug($title);

    $category = $_POST['category'];

    $excerpt = clean($_POST['excerpt']);

    $content = $_POST['content'];

    $type = $_POST['type'];

    $status = $_POST['status'];

    $author = $_SESSION['user_id'];



    $query = "
    INSERT INTO posts
    (
    category_id,
    author_id,
    title,
    slug,
    excerpt,
    content,
    post_type,
    status
    )

    VALUES
    (
    '$category',
    '$author',
    '$title',
    '$slug',
    '$excerpt',
    '$content',
    '$type',
    '$status'
    )
    ";


    if(mysqli_query($conn,$query))
    {
        $message = "Post added successfully";
    }

    else
    {
        $message = mysqli_error($conn);
    }

}


?>


<!DOCTYPE html>

<html>

<head>

<title>
Add New Post
</title>

<link rel="stylesheet" href="../css/style.css">

</head>


<body>


<section class="container py">


<h1>
Write New Article
</h1>


<?php echo $message; ?>


<form method="POST">


<label>
Title
</label>

<input 
type="text"
name="title"
required>



<label>
Category
</label>


<select name="category">


<?php

while($cat=mysqli_fetch_assoc($categories))
{

?>

<option value="<?php echo $cat['id']; ?>">

<?php echo $cat['name']; ?>

</option>


<?php

}

?>

</select>




<label>
Excerpt
</label>


<textarea name="excerpt"></textarea>



<label>
Content
</label>


<textarea 
name="content"
rows="10">
</textarea>




<label>
Type
</label>


<select name="type">

<option value="blog">
Blog
</option>

<option value="tutorial">
Tutorial
</option>

<option value="note">
Note
</option>

<option value="news">
News
</option>

</select>



<label>
Status
</label>


<select name="status">

<option value="published">
Published
</option>


<option value="draft">
Draft
</option>


</select>



<br><br>


<button 
class="btn"
name="add_post">

Publish Post

</button>



</form>


</section>


</body>

</html>
