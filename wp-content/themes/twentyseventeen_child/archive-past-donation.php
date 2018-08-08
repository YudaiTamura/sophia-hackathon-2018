<?php
get_header();
?>

    <div class="content-area">
        <main class="site-main archive-project">
            <h1 class="main-visual">過去の募金一覧</h1>
            <ul class="project__article-container">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                        $title = get_the_title();
                        $donated_amount = get_field('past-donation__donated-amount');
                        $donated_people = get_field('past-donation__donated-people');
                        $term = get_field('past-donation__term');
                        $achievement = get_field('past-donation__achievement');

                        ?>
                        <li class="project__article-container__article">
                            <p class="project__article-container__article__title"><?php echo $title ?></p>
                            <p class="project__article-container__article__donated-amount">合計金額: <?php echo $donated_amount ?>円</p>
                            <p class="project__article-container__article__donated-people">参加人数: <?php echo $donated_people ?>人</p>
                            <p class="project__article-container__article__term">募集期間: <?php echo $term ?></p>
                            <div class="project__article-container__article__achievement">
                                <p class="project__article-container__article__achievement__title">実績</p>
                                <div class="project__article-container__article__achievement__content">
                                    <?php echo $achievement ?>
                                </div>
                            </div>
                        </li>
                        <?php
                    } // end while
                } // end if
                ?>
            </ul>
        </main>
    </div>

<?php get_footer();