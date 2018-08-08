<?php
get_header();

$imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0];
$userName = get_the_title();
$donatedAmount = get_field('myPage__donation-amount');
$amount = -500;
?>


    <div class="content-area">
        <main class="site-main my-page">
            <h1 class="main-visual">My Page</h1>

            <div class="my-page__main">
                <div class="my-page__user">
                    <div class="my-page__user__info">
                        <div class="my-page__user__info__image-container">
                            <div class="my-page__user__info__image-container__image"
                                 data-src="<?php echo $imageUrl; ?>"
                                 style="background-image: url(<?php echo $imageUrl; ?>);">
                            </div>
                        </div>
                        <p class="my-page__user__info__name">
                            <?php echo $userName; ?>
                        </p>
                    </div>
                    <div class="my-page__user__amount">
                        <p class="my-page__user__amount__title">総募金額：</p>
                        <p class="my-page__user__amount__amount"><?php echo $donatedAmount; ?> 円</p>
                    </div>
                </div>
            </div>

            <ul class="my-page__project">
                <h2 class="my-page__project_title">参加プロジェクト</h2>
                <?php
                $args = array(
                    'post_type' => 'past-donation',
                    'posts_per_page' => 2
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();

                        $projectLink = get_the_permalink();
                        $projectImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0];
                        $projectTitle = get_the_title();
                        $amount += 900;
                        ?>

                        <li class="my-page__project__item">
                            <a href="<?php echo $projectLink ?>">
                                <div class="my-page__project__item__image-container">
                                    <div class="my-page__project__item__image-container__image"
                                         data-src="<?php echo $projectImageUrl; ?>"
                                         style="background-image: url(<?php echo $projectImageUrl; ?>);">
                                    </div>
                                </div>
                                <div class="my-page__project__item__title-amount">
                                    <div class="my-page__project__item__title-amount__title-container">
                                        <p class="my-page__project__item__title-amount__title-container__title">
                                            <?php echo $projectTitle ?>
                                        </p>
                                    </div>
                                    <div class="my-page__project__item__title-amount__amount-container">
                                        <p class="my-page__project__item__title-amount__amount-container__amount">
                                            <?php echo $amount ?> 円
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <?php
                    }
                }
                ?>
            </ul>

        </main>
    </div>


<?php get_footer();