<?php

$pageTitle = "Article";

include 'includes/header.php';

?>

<section class="container py">

    <article class="single-post card">

        <div class="post-content">

            <h1>
                Article Title Will Appear Here
            </h1>

            <div class="post-meta">

                <span>
                    Category: Technology
                </span>

                <span>
                    Author: Hatim
                </span>

                <span>
                    Date: <?php echo date("F d, Y"); ?>
                </span>

            </div>


            <img 
            src="images/default-blog.jpg" 
            alt="Article Image">


            <p>
                This is where your complete article content
                will appear from the database.
            </p>


            <p>
                Later this page will automatically load:
            </p>

            <ul>

                <li>Article title</li>
                <li>Featured image</li>
                <li>Author name</li>
                <li>Category</li>
                <li>Publication date</li>
                <li>Full content</li>

            </ul>


        </div>

    </article>


    <section class="comments">

        <h2>
            Comments
        </h2>


        <p>
            Comments system will be connected with the database.
        </p>


    </section>


</section>


<?php

include 'includes/footer.php';

?>
