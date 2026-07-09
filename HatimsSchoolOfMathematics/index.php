<?php
$pageTitle = "Home";
include 'includes/header.php';
?>

<section class="hero">
    <div class="container hero-content">

        <div class="hero-text">
            <h1>Welcome to Hatim Education Site</h1>

            <p>
                Learn Mathematics, Programming, Artificial Intelligence,
                Web Development, Computer Science, Technology, and Exam Preparation
                from one modern educational platform.
            </p>

            <a href="blog.php" class="btn">Explore Articles</a>
        </div>

        <div class="hero-image">
            <img src="images/hero.png" alt="Hatim Education Site">
        </div>

    </div>
</section>

<section class="container">

    <h2 class="text-center">Featured Categories</h2>

    <div class="card">

        <p>📘 Mathematics</p>
        <p>💻 Programming</p>
        <p>🌐 Web Development</p>
        <p>🤖 Artificial Intelligence</p>
        <p>🗄️ MySQL Database</p>
        <p>📝 Exam Preparation</p>

    </div>

</section>

<section class="container">

    <h2 class="text-center">Latest Articles</h2>

    <div class="card">

        <h3>Coming Soon...</h3>

        <p>
            Articles from your database will automatically appear here.
        </p>

    </div>

</section>

<section class="container">

    <h2 class="text-center">Newsletter</h2>

    <div class="card">

        <form action="#" method="post">

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required>

            <br><br>

            <button class="btn" type="submit">
                Subscribe
            </button>

        </form>

    </div>

</section>

<?php
include 'includes/footer.php';
?>
