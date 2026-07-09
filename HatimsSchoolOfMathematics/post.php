<?php

$pageTitle = "Article";

require_once "includes/db.php";
require_once "includes/functions.php";

include "includes/header.php";


// Check slug

if(!isset($_GET['slug']))
{
    redirect("blog.php");
}


$slug = clean($_GET['slug']);


// Get post data

$sql = "
SELECT 
posts.*,
categories.name AS category_name,
users.full_name AS author_name

FROM posts

LEFT JOIN categories
ON posts.category_id = categories.id

LEFT JOIN users
ON posts.author_id = users.id

WHERE posts.slug='$slug'
AND posts.status='published'

LIMIT 1
";


$result = mysqli_query($conn,$sql);



if(mysqli_num_rows($result)==0)
{

echo "

<section class='container py'>

<h1>
Article Not Found
</h1>

<p>
The article you are looking for does not exist.
</p>

</section>

";


include "includes/footer.php";

exit();

}



$post = mysqli_fetch_assoc($result);



?>

<section class="container py">


<article class="single-post card">


<?php

if(!empty($post['featured_image']))
{

?>

<img 
src="uploads/<?php echo clean($post['featured_image']); ?>"
alt="<?php echo clean($post['title']); ?>">

<?php

}

?>


<div class="post-content">


<h1>

<?php echo clean($post['title']); ?>

</h1>


<div class="post-meta">


<p>

Category:
<?php echo clean($post['category_name']); ?>

</p>


<p>

Author:
<?php echo clean($post['author_name']); ?>

</p>


<p>

Published:
<?php echo formatDate($post['created_at']); ?>

</p>


</div>



<div class="article-body">

<?php

echo nl2br($post['content']);

?>

</div>



</div>


</article>



</section>


<?php

include "includes/footer.php";

?>
