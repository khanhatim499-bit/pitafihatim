<?php

$pageTitle = "Blog";

require_once "includes/db.php";
require_once "includes/functions.php";

include "includes/header.php";


// Fetch published posts

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

WHERE posts.status='published'

ORDER BY posts.created_at DESC
";


$result = mysqli_query($conn,$sql);


?>

<section class="container py">

<h1 class="text-center">
Latest Articles
</h1>


<div class="blog-grid">


<?php

if(mysqli_num_rows($result) > 0)
{

while($post = mysqli_fetch_assoc($result))
{

?>


<article class="card">


<?php if(!empty($post['featured_image'])) { ?>

<img 
src="uploads/<?php echo clean($post['featured_image']); ?>"
alt="<?php echo clean($post['title']); ?>">

<?php } ?>


<div class="card-content">


<h3>

<?php echo clean($post['title']); ?>

</h3>


<p>

<?php echo shortText($post['excerpt'],150); ?>

</p>


<p>

Category:
<?php echo clean($post['category_name']); ?>

</p>


<p>

By:
<?php echo clean($post['author_name']); ?>

</p>


<a 
class="btn"
href="post.php?slug=<?php echo clean($post['slug']); ?>">

Read More

</a>


</div>


</article>


<?php

}

}

else

{

?>


<div class="card">

<h3>
No Articles Found
</h3>

<p>
Articles will appear here after publishing from the admin panel.
</p>

</div>


<?php

}

?>


</div>

</section>


<?php

include "includes/footer.php";

?>
