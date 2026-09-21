<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logements = new WP_Query( array(
	'post_type'      => 'logement',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
) );
?>

<div class="logements-grid">
	<?php while ( $logements->have_posts() ) : $logements->the_post(); ?>
		<?php
		$ville     = get_post_meta( get_the_ID(), '_logement_ville', true );
		$prix      = get_post_meta( get_the_ID(), '_logement_prix_nuit', true );
		$voyageurs = get_post_meta( get_the_ID(), '_logement_voyageurs', true );
		$chambres  = get_post_meta( get_the_ID(), '_logement_chambres', true );
		$lits      = get_post_meta( get_the_ID(), '_logement_lits', true );
		?>
		<a class="logement-card" href="<?php the_permalink(); ?>">
			<div class="logement-card__image">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php else : ?>
					<div class="logement-card__placeholder"></div>
				<?php endif; ?>
			</div>
			<div class="logement-card__body">
				<p class="logement-card__meta"><?php echo esc_html( $ville ); ?></p>
				<h3><?php the_title(); ?></h3>
				<?php if ( $chambres || $lits || $voyageurs ) : ?>
					<p class="logement-card__specs">
						<?php echo esc_html( trim( sprintf( '%s chambres · %s lits · %s voyageurs', $chambres, $lits, $voyageurs ) ) ); ?>
					</p>
				<?php endif; ?>
				<?php if ( $prix ) : ?>
					<p class="logement-card__price"><?php esc_html_e( 'À partir de', 'asteria-pulsar' ); ?> <strong><?php echo esc_html( $prix ); ?> €</strong></p>
				<?php endif; ?>
			</div>
		</a>
	<?php endwhile; wp_reset_postdata(); ?>
</div>
