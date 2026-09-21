<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="page-content container">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</section>
	<?php
endwhile;

get_footer();
