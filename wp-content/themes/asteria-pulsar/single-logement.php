<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();

	$adresse      = get_post_meta( get_the_ID(), '_logement_adresse', true );
	$ville        = get_post_meta( get_the_ID(), '_logement_ville', true );
	$prix         = get_post_meta( get_the_ID(), '_logement_prix_nuit', true );
	$voyageurs    = get_post_meta( get_the_ID(), '_logement_voyageurs', true );
	$chambres     = get_post_meta( get_the_ID(), '_logement_chambres', true );
	$lits         = get_post_meta( get_the_ID(), '_logement_lits', true );
	$checkin      = get_post_meta( get_the_ID(), '_logement_checkin', true );
	$checkout     = get_post_meta( get_the_ID(), '_logement_checkout', true );
	$superhote_id = get_post_meta( get_the_ID(), '_logement_superhote_id', true );
	$equipements  = get_post_meta( get_the_ID(), '_logement_equipements', true );
	$galerie_ids  = get_post_meta( get_the_ID(), '_logement_galerie', true );
	$galerie_ids  = $galerie_ids ? array_filter( array_map( 'absint', explode( ',', $galerie_ids ) ) ) : array();
	?>

	<section class="logement-gallery">
		<div class="container logement-gallery__grid">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="logement-gallery__main"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<?php foreach ( array_slice( $galerie_ids, 0, 4 ) as $attachment_id ) : ?>
				<div class="logement-gallery__thumb"><?php echo wp_get_attachment_image( $attachment_id, 'medium' ); ?></div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="logement-detail container">
		<div class="logement-detail__main">
			<h1><?php the_title(); ?></h1>
			<p class="logement-detail__address"><?php echo esc_html( trim( $adresse . ( $ville ? ', ' . $ville : '' ) ) ); ?></p>
			<?php if ( $voyageurs || $chambres || $lits ) : ?>
				<p class="logement-detail__specs">
					<?php echo esc_html( trim( sprintf( '%s voyageurs · %s chambres · %s lits', $voyageurs, $chambres, $lits ) ) ); ?>
				</p>
			<?php endif; ?>

			<div class="logement-detail__description">
				<?php the_content(); ?>
			</div>

			<?php if ( $equipements ) : ?>
				<div class="logement-detail__amenities">
					<h2><?php esc_html_e( 'Ce que propose ce logement', 'asteria-pulsar' ); ?></h2>
					<ul>
						<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $equipements ) ) ) as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( $checkin || $checkout ) : ?>
				<div class="logement-detail__horaires">
					<h2><?php esc_html_e( 'Horaires', 'asteria-pulsar' ); ?></h2>
					<p><?php esc_html_e( 'Check-in à partir de', 'asteria-pulsar' ); ?> <strong><?php echo esc_html( $checkin ); ?></strong></p>
					<p><?php esc_html_e( 'Check-out jusqu\'à', 'asteria-pulsar' ); ?> <strong><?php echo esc_html( $checkout ); ?></strong></p>
				</div>
			<?php endif; ?>

			<div class="logement-detail__booking-widget">
				<h2><?php esc_html_e( 'Réserver ce logement', 'asteria-pulsar' ); ?></h2>
				<iframe
					src="<?php echo esc_url( asteria_superhote_rental_url( $superhote_id ) ); ?>"
					class="superhote-widget"
					loading="lazy"
					title="<?php the_title_attribute(); ?>"
				></iframe>
			</div>
		</div>

		<aside class="logement-detail__sidebar">
			<div class="booking-card">
				<?php if ( $prix ) : ?>
					<p class="booking-card__price"><?php esc_html_e( 'À partir de', 'asteria-pulsar' ); ?> <strong><?php echo esc_html( $prix ); ?> €</strong> <?php esc_html_e( 'par nuit', 'asteria-pulsar' ); ?></p>
				<?php endif; ?>
				<a class="btn btn--cta btn--block" href="<?php echo esc_url( asteria_superhote_rental_url( $superhote_id ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Réserver', 'asteria-pulsar' ); ?></a>
			</div>
		</aside>
	</section>

<?php endwhile; ?>

<?php get_footer(); ?>
