<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container site-header__inner">
		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				bloginfo( 'name' );
			}
			?>
		</a>

		<button class="nav-toggle" id="nav-toggle" aria-label="<?php echo esc_attr( asteria_t( 'nav.ouvrir_menu' ) ); ?>" aria-expanded="false">
			<span></span><span></span><span></span>
		</button>

		<nav class="site-nav" id="site-nav">
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/logements/' ) ); ?>"><?php echo esc_html( asteria_t( 'nav.logements' ) ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>"><?php echo esc_html( asteria_t( 'nav.a_propos' ) ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo esc_html( asteria_t( 'nav.contact' ) ); ?></a></li>
			</ul>

		</nav>

		<?php
		$asteria_languages = asteria_supported_languages();
		$asteria_current   = asteria_current_lang();
		?>
		<div class="lang-switcher" id="lang-switcher">
			<button type="button" class="lang-switcher__toggle" id="lang-switcher-toggle" aria-expanded="false" aria-haspopup="true">
				<span class="lang-switcher__flag"><?php echo esc_html( $asteria_languages[ $asteria_current ]['flag'] ); ?></span>
				<span class="lang-switcher__caret" aria-hidden="true">▾</span>
			</button>
			<ul class="lang-switcher__menu" id="lang-switcher-menu">
				<?php foreach ( $asteria_languages as $code => $lang ) : ?>
					<li>
						<a
							href="<?php echo esc_url( asteria_lang_url( $code ) ); ?>"
							class="lang-switcher__item<?php echo $code === $asteria_current ? ' is-active' : ''; ?>"
							lang="<?php echo esc_attr( $code ); ?>"
						>
							<span class="lang-switcher__flag"><?php echo esc_html( $lang['flag'] ); ?></span>
							<?php echo esc_html( $lang['label'] ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<a class="btn btn--cta" href="<?php echo esc_url( home_url( '/#logements' ) ); ?>"><?php echo esc_html( asteria_t( 'nav.reserver' ) ); ?></a>
	</div>
</header>
