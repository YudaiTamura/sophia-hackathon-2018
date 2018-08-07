<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>電子マネー時代における募金</title>
    <?php wp_head(); ?>
</head>

<?php
$args = array('post_type' => 'mypage');
$the_query = new WP_Query($args);
$singleMyPageID = "";
if($the_query->have_posts()){
    $singleMyPageID = get_the_ID();
}
?>

<body>
<div class="headtab">
    <div class="menu">
        <ul class="menu-list">
            <li class="menu-list__item">
                <a href="<?php get_post_type_archive_link('past-donation'); ?>">過去の募金活動</a>
            </li>
            <li class="menu-list__item">
                <a href="<?php echo home_url();?>">現在の募金活動</a>
            </li>
            <li class="menu-list__item">
                <a href="<?php get_post_permalink($singleMyPageID) ?>">マイページ</a>
            </li>
        </ul>
    </div>
</div>
