<?php
// Template Name: Chairman Message
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

<?php get_footer(); ?>