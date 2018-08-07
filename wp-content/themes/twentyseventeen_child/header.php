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
?>

<body>
<div class="headtab">
    <div class="menu">
        <ul class="menu-list">
            <li class="menu-list__item">
                <a href="<?php echo get_post_type_archive_link('past-donation'); ?>">過去の募金活動</a>
            </li>
            <li class="menu-list__item">
                <a href="<?php echo home_url(); ?>">現在の募金活動</a>
            </li>
            <li class="menu-list__item">

                <a href="<?php echo $singleMyPageID; ?>">マイページ</a>
            </li>
        </ul>
    </div>
</div>
