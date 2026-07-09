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

$postQuery = "SELECT * FROM posts WHERE id=$id LIMIT 1";
$postResult = mysqli_query($conn, $postQuery);

if(mysqli_num_rows($postResult)==0)
{
    redirect("posts.php");
}

$post = mysqli_fetch_assoc($postResult);

$catQuery = "SELECT * FROM categories WHERE status=1";
$categories = mysqli_query($conn,$catQuery);

$message = "";

if(isset($_POST['update_post']))
{

    $title = clean($_POST['title']);
    $slug = createSlug($title);
    $category = $_POST['category'];
    $excerpt = clean($_POST['excerpt']);
    $content = $_POST['content'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    $imageName = $post['featured_image'];

    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
    {

        $imageName = time()."_".$_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/".$imageName
        );

    }


    $update = "
    UPDATE posts SET

    category_id='$category',
    title='$title',
    slug='$slug',
    excerpt='$excerpt',
    content='$content',
    featured_image='$imageName',
    post_type='$type',
    status='$status'

    WHERE id='$id'
    ";

    if(mysqli_query($conn,$update))
    {
        $message = "Post updated successfully.";

        $post = mysqli_fetch_assoc(
            mysqli_query($conn,"SELECT * FROM posts WHERE id=$id")
        );
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

<title>Edit Post</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<section class="container py">

<h1>Edit Post</h1>

<p><?php echo $message; ?></p>

<form method="POST" enctype="multipart/form-data">

<label>Title</label>

<input
type="text"
name="title"
value="<?php echo clean($post['title']); ?>"
required>

<br><br>

<label>Category</label>

<select name="category">

<?php

while($cat=mysqli_fetch_assoc($categories))
{

?>

<option
value="<?php echo $cat['id']; ?>"
<?php if($cat['id']==$post['category_id']) echo "selected"; ?>>

<?php echo clean($cat['name']); ?>

</option>

<?php

}

?>

</select>

<br><br>

<label>Excerpt</label>

<textarea name="excerpt"><?php echo clean($post['excerpt']); ?></textarea>

<br><br>

<label>Content</label>

<textarea
name="content"
rows="10"><?php echo clean($post['content']); ?></textarea>

<br><br>

<label>Current Image</label>

<br>

<?php

if($post['featured_image']!="")
{

?>

<img
src="../uploads/<?php echo $post['featured_image']; ?>"
width="200">

<?php

}

?>

<br><br>

<label>Change Image</label>

<input
type="file"
name="image"
accept="image/*">

<br><br>

<label>Type</label>

<select name="type">

<option value="blog" <?php if($post['post_type']=="blog") echo "selected"; ?>>Blog</option>

<option value="tutorial" <?php if($post['post_type']=="tutorial") echo "selected"; ?>>Tutorial</option>

<option value="note" <?php if($post['post_type']=="note") echo "selected"; ?>>Note</option>

<option value="news" <?php if($post['post_type']=="news") echo "selected"; ?>>News</option>

</select>

<br><br>

<label>Status</label>

<select name="status">

<option value="published" <?php if($post['status']=="published") echo "selected"; ?>>Published</option>

<option value="draft" <?php if($post['status']=="draft") echo "selected"; ?>>Draft</option>

</select>

<br><br>

<button
class="btn"
name="update_post">

Update Post

</button>

</form>

</section>

</body>

</html>
