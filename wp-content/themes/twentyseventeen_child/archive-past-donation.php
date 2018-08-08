<?php
get_header();
?>

    <div class="content-area" id="primary">
        <main class="site-main archive-project">
            <h1 class="main-visual">過去のプロジェクト</h1>
            <div class="project__article-container">
                <div id="donation-buttom-container">
                    <div id="donation-buttom" data-src="http://localhost:8888/sophia-hackathon-2018/wp-content/uploads/2018/08/image.png"
                         style="background-image: url(http://localhost:8888/sophia-hackathon-2018/wp-content/uploads/2018/08/image.png);">
                    </div>
                </div>
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0];
                        $title = get_the_title();
                        $donated_amount = get_field('past-donation__donated-amount');
                        $singleLink = get_the_permalink();

                        ?>
                        <a href="<?php echo $singleLink; ?>">
                            <div class="project__article-container__article">
                                <div class="project__article-container__article__image-container">
                                    <div class="project__article-container__article__image-container__content"
                                         data-src="<?php echo $imageUrl; ?>"
                                         style="background-image: url(<?php echo $imageUrl; ?>);"></div>
                                </div>
                                <div class="project__article-container__article__title-amount">
                                    <p class="project__article-container__article__title-amount__title"><?php echo $title ?></p>
                                    <p class="project__article-container__article__title-amount__donated-amount">¥<?php echo $donated_amount ?></p>
                                </div>
                            </div>
                        </a>
                        <?php
                    } // end while
                } // end if
                ?>
            </div>
        </main>
    </div>

<?php get_footer();