<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="page-hero">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="page-content container">
		<?php the_content(); ?>
	</section>
	<?php
endwhile;

get_footer();
