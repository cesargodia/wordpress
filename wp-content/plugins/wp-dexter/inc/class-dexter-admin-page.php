<?php
/**
 * wp-dexter admin area
 */

class Dexter_admin{
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		add_action( 'admin_head', array( $this, 'add_styles' ) );
	}
	/**
	 * Creates the admin menus for the plugin
	 */
	public function admin_menus() {
		add_menu_page(
			'Dexter Admin page',
			'Dexter',
			'manage_options',
			'wp-dexter',
			array( $this, 'admin_main_page' ),
			'dashicons-smartphone'
		);
	}
	/**
	 * Enqueues the CSS stylesheet
	 */
	public function add_styles() {
		wp_enqueue_style( 'dexter_backend_css', plugins_url( '../css/wp-dexter-styles.css', __FILE__ ) );
	}
	/**
	 * Renders the main page
	 */
	public function admin_main_page() {
		self::admin_header();
		//Renders the Pokemon Metabox with all display options enabled.
		Dexter_mbox::display_full_metabox();
		$this->admin_form_settings();
	}
	/**
	 * Renders the header of the admin area
	 */
	public static function admin_header() {
	?>
		<div class="wrapper">
			<h1>Dexter</h1>
			<p class="about description">Welcome PokeUser, you shall change Dexter's settings in this page</p>
		</div>
	<?php
	}
	/**
	 * Renders the admin settings
	 */
	public function admin_form_settings() {
	    ?>
		<div class="postbox pokepostbox">
			<div class="settings">
				<h3>Settings</h3>
				<p class="about description">Changes might take a while</p>
			</div>
			<form name="dexter_options" method="post" action="">
                <?php wp_nonce_field( 'submit_pokemon_generation', 'pokemon_generation_nonce' ); ?>
				<div class="form-field">
					<p>Currently picking up from: <span class="pokebold"><?php echo esc_html( get_option( 'wp_dexter_pokemon_generation' ) . ' Pokemon' ); ?></span></p>
					<label for="pokemon_generation"> Show until which generation? </label>
					<select name="pokemon_generation">
						<option value="151">1st Gen</option>
						<option value="251">2nd Gen</option>
						<option value="386">3rd Gen</option>
						<option value="493">4th Gen</option>
						<option value="649">5th Gen</option>
						<option value="721">6th Gen</option>
						<option value="807">7th Gen</option>
					</select>
				</div>
				<div class="form-field">
					<?php submit_button(); ?>
				</div>
			</form>
			<?php
		$this->process_form_settings();
	}
	/**
	 * Process the form settings
	 */
	public function process_form_settings() {
		if(isset( $_POST['pokemon_generation_nonce'] ) ) {
			if( wp_verify_nonce( $_POST['pokemon_generation_nonce'], 'submit_pokemon_generation' ) ){
				if ( isset( $_POST[ 'pokemon_generation'] ) ) {
					$pokemon_generation = sanitize_text_field ( $_POST['pokemon_generation'] );
					update_option( 'wp_dexter_pokemon_generation', $pokemon_generation );
				}
			}
		}
	}
}
