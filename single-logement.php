<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();

	$ville        = get_post_meta( get_the_ID(), '_logement_ville', true );
	$prix         = get_post_meta( get_the_ID(), '_logement_prix_nuit', true );
	$voyageurs    = get_post_meta( get_the_ID(), '_logement_voyageurs', true );
	$chambres     = get_post_meta( get_the_ID(), '_logement_chambres', true );
	$lits         = get_post_meta( get_the_ID(), '_logement_lits', true );
	$checkin      = get_post_meta( get_the_ID(), '_logement_checkin', true );
	$checkout     = get_post_meta( get_the_ID(), '_logement_checkout', true );
	$property_key = get_post_meta( get_the_ID(), '_logement_property_key', true );
	$equipements  = get_post_meta( get_the_ID(), '_logement_equipements', true );
	$widget_url   = asteria_superhote_widget_url( $property_key );
	?>

	<section class="page-hero">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php // L'adresse précise reste privée (communiquée aux voyageurs après réservation) : seule la ville est affichée. ?>
			<?php if ( $ville ) : ?>
				<p><?php echo esc_html( $ville ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( $widget_url ) : ?>
		<?php // Texte lisible par Google (le contenu de l'iframe Superhôte ne compte pas pour le référencement de ce site). ?>
		<section class="logement-intro container">
			<?php if ( $voyageurs || $chambres || $lits ) : ?>
				<p class="logement-detail__specs">
					<?php echo esc_html( sprintf( asteria_t( 'card.specs' ), $chambres, $lits, $voyageurs ) ); ?>
				</p>
			<?php endif; ?>
			<div class="logement-detail__description"><?php the_content(); ?></div>
			<?php if ( $equipements ) : ?>
				<div class="logement-detail__amenities">
					<ul>
						<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $equipements ) ) ) as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</section>

		<section class="booking-widget container">
			<iframe
				src="<?php echo esc_url( $widget_url ); ?>"
				id="booking-rental"
				width="100%"
				height="1500"
				loading="lazy"
				title="<?php the_title_attribute(); ?>"
			></iframe>
		</section>
	<?php else : ?>
		<section class="logement-detail container">
			<div class="logement-detail__main">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="logement-detail__image"><?php the_post_thumbnail( 'large' ); ?></div>
				<?php endif; ?>

				<?php if ( $voyageurs || $chambres || $lits ) : ?>
					<p class="logement-detail__specs">
						<?php echo esc_html( sprintf( asteria_t( 'card.specs' ), $chambres, $lits, $voyageurs ) ); ?>
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
			</div>

			<aside class="logement-detail__sidebar">
				<div class="booking-card">
					<?php if ( $prix ) : ?>
						<p class="booking-card__price"><?php echo esc_html( asteria_t( 'card.a_partir_de' ) ); ?> <strong><?php echo esc_html( $prix ); ?> €</strong></p>
					<?php endif; ?>
				</div>
			</aside>
		</section>
	<?php endif; ?>

	<?php $platforms = asteria_logement_platform_urls( get_the_ID() ); ?>
	<?php if ( $platforms ) : ?>
		<section class="logement-platforms container">
			<p class="logement-platforms__note"><?php echo esc_html( asteria_t( 'platforms.note' ) ); ?></p>
			<p class="logement-platforms__title"><?php echo esc_html( asteria_t( 'platforms.titre' ) ); ?></p>
			<ul class="logement-platforms__list">
				<?php foreach ( $platforms as $name => $url ) : ?>
					<?php
					$logo_file = 'assets/img/platforms/' . sanitize_title( strtok( $name, '.' ) ) . '.png';
					$has_logo  = file_exists( get_template_directory() . '/' . $logo_file );
					?>
					<li>
						<a class="<?php echo $has_logo ? 'platform-logo' : 'btn btn--outline'; ?>" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
							<?php if ( $has_logo ) : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/' . $logo_file ); ?>" alt="<?php echo esc_attr( $name ); ?>" height="32" loading="lazy" />
							<?php else : ?>
								<?php echo esc_html( $name ); ?>
							<?php endif; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
