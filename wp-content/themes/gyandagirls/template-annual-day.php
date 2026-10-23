<?php
// Template Name: Annual Day
get_header();
?>

<section class="inner-banner">
    <div class="container">
        <div class="text-center">
            <h1 class="section-title text-white"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<section class="bg-light">
    <div class="container">
        <nav class="inner-banner-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo site_url(); ?>">Home</a>
            <span class="sep"><i class="fa-solid fa-angle-right"></i></span>
            <span class="page-name"><?php the_title(); ?></span>
        </nav>
    </div>
</section>

<section class="cpy-80px">
    <div class="container text-18px">
        <div class="list-content-style">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>