<?php
// Template Name: Laboratory
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
        <div class="days-festivals-content">
            <?php the_content(); ?>
            <!-- Slider -->
            <?php
            $common_slider = get_field('common_slider');
            if ($common_slider) :
                $sliders = [
                    $common_slider['slider01'] ?? '',
                    $common_slider['slider02'] ?? '',
                    $common_slider['slider03'] ?? '',
                    $common_slider['slider04'] ?? '',
                    $common_slider['slider05'] ?? '',
                    $common_slider['slider06'] ?? ''
                ];
            ?>
                <div class="swiper commonSliderSwiper mt-4">
                    <div class="swiper-wrapper">
                        <?php foreach ($sliders as $slider) :
                            $image_url = '';
                            $image_alt = get_the_title();
                            if (is_array($slider)) {
                                $image_url = $slider['url'] ?? '';
                                $image_alt = $slider['alt'] ?? get_the_title();
                            } elseif (is_numeric($slider)) {
                                $image_url = wp_get_attachment_image_url((int) $slider, 'full');
                                $image_alt = get_post_meta((int) $slider, '_wp_attachment_image_alt', true) ?: get_the_title();
                            } elseif (is_string($slider)) {
                                $image_url = $slider;
                            }
                            if (!$image_url) continue;
                        ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-prev days-festivals-prev"></div>
                    <div class="swiper-button-next days-festivals-next"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>