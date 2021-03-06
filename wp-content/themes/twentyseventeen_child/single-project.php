<?php
get_header();

$imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0];
$title = get_the_title();
$goal = get_field('goal');
$donated_amount = get_field('donated-amount');
$donated_people = get_field('numberOfPeople');
$forWhat = get_field('forWhat');

?>

    <div class="content-area" id="primary">
        <main class="site-main single-project">
            <h1 class="main-visual">プロジェクト</h1>
            <div class="single-project__article-container">

                <div class="single-project__article-container__article">
                    <div class="single-project__article-container__article__image-container">
                        <div class="single-project__article-container__article__image-container__content"
                             data-src="<?php echo $imageUrl; ?>"
                             style="background-image: url(<?php echo $imageUrl; ?>);"></div>
                    </div>
                    <p class="single-project__article-container__article__title"><?php echo $title; ?></p>
                    <p class="single-project__article-container__article__goal">
                        目標金額: ¥<?php echo $goal; ?></p>
                    <p class="single-project__article-container__article__donated-amount">
                        総募金額: ¥<?php echo $donated_amount; ?></p>
                    <p class="single-project__article-container__article__donated-people">
                        募金人数: <?php echo $donated_people; ?>人</p>
                    <div class="single-project__article-container__article__achievement">
                        <p class="single-project__article-container__article__achievement__title">用途:</p>
                        <div class="single-project__article-container__article__achievement__content">
                            <?php echo $forWhat; ?>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

<?php get_footer();