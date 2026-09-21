<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero">
	<div class="hero__overlay"></div>
	<div class="container hero__content">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<p><?php echo esc_html( asteria_t( 'hero.tagline' ) ); ?></p>
	</div>
</section>

<section class="logements-list container" id="logements">
	<h2><?php echo esc_html( asteria_t( 'logements.titre' ) ); ?></h2>

	<?php get_template_part( 'template-parts/logements-grid' ); ?>
</section>

<?php get_footer(); ?>
