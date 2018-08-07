<?php
get_header();

$title = get_the_title();
$donated_amount = get_field('past-donation__donated-amount');
$donated_people=get_field('past-donation__donated-people');
$term=get_field('past-donation__term');
$achievement=get_field('past-donation__achievement');

?>

<h1>過去の募金一覧</h1>
<form method="post" action="">
	<div class="element_wrap">
    <?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
	?>

			<div class="title">
				<?php echo $title ?>
			</div>

			<div class="donated_amount">
				合計金額: <?php echo $donated_amount ?>円
			</div>

			<div class="donated_people">
				参加人数:<?php echo $donated_people?>人
			</div>

			<div class="term">
				募集期間<?php echo $term?>
			</div>
			
			<div class="achievement">
				実績<br><?php echo $achievement?>
			</div>
		<?php
		// 投稿がここに表示される
		//
	} // end while
} // end if
?>
</form>

<? get_footer();

