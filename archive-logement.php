<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$iframe_url = asteria_superhote_rentals_iframe_url();
?>

<section class="page-hero">
	<div class="container">
		<h1><?php esc_html_e( 'Nos logements', 'asteria-pulsar' ); ?></h1>
	</div>
</section>

<section class="logements-list container">
	<?php if ( $iframe_url ) : ?>
		<iframe
			src="<?php echo esc_url( $iframe_url ); ?>"
			class="superhote-rentals-iframe"
			id="booking-engine-rentals"
			width="100%"
			height="1500"
			loading="lazy"
			title="<?php esc_attr_e( 'Nos logements disponibles', 'asteria-pulsar' ); ?>"
		></iframe>
	<?php else : ?>
		<?php get_template_part( 'template-parts/logements-grid' ); ?>
	<?php endif; ?>
</section>

<?php get_footer(); ?>
