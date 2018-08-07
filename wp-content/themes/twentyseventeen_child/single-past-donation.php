<?php
get_header();

$imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
$title = get_the_title();
$donated_amount = get_field('past-donation__donated-amount');
$donated_people = get_field('past-donation__donated-people');
$term = get_field('past-donation__term');
$achievement = get_field('past-donation__achievement');

?>

    <div class="content-area">
        <main class="site-main single-project">
            <h1 class="main-visual"><?php echo $title ?></h1>
            <ul class="project__article-container">

                <li class="project__article-container__article">
                    <p class="project__article-container__article__donated-amount">
                        合計金額: <?php echo $donated_amount ?>円</p>
                    <p class="project__article-container__article__donated-people">
                        参加人数: <?php echo $donated_people ?>人</p>
                    <p class="project__article-container__article__term">募集期間: <?php echo $term ?> </p>
                    <div class="project__article-container__article__achievement">
                        <p class="project__article-container__article__achievement__title">実績</p>
                        <div class="project__article-container__article__achievement__content">
                            <?php echo $achievement ?>
                        </div>
                    </div>
                </li>

            </ul>
        </main>
    </div>

<?php get_footer();