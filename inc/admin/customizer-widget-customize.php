<?php 



/*
 * Load Widgets
 */
require_once get_template_directory() . '/inc/admin/core/widgets/init.php';

/*
 * Load Customizer Support
 */
require_once get_template_directory() . '/inc/admin/core/customizer/init.php';

/*
 * Load Front-end helpers
 */
require_once get_template_directory() . '/inc/admin/core/helpers/color.php';
require_once get_template_directory() . '/inc/admin/core/helpers/controls.php';
require_once get_template_directory() . '/inc/admin/core/helpers/custom-fonts.php';
require_once get_template_directory() . '/inc/admin/core/helpers/extensions.php';
require_once get_template_directory() . '/inc/admin/core/helpers/post.php';
require_once get_template_directory() . '/inc/admin/core/helpers/post-types.php';
require_once get_template_directory() . '/inc/admin/core/helpers/sanitization.php';
require_once get_template_directory() . '/inc/admin/core/helpers/template.php';
require_once get_template_directory() . '/inc/admin/core/helpers/woocommerce.php';
if( !defined( 'LAYERS_DISABLE_INTERCOM' ) ){
	require_once get_template_directory() . '/inc/admin/core/helpers/intercom.php';
}

/*
 * Load Admin-specific files
 */
if( is_admin() ){
	// Include form item class
	require_once get_template_directory() . '/inc/admin/core/helpers/forms.php';

	// Include design bar class
	require_once get_template_directory() . '/inc/admin/core/helpers/design-bar.php';

	// Include API class
	require_once get_template_directory() . '/inc/admin/core/helpers/api.php';

	// Include widget export/import class
	require_once get_template_directory() . '/inc/admin/core/helpers/migrator.php';

}



if( ! function_exists( 'layers_admin_scripts' ) ) {
	function layers_admin_scripts(){
		global $pagenow, $wp_customize;

		/**
		 * Tip-Tip (renamed to layerTip )
		 */
		wp_enqueue_style(
			NAME . '-tip-tip' ,
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/tip-tip/jquery.tipTip.css',
			array(),
			VERSION
		);
		wp_enqueue_script(
			NAME . '-tip-tip' ,
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/tip-tip/jquery.tipTip.js',
			array( 'jquery' ),
			VERSION,
			true
		);

		/**
		 * LayersSlct2 (also enqueued by Storekit and WooCommerce).
		 */
		wp_enqueue_style(
			NAME . 'select-2',
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/select2/select-2.css',
			array(),
			VERSION
		);
		wp_enqueue_style(
			NAME . 'select-2-skins',
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/select2/select-2-skins.css',
			array(),
			VERSION
		);
		wp_enqueue_script(
			NAME . 'select-2',
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/select2/select-2.js',
			array( 'jquery' ),
			VERSION
		);

		/**
		 * FontAwesome
		 */
		wp_enqueue_style(
			NAME . '-admin-font-awesome',
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/font-awesome/font-awesome.min.css',
			array(),
			VERSION
		);


		/**
		 * Main Admin CSS's
		 */
		wp_enqueue_style(
			NAME . '-global',
			get_template_directory_uri() . '/inc/admin/core/assets/layers-global.css',
			array(),
			VERSION
		);

		if ( isset( $wp_customize ) ) {

			/**
			 * Admin Customizer (only)
			 */
			wp_enqueue_style(
				NAME . '-customizer',
				get_template_directory_uri() . '/inc/admin/core/assets/layers-customizer.css',
				array(),
				VERSION
			);
			wp_style_add_data( 
				NAME . '-customizer',
				'rtl', 
				'replace' 
			);
		}
		else {

			/**
			 * Admin Dashboard (only)
			 */
			wp_enqueue_style(
				NAME . '-admin',
				get_template_directory_uri() . '/inc/admin/core/assets/layers-admin.css',
				array(),
				VERSION
			);
			wp_style_add_data( 
				NAME . '-admin',
				'rtl', 
				'replace' 
			);

		}


		/**
		 * Admin Editor
		 */
		wp_enqueue_style(
			NAME . '-admin-editor',
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/froala/editor.css',
			array(),
			VERSION
		);
		wp_enqueue_script(
			NAME . '-admin-editor' ,
			get_template_directory_uri() . '/inc/admin/core/assets/plugins/froala/editor.min.js' ,
			array( 'jquery' ),
			VERSION,
			true
		);


		
		wp_localize_script(
			NAME . '-admin-migrator',
			'migratori18n',
			array(
				'loading_message' => __( 'Be patient while we import the widget data and images.' , 'layerswp' ),
				'complete_message' => __( 'Import Complete' , 'layerswp' ),
				'importing_message' => __( 'Importing Your Content' , 'layerswp' ),
				'duplicate_complete_message' => __( 'Edit Your New Page' , 'layerswp' )
			)
		);
		wp_localize_script(
			NAME . '-admin-migrator',
			"layers_migrator_params",
			array(
					'duplicate_layout_nonce' => wp_create_nonce( 'layers-migrator-duplicate' ),
					'import_layout_nonce' => wp_create_nonce( 'layers-migrator-import' ),
					'preset_layout_nonce' => wp_create_nonce( 'layers-migrator-preset-layouts' ),
				)
		);


		/**
		 * Discover More Photos
		 */
		wp_enqueue_script(
			NAME . '-media-views' ,
			get_template_directory_uri() . '/inc/admin/core/assets/media-views.js',
			array(
				'media-views'
			),
			VERSION
		);


		/**
		 * Admin Onboarding
		 */
		wp_enqueue_script(
			NAME . '-admin-onboarding' ,
			get_template_directory_uri() . '/inc/admin/core/assets/onboarding.js',
			array(
					'jquery'
				),
			VERSION,
			true
		);
		wp_localize_script(
			NAME . '-admin-onboarding' ,
			"layers_onboarding_params",
			array(
				'preset_layout_nonce' => wp_create_nonce( 'layers-migrator-preset-layouts' ),
				'update_option_nonce' => wp_create_nonce( 'layers-onboarding-update-options' ),
				'set_theme_mod_nonce' => wp_create_nonce( 'layers-onboarding-set-theme-mods' ),
			)
		);
		wp_localize_script(
			NAME . '-admin-onboarding' ,
			'onboardingi18n',
			array(
				'step_saving_message' => __( 'Saving...' , 'layerswp' ),
				'step_done_message' => __( 'Done!' , 'layerswp' )
			)
		);


		/**
		 * Admin JS
		 */
		wp_enqueue_script(
			NAME . '-admin' ,
			get_template_directory_uri() . '/inc/admin/core/assets/admin.js',
			array(
				'jquery',
				'jquery-ui-sortable',
				'wp-color-picker',
			),
			VERSION,
			true
		);
		wp_localize_script(
			NAME . '-admin' ,
			'layers_admin_params',
			array(
				'backup_pages_nonce' => wp_create_nonce( 'layers-backup-pages' ),
				'backup_pages_success_message' => __('Your pages have been successfully backed up!', 'layerswp' ),
				'nonce_layers_widget_linking' => wp_create_nonce( 'nonce_layers_widget_linking' ),
			)
		);

		wp_enqueue_media();

	}
}

add_action( 'customize_controls_print_footer_scripts' , 'layers_admin_scripts' );
add_action( 'admin_enqueue_scripts' , 'layers_admin_scripts' );
