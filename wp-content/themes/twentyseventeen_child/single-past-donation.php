<?php
get_header();

$imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0];
$title = get_the_title();
$donated_amount = get_field('past-donation__donated-amount');
$donated_people = get_field('past-donation__donated-people');
$term = get_field('past-donation__term');
$achievement = get_field('past-donation__achievement');

?>

    <div class="content-area">
        <main class="site-main single-project">
            <h1 class="main-visual">プロジェクト</h1>
            <ul class="single-project__article-container">

                <li class="single-project__article-container__article">
                    <div class="single-project__article-container__article__image-container">
                        <div class="single-project__article-container__article__image-container__content"
                             data-src="<?php echo $imageUrl; ?>"
                             style="background-image: url(<?php echo $imageUrl; ?>);"></div>
                    </div>
                    <p class="single-project__article-container__article__donated-amount"><?php echo $title ?></p>
                    <p class="single-project__article-container__article__donated-amount">
                        総募金額: <?php echo $donated_amount ?> 円</p>
                    <p class="single-project__article-container__article__donated-people">
                        募金人数: <?php echo $donated_people ?> 人</p>
                    <div class="single-project__article-container__article__achievement">
                        <p class="single-project__article-container__article__achievement__title">実績: </p>
                        <div class="single-project__article-container__article__achievement__content">
                            <?php echo $achievement ?>
                        </div>
                    </div>
                </li>

            </ul>
        </main>
    </div>

<?php get_footer();