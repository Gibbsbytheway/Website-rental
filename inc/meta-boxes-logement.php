<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_logement_meta_fields() {
	return array(
		'_logement_adresse'      => __( 'Adresse', 'asteria-pulsar' ),
		'_logement_ville'        => __( 'Ville', 'asteria-pulsar' ),
		'_logement_prix_nuit'    => __( 'Prix à partir de (€/nuit)', 'asteria-pulsar' ),
		'_logement_voyageurs'    => __( 'Nombre de voyageurs', 'asteria-pulsar' ),
		'_logement_chambres'     => __( 'Nombre de chambres', 'asteria-pulsar' ),
		'_logement_lits'         => __( 'Nombre de lits', 'asteria-pulsar' ),
		'_logement_checkin'      => __( 'Check-in (ex: 16h00)', 'asteria-pulsar' ),
		'_logement_checkout'     => __( 'Check-out (ex: 11h00)', 'asteria-pulsar' ),
		'_logement_superhote_id' => __( 'ID logement Superhôte (rentalId)', 'asteria-pulsar' ),
	);
}

function asteria_add_logement_meta_boxes() {
	add_meta_box( 'asteria_logement_details', __( 'Détails du logement', 'asteria-pulsar' ), 'asteria_render_logement_details_box', 'logement', 'normal', 'high' );
	add_meta_box( 'asteria_logement_equipements', __( 'Équipements (un par ligne)', 'asteria-pulsar' ), 'asteria_render_logement_equipements_box', 'logement', 'normal' );
	add_meta_box( 'asteria_logement_galerie', __( 'Galerie photos', 'asteria-pulsar' ), 'asteria_render_logement_galerie_box', 'logement', 'side' );
}
add_action( 'add_meta_boxes', 'asteria_add_logement_meta_boxes' );

function asteria_render_logement_details_box( $post ) {
	wp_nonce_field( 'asteria_save_logement', 'asteria_logement_nonce' );
	echo '<table class="form-table">';
	foreach ( asteria_logement_meta_fields() as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		printf(
			'<tr><th><label for="%1$s">%2$s</label></th><td><input type="text" id="%1$s" name="%1$s" value="%3$s" class="widefat" /></td></tr>',
			esc_attr( $key ),
			esc_html( $label ),
			esc_attr( $value )
		);
	}
	echo '</table>';
}

function asteria_render_logement_equipements_box( $post ) {
	$value = get_post_meta( $post->ID, '_logement_equipements', true );
	echo '<textarea name="_logement_equipements" rows="8" class="widefat">' . esc_textarea( $value ) . '</textarea>';
}

function asteria_render_logement_galerie_box( $post ) {
	$ids = get_post_meta( $post->ID, '_logement_galerie', true );
	?>
	<div id="asteria-galerie-wrapper" data-ids="<?php echo esc_attr( $ids ); ?>">
		<div id="asteria-galerie-preview"></div>
		<input type="hidden" name="_logement_galerie" id="asteria-galerie-ids" value="<?php echo esc_attr( $ids ); ?>" />
		<button type="button" class="button" id="asteria-galerie-select"><?php esc_html_e( 'Choisir des photos', 'asteria-pulsar' ); ?></button>
	</div>
	<?php
}

function asteria_save_logement_meta( $post_id ) {
	if ( ! isset( $_POST['asteria_logement_nonce'] ) || ! wp_verify_nonce( $_POST['asteria_logement_nonce'], 'asteria_save_logement' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( array_keys( asteria_logement_meta_fields() ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
		}
	}

	if ( isset( $_POST['_logement_equipements'] ) ) {
		update_post_meta( $post_id, '_logement_equipements', sanitize_textarea_field( wp_unslash( $_POST['_logement_equipements'] ) ) );
	}

	if ( isset( $_POST['_logement_galerie'] ) ) {
		$ids = implode( ',', array_filter( array_map( 'absint', explode( ',', wp_unslash( $_POST['_logement_galerie'] ) ) ) ) );
		update_post_meta( $post_id, '_logement_galerie', $ids );
	}
}
add_action( 'save_post_logement', 'asteria_save_logement_meta' );

function asteria_logement_admin_assets( $hook ) {
	global $post_type;
	if ( 'logement' !== $post_type || ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script( 'asteria-admin-galerie', get_template_directory_uri() . '/assets/js/admin-galerie.js', array( 'jquery' ), ASTERIA_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'asteria_logement_admin_assets' );
