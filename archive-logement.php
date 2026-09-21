<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="page-hero">
	<div class="container">
		<h1><?php echo esc_html( asteria_t( 'logements.titre' ) ); ?></h1>
	</div>
</section>

<section class="logements-list container">
	<?php get_template_part( 'template-parts/logements-grid' ); ?>
</section>

<?php get_footer(); ?>
