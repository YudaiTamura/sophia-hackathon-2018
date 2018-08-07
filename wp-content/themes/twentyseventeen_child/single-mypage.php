<?php
get_header();

$imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
$userName = get_the_title();
$donatedAmount = get_field('myPage__donation-amount');

?>


    <div class="content-area">
        <main class="site-main my-page">
            <h1 class="main-visual">My Page</h1>

            <div class="my-page__main">
                <div class="my-page__user">
                    <div class="flex-left">
                        <div class="my-page__user__image-container">
                            <img src="<?php echo $imageUrl; ?>">
                        </div>
                        <p class="my-page__user__name">
                            <?php echo $userName; ?>
                        </p>
                    </div>
                </div>
                <div>
                    募金額： ¥ <?php echo $donatedAmount; ?>
                </div>
            </div>

            <ul class="my-page__project">
                <?php
                $args = array('post_type' => 'past-donation');
                $the_query = new WP_Query($args);
                if($the_query->have_posts()){
                    while($the_query->have_posts()){
                        $the_query->the_post();

                        $projectImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                        $projectTitle = get_the_title();
                        $projectDonatedAmount = get_field('past-donation__donated-amount');
                ?>

                <li class="my-page__project"></li>

                <?php
                    }
                }
                ?>
            </ul>

        </main>
    </div>


<?php get_footer();