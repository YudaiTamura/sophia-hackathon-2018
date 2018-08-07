
<h1>過去の募金一覧</h1>
<form method="post" action="">
	<div class="element_wrap">
    <?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
			the_post(); 
			echo get_the_title();
			echo "<br />";

			echo "合計金額:";
			echo get_field('past-donation__donated-amount');
			echo "円<br />";

			echo "参加人数:";
			echo get_field('past-donation__donated-people');
			echo "人<br />";

			echo "募集期間:";
			echo get_field('past-donation__term');
			echo "<br /><br />";

			echo "実績<br />";
			echo get_field('past-donation__achievement');
			echo "<br />";

		//
		// 投稿がここに表示される
		//
	} // end while
} // end if
?>
</form>

