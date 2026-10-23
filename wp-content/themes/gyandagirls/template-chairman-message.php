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

<section class="cpy-80px">
    <div class="container">
        <div class="flex-center-gap80">
            <div class="chairman-picture">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="img-fluid">
                <?php endif; ?>
            </div>
            <div class="text-18px flex-1">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>