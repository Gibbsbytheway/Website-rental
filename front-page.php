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

<section class="testimonials">
	<div class="container">
		<p class="section-eyebrow"><?php echo esc_html( asteria_t( 'testimonials.eyebrow' ) ); ?></p>
		<h2 class="section-title"><?php echo esc_html( asteria_t( 'testimonials.titre' ) ); ?></h2>

		<div class="testimonials-grid">
			<?php foreach ( asteria_testimonials() as $testimonial ) : ?>
				<div class="testimonial-card">
					<div class="testimonial-card__stars" aria-hidden="true">★★★★★</div>
					<p class="testimonial-card__text"><?php echo esc_html( $testimonial['text'] ); ?></p>
					<div class="testimonial-card__author">
						<span class="testimonial-card__avatar"><?php echo esc_html( mb_substr( $testimonial['name'], 0, 1 ) ); ?></span>
						<?php echo esc_html( $testimonial['name'] ); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="why-us">
	<div class="container">
		<p class="section-eyebrow"><?php echo esc_html( asteria_t( 'why.eyebrow' ) ); ?></p>
		<h2 class="section-title"><?php echo esc_html( asteria_t( 'why.titre' ) ); ?></h2>

		<div class="why-us-grid">
			<?php foreach ( asteria_why_us() as $item ) : ?>
				<div class="why-us-card">
					<h3><?php echo esc_html( $item['titre'] ); ?></h3>
					<p><?php echo esc_html( $item['texte'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="faq">
	<div class="container">
		<p class="section-eyebrow"><?php echo esc_html( asteria_t( 'faq.eyebrow' ) ); ?></p>
		<h2 class="section-title"><?php echo esc_html( asteria_t( 'faq.titre' ) ); ?></h2>

		<div class="faq-list">
			<?php foreach ( asteria_faq() as $item ) : ?>
				<details class="faq-item">
					<summary><?php echo esc_html( $item['q'] ); ?></summary>
					<p><?php echo esc_html( $item['a'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
