<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$iframe_url = asteria_superhote_rentals_iframe_url();
?>

<section class="hero">
	<div class="hero__overlay"></div>
	<div class="container hero__content">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</div>
</section>

<section class="logements-list container">
	<h2><?php esc_html_e( 'Nos logements', 'asteria-pulsar' ); ?></h2>

	<?php if ( $iframe_url ) : ?>
		<iframe
			src="<?php echo esc_url( $iframe_url ); ?>"
			class="superhote-rentals-iframe"
			id="booking-engine-rentals"
			loading="lazy"
			title="<?php esc_attr_e( 'Nos logements disponibles', 'asteria-pulsar' ); ?>"
		></iframe>
	<?php else : ?>
		<?php get_template_part( 'template-parts/logements-grid' ); ?>
	<?php endif; ?>
</section>

<?php get_footer(); ?>
