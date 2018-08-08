<?php
get_header();


$the_query = new WP_Query(array(
    'post_type' => 'project',
    'posts_per_page' => 1
));
if ($the_query->have_posts()) {
    $the_query->the_post();

    $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0];
    $title = get_the_title();
    $donated_amount = get_field('donated-amount');
    $donated_people = get_field('numberOfPeople');
    $link = get_the_permalink();
}
wp_reset_postdata();

$donationButtonImageURL = home_url() . '/wp-content/uploads/2018/08/image.png';
$processImageURL = home_url() . '/wp-content/uploads/2018/08/image-1.png';
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div id="donation-buttom-container">
            <div id="donation-buttom" data-src="<?php echo $donationButtonImageURL; ?>"
                 style="background-image: url(<?php echo $donationButtonImageURL; ?>);">
            </div>
        </div>

        <div class="top-main">
            <a href="<?php echo $link ?>">
                <div class="top-main__image-container">
                    <div class="top-main__image-container__content"
                         data-src="<?php echo $imageUrl; ?>"
                         style="background-image: url(<?php echo $imageUrl; ?>);"></div>
                </div>
                <p class="top-main__title"><?php echo $title; ?></p>
                <div class="top-main__container">
                    <div class="top-main__process-image-container">
                        <div class="top-main__process-image-container__content"
                             data-src="<?php echo $processImageURL; ?>"
                             style="background-image: url(<?php echo $processImageURL; ?>);"></div>
                    </div>
                    <div class="top-main__people">
                        <div class="top-main__people__amount-container">
                            <p class="top-main__people__amount">¥<?php echo $donated_amount; ?></p>
                        </div>
                        <div class="top-main__people__people-container">
                            <p class="top-main__people__people"><?php echo $donated_people; ?>人が参加中</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </main>
</div>


<?php get_footer(); ?>
