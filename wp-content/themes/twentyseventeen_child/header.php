<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>電子マネー時代における募金</title>
    <?php wp_head(); ?>
</head>

<?php
$the_query = new WP_Query(array(
    'post_type' => 'mypage',
    'posts_per_page' => 1
));
$singleMyPageID = "";
if ($the_query->have_posts()) {
    $the_query->the_post();
    $singleMyPageID = get_the_permalink();
}

wp_reset_postdata();
?>

<body>
<div class="headtab">
    <div class="menu">
        <div class="menu-list">
            <div class="menu-list__item">
                <a href="<?php echo get_post_type_archive_link('past-donation'); ?>">過去のプロジェクト</a>
            </div>
            <div class="menu-list__item">
                <a href="<?php echo home_url(); ?>">現在のプロジェクト</a>
            </div>
            <div class="menu-list__item">
                <a href="<?php echo $singleMyPageID; ?>">MY PAGE</a>
            </div>
        </div>
    </div>
</div>
