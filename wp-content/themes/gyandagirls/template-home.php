<?php
// Template Name: Home
get_header();
?>

<!-- Home Banner -->
<section class="home-banner">
    <div class="container">
        <?php
        $home_banner = get_field('home_banner');

        $banner_tag = $home_banner['banner_tag'] ?? '';
        $banner_title = $home_banner['banner_title'] ?? '';
        $banner_description = $home_banner['banner_description'] ?? '';
        $contact_us_button = $home_banner['contact_us_button'] ?? '';
        ?>
        <div class="home-banner-info">
            <?php if ($banner_tag): ?>
                <label>
                    <?php echo esc_html($banner_tag); ?>
                </label>
            <?php endif; ?>
            <?php if ($banner_title): ?>
                <h1>
                    <?php echo wp_kses_post($banner_title); ?>
                </h1>
            <?php endif; ?>
            <?php if ($banner_description): ?>
                <p class="text-18px mb-40px">
                    <?php echo esc_html($banner_description); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($contact_us_button)): ?>
                <?php
                $button_url = $contact_us_button['url'] ?? '';
                $button_title = $contact_us_button['title'] ?? '';
                if ($button_url && strpos($button_url, '/') === 0) {
                    $button_url = home_url($button_url);
                }
                ?>
                <a href="<?php echo esc_url($button_url); ?>" class="default-btn-theme">
                    <?php echo esc_html($button_title); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- About Section -->
<?php
$about_section = get_field('about_section');

if ($about_section):

    $about_image = $about_section['about_image'] ?? '';
    $about_title = $about_section['about_title'] ?? '';
    $about_description = $about_section['about_description'] ?? '';
    $know_more_button = $about_section['know_more_button'] ?? '';
?>

    <section class="about-section cpy-80px">
        <div class="container">
            <div class="flex-center-gap80">
                <div class="flex-1">
                    <?php if ($about_image): ?>
                        <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_title); ?>"
                            class="img-fluid img-radius-42px">
                    <?php endif; ?>
                </div>

                <div class="flex-1">
                    <?php if ($about_title): ?>
                        <h2 class="section-title">
                            <?php echo wp_kses_post($about_title); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ($about_description): ?>
                        <div class="mb-40px">
                            <?php echo wp_kses_post($about_description); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($know_more_button)): ?>
                        <?php
                        $button_url = $know_more_button['url'] ?? '';
                        $button_title = $know_more_button['title'] ?? '';
                        $button_target = $know_more_button['target'] ?? '_self';

                        // Convert relative URL to full WordPress URL
                        if ($button_url && strpos($button_url, '/') === 0) {
                            $button_url = home_url($button_url);
                        }
                        ?>
                        <a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"
                            class="default-btn-theme">
                            <?php echo esc_html($button_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<!-- School Statistics -->
<?php
$school_statistics = get_field('school_statistics');

if ($school_statistics):

    $background_image = $school_statistics['background_image'] ?? '';
    $section_title = $school_statistics['section_title'] ?? '';
    $description = $school_statistics['description'] ?? '';

    $stats = [
        $school_statistics['statistics1'] ?? [],
        $school_statistics['statistics2'] ?? [],
        $school_statistics['statistics3'] ?? [],
        $school_statistics['statistics4'] ?? [],
    ];
?>

    <section class="cpy-80px school-statistics" <?php if ($background_image): ?> style="background-image: url('<?php
                                                                                                                echo esc_url(
                                                                                                                    is_array($background_image)
                                                                                                                        ? $background_image['url']
                                                                                                                        : $background_image
                                                                                                                );
                                                                                                                ?>');"
        <?php endif; ?>>

        <div class="container">
            <div class="text-center">
                <?php if ($section_title): ?>
                    <h2 class="section-title text-white">
                        <?php echo wp_kses_post($section_title); ?>
                    </h2>
                <?php endif; ?>
                <?php if ($description): ?>
                    <div class="mb-40px text-white">
                        <?php echo esc_html($description); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="statistics-grid">
                <?php foreach ($stats as $stat): ?>
                    <?php if (!empty($stat)): ?>
                        <?php
                        $icon = $stat['icon'] ?? '';
                        $number = $stat['number'] ?? '';
                        $label = $stat['label'] ?? '';

                        $icon_url = '';
                        $icon_alt = $label;

                        if (!empty($icon)) {

                            if (is_array($icon)) {
                                $icon_url = $icon['url'] ?? '';
                                $icon_alt = !empty($icon['alt']) ? $icon['alt'] : $label;
                            } elseif (is_numeric($icon)) {
                                $icon_url = wp_get_attachment_image_url(
                                    (int) $icon,
                                    'full'
                                );
                                $attachment_alt = get_post_meta(
                                    (int) $icon,
                                    '_wp_attachment_image_alt',
                                    true
                                );
                                if ($attachment_alt) {
                                    $icon_alt = $attachment_alt;
                                }
                            } elseif (is_string($icon)) {
                                $icon_url = $icon;
                            }
                        }
                        ?>

                        <div class="statistics-card">
                            <?php if ($icon_url): ?>
                                <div class="statistics-icon">
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if ($number): ?>
                                <div class="statistics-number">
                                    <?php echo esc_html($number); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($label): ?>
                                <div class="statistics-label">
                                    <?php echo esc_html($label); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Education Section -->
<?php
$education_section = get_field('education_section');

if ($education_section):
    $section_title = $education_section['section_title'] ?? '';
    $section_description = $education_section['section_description'] ?? '';
    $cards = [
        $education_section['education_card_1'] ?? [],
        $education_section['education_card_2'] ?? [],
        $education_section['education_card_3'] ?? [],
        $education_section['education_card_4'] ?? []
    ];
?>
    <section class="cpy-80px">
        <div class="container">
            <?php if ($section_title): ?>
                <div class="text-center">
                    <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
                    <?php if ($section_description): ?>
                        <p class="mb-40px"><?php echo wp_kses_post($section_description); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="education-grid">
                <?php foreach ($cards as $card): ?>
                    <?php if (!empty($card)):
                        $image = $card['image'] ?? '';
                        $title = $card['title'] ?? '';
                        $sub_title = $card['sub_title'] ?? '';
                        $description = $card['description'] ?? '';
                        $image_url = '';
                        $image_alt = $title;
                        if (is_array($image)) {
                            $image_url = $image['url'] ?? '';
                            $image_alt = $image['alt'] ?? $title;
                        } elseif (is_numeric($image)) {
                            $image_url = wp_get_attachment_image_url((int) $image, 'full');
                            $image_alt = get_post_meta((int) $image, '_wp_attachment_image_alt', true) ?: $title;
                        } elseif (is_string($image)) {
                            $image_url = $image;
                        }
                    ?>
                        <div class="education-card">
                            <?php if ($image_url): ?>
                                <div class="education-card-image">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                                        class="img-fluid">
                                </div>
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($sub_title): ?>
                                <span class="education-sub-title"><?php echo esc_html($sub_title); ?></span>
                            <?php endif; ?>
                            <?php if ($description): ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Why Choose Us Section -->
<?php
$why_choose_section = get_field('why_choose_section');
if ($why_choose_section):
    $section_title = $why_choose_section['section_title'] ?? '';
    $description = $why_choose_section['description'] ?? '';
    $cards = [
        $why_choose_section['feature_card_1'] ?? [],
        $why_choose_section['feature_card_2'] ?? [],
        $why_choose_section['feature_card_3'] ?? [],
        $why_choose_section['feature_card_4'] ?? [],
        $why_choose_section['feature_card_5'] ?? [],
        $why_choose_section['feature_card_6'] ?? []
    ];
?>
    <section class="bg-light cpy-80px">
        <div class="container">
            <?php if ($section_title || $description): ?>
                <div class="text-center">
                    <?php if ($section_title): ?>
                        <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($description): ?>
                        <p class="mb-40px"><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="why-choose-grid">
                <?php foreach ($cards as $card): ?>
                    <?php if (!empty($card)):
                        $icon = $card['icon'] ?? '';
                        $title = $card['title'] ?? '';
                        $card_description = $card['description'] ?? '';
                        $icon_color = $card['icon_color'] ?? '#FFF7E1';
                        $icon_url = '';

                        if (is_array($icon)) {
                            $icon_url = $icon['url'] ?? '';
                        } elseif (is_numeric($icon)) {
                            $icon_url = wp_get_attachment_image_url((int) $icon, 'full');
                        } elseif (is_string($icon)) {
                            $icon_url = $icon;
                        }
                    ?>
                        <div class="why-choose-card">
                            <?php if ($icon_url): ?>
                                <span class="feature-bg-icon"
                                    style="--icon:url('<?php echo esc_url($icon_url); ?>');--icon-color:<?php echo esc_attr($icon_color); ?>;"></span>
                                <div class="why-choose-card-icons">
                                    <img src="<?php echo esc_url($icon_url); ?>" class="feature-icon"
                                        alt="<?php echo esc_attr($title); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($card_description): ?>
                                <p><?php echo esc_html($card_description); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Our Facilities -->
<?php
$our_facilities = get_field('our_facilities_section');
if ($our_facilities):
    $slider_group = $our_facilities['our_facilities_slider'] ?? [];
    $experience_badge = $our_facilities['experience_badge'] ?? '';
    $section_title = $our_facilities['section_title'] ?? '';
    $section_description = $our_facilities['section_description'] ?? '';
    $sliders = [
        $slider_group['slider_1'] ?? '',
        $slider_group['slider_2'] ?? '',
        $slider_group['slider_3'] ?? '',
        $slider_group['slider_4'] ?? '',
        $slider_group['slider_5'] ?? ''
    ];
    $facilities = [
        $our_facilities['facility_1'] ?? [],
        $our_facilities['facility_2'] ?? [],
        $our_facilities['facility_3'] ?? [],
        $our_facilities['facility_4'] ?? [],
        $our_facilities['facility_5'] ?? [],
        $our_facilities['facility_6'] ?? []
    ];
    $badge_url = '';
    if (is_array($experience_badge)) {
        $badge_url = $experience_badge['url'] ?? '';
    } elseif (is_numeric($experience_badge)) {
        $badge_url = wp_get_attachment_image_url((int) $experience_badge, 'full');
    } elseif (is_string($experience_badge)) {
        $badge_url = $experience_badge;
    }
?>
    <section class="cpy-80px">
        <div class="container">
            <div class="our-facilities-wrapper">
                <div class="our-facilities-slider">
                    <div class="swiper ourFacilitiesSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($sliders as $slider):
                                if (empty($slider))
                                    continue;
                                $slider_url = '';
                                if (is_array($slider)) {
                                    $slider_url = $slider['url'] ?? '';
                                } elseif (is_numeric($slider)) {
                                    $slider_url = wp_get_attachment_image_url((int) $slider, 'full');
                                } elseif (is_string($slider)) {
                                    $slider_url = $slider;
                                }
                                if ($slider_url):
                            ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($slider_url); ?>"
                                            alt="<?php echo esc_attr($section_title); ?>">
                                    </div>
                            <?php endif;
                            endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <?php if ($badge_url): ?>
                        <div class="experience-badge">
                            <img src="<?php echo esc_url($badge_url); ?>" alt="Years of Experience">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="our-facilities-content">
                    <?php if ($section_title): ?>
                        <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($section_description): ?>
                        <p class="m-0"><?php echo wp_kses_post($section_description); ?></p>
                    <?php endif; ?>
                    <div class="facilities-list">
                        <?php foreach ($facilities as $facility):
                            if (empty($facility))
                                continue;
                            $icon = $facility['icon'] ?? '';
                            $title = $facility['title'] ?? '';
                            $icon_url = '';
                            if (is_array($icon)) {
                                $icon_url = $icon['url'] ?? '';
                            } elseif (is_numeric($icon)) {
                                $icon_url = wp_get_attachment_image_url((int) $icon, 'full');
                            } elseif (is_string($icon)) {
                                $icon_url = $icon;
                            }
                            if (!$title)
                                continue;
                        ?>
                            <div class="facility-item">
                                <?php if ($icon_url): ?>
                                    <span class="facility-icon">
                                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($title); ?>">
                                    </span>
                                <?php endif; ?>
                                <span><?php echo esc_html($title); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- What Students Say Section -->
<?php
$what_students_say = get_field('what_students_say_section');
if ($what_students_say):
    $section_image = $what_students_say['section_image'] ?? '';
    $video_url = $what_students_say['video_url'] ?? '';
    $section_title = $what_students_say['section_title'] ?? '';
    $section_description = $what_students_say['section_description'] ?? '';
    $testimonials = [
        $what_students_say['testimonial_1'] ?? [],
        $what_students_say['testimonial_2'] ?? [],
        $what_students_say['testimonial_3'] ?? [],
        $what_students_say['testimonial_4'] ?? [],
        $what_students_say['testimonial_5'] ?? [],
        // $what_students_say['testimonial_6'] ?? [],
        // $what_students_say['testimonial_7'] ?? [],
        // $what_students_say['testimonial_8'] ?? [],
        // $what_students_say['testimonial_9'] ?? [],
        // $what_students_say['testimonial_10'] ?? [],
        // $what_students_say['testimonial_11'] ?? [],
        // $what_students_say['testimonial_12'] ?? [],
        // $what_students_say['testimonial_13'] ?? []
    ];
    $section_image_url = '';
    if (is_array($section_image)) {
        $section_image_url = $section_image['url'] ?? '';
    } elseif (is_numeric($section_image)) {
        $section_image_url = wp_get_attachment_image_url((int) $section_image, 'full');
    } elseif (is_string($section_image)) {
        $section_image_url = $section_image;
    }
?>
    <section class="what-students-say-section">
        <div class="what-students-say-wrapper">
            <div class="students-say-image">
                <?php if ($section_image_url): ?>
                    <img src="<?php echo esc_url($section_image_url); ?>" alt="<?php echo esc_attr($section_title); ?>"
                        class="students-say-video-thumbnail">
                <?php endif; ?>
                <a href="<?php echo esc_url($video_url); ?>" class="students-video-btn" target="_blank" rel="noopener"
                    aria-label="Watch video">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/play-icon.svg" class="w-100" />
                </a>
            </div>
            <div class="students-say-content">
                <div class="students-say-card">
                    <?php if ($section_title): ?>
                        <h2 class="section-title mb-2"><?php echo esc_html($section_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($section_description): ?>
                        <p class="students-say-intro"><?php echo esc_html($section_description); ?></p>
                    <?php endif; ?>
                    <div class="swiper studentsSaySwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($testimonials as $testimonial):
                                if (empty($testimonial))
                                    continue;
                                $student_image = $testimonial['student_image'] ?? '';
                                $student_name = $testimonial['student_name'] ?? '';
                                $company_name = $testimonial['company_name'] ?? '';
                                $designation = $testimonial['designation'] ?? '';
                                $rating = $testimonial['rating'] ?? 0;
                                $testimonial_description = $testimonial['testimonial_description'] ?? '';
                                $student_image_url = '';
                                if (is_array($student_image)) {
                                    $student_image_url = $student_image['url'] ?? '';
                                } elseif (is_numeric($student_image)) {
                                    $student_image_url = wp_get_attachment_image_url((int) $student_image, 'full');
                                } elseif (is_string($student_image)) {
                                    $student_image_url = $student_image;
                                }
                                if (!$student_image_url) {
                                    $student_image_url = get_template_directory_uri() . '/assets/images/placeholder.webp';
                                }
                            ?>
                                <div class="swiper-slide">
                                    <div class="student-testimonial">
                                        <div class="student-info">
                                            <img src="<?php echo esc_url($student_image_url); ?>"
                                                alt="<?php echo esc_attr($student_name); ?>" class="student-image">
                                            <div class="student-details">
                                                <?php if ($student_name): ?>
                                                    <h3><?php echo esc_html($student_name); ?></h3>
                                                <?php endif; ?>
                                                <?php if ($company_name || $designation): ?>
                                                    <p>
                                                        <?php echo esc_html($company_name); ?>
                                                        <?php if ($company_name && $designation): ?> | <?php endif; ?>
                                                        <?php echo esc_html($designation); ?>
                                                    </p>
                                                <?php endif; ?>
                                                <?php if ($rating): ?>
                                                    <div class="student-rating">
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <?php if ($rating >= $i): ?>
                                                                <i class="fas fa-star"></i>
                                                            <?php elseif ($rating >= ($i - 0.5)): ?>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            <?php else: ?>
                                                                <i class="far fa-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if ($testimonial_description): ?>
                                            <p class="testimonial-description"><?php echo esc_html($testimonial_description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="students-say-arrows">
                            <button type="button" class="students-say-prev" aria-label="Previous testimonial"><i
                                    class="fa-solid fa-arrow-left-long"></i></button>
                            <button type="button" class="students-say-next" aria-label="Next testimonial"><i
                                    class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                    <span class="quote-mark"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/quote-mark.svg"
                            class="w-100" /></span>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Awards and Recognition Section -->
<?php
$awards = get_field('awards_and_recognition');

if ($awards):

    $section_title = $awards['section_title'] ?? '';
    $description = $awards['description'] ?? '';
    $images = $awards['awards_images'] ?? '';

    // Images group
    $award_images = [
        $images['image01'] ?? '',
        $images['image02'] ?? '',
        $images['image03'] ?? '',
        $images['image04'] ?? '',
        $images['image05'] ?? '',
        $images['image06'] ?? '',
    ];
?>

    <section class="cpy-80px">
        <div class="container">
            <?php if ($section_title || $description): ?>
                <div class="mb-40px text-center">
                    <?php if ($section_title): ?>
                        <h2 class="section-title">
                            <?php echo esc_html($section_title); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if ($description): ?>
                        <div class="section-description">
                            <?php echo wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php
            // Check if at least one image exists
            $has_images = false;
            foreach ($award_images as $image) {
                if (!empty($image)) {
                    $has_images = true;
                    break;
                }
            }
            if ($has_images):
            ?>
                <div class="awards-list">
                    <?php foreach ($award_images as $image):
                        if (empty($image)) {
                            continue;
                        }
                        // ACF Image field returning Image Array
                        if (is_array($image)) {
                            $image_url = $image['url'] ?? '';
                            $image_alt = $image['alt'] ?? '';
                            // ACF Image field returning Attachment ID
                        } elseif (is_numeric($image)) {
                            $image_url = wp_get_attachment_image_url($image, 'full');
                            $image_alt = get_post_meta(
                                $image,
                                '_wp_attachment_image_alt',
                                true
                            );
                            // ACF Image field returning URL
                        } else {
                            $image_url = $image;
                            $image_alt = '';
                        }
                        if (!$image_url) {
                            continue;
                        }
                    ?>
                        <div class="award-item">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                                class="img-fluid" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>