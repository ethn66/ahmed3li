<?php
/**
 * Control Fonts
 *
 * @package Zeen
 * @since 1.0.0
 */
class Zeen_Control_Typo extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @since  1.0.0
	 */
	public $type = 'zeen-fonts';

	/**
	 * Selected font
	 *
	 * @since  1.0.0
	 */
	public $selected;

	/**
	 * Enqueue control related scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'zeen-control-typo', get_parent_theme_file_uri( 'assets/admin/js/zeen-control-typo.js' ), array( 'jquery' ), false, true );
	}

	/**
	 * Render the content of the control
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		$selected = '';
		$selected_variants = $selected_subsets = array();

		if ( isset( $this->settings[0] ) ) {
			$selected = $this->settings[0]->value();
			$selected_variants = $this->choices->$selected->variants;
			$selected_subsets = $this->choices->$selected->subsets;
		}

	?>
		<label>
			<div class="customize-control control-vertical-c font-main">
				<span class="customize-control-title customize-control-title-top"><?php echo esc_html__( 'Google Font', 'zeen' ); ?></span>
				<?php
				if ( isset( $this->description ) && '' !== $this->description ) {
					echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
				} ?>
				<div class="zeen-select-wrap">
					 <select data-customize-setting-link="<?php echo esc_attr( $this->settings[0]->id ); ?>" class="zeen-fonts" name="_customize-zeen-fonts-<?php echo esc_attr( $this->id ); ?>[]">
						<optgroup label="<?php esc_attr_e( 'Recommended Google Fonts', 'zeen' ); ?>">
						<?php foreach ( $this->recommended() as $key => $value ) { ?>
								<option value="<?php echo esc_attr( $key ); ?>" data-category="<?php echo esc_attr( $value->category ); ?>" data-variants="<?php echo esc_attr( implode( ',', $value->variants ) ); ?>" data-subsets="<?php echo esc_attr( implode( ',', $value->subsets ) ); ?>"><?php echo sanitize_text_field( $key ); ?></option>
							<?php } ?>
						</optgroup>
						<optgroup label="<?php esc_attr_e( 'All Google Fonts', 'zeen' ); ?>">
						<?php foreach ( $this->choices as $key => $value ) { ?>
							<option value="<?php echo esc_attr( $key ); ?>" data-category="<?php echo esc_attr( $value->category ); ?>" data-variants="<?php echo esc_attr( implode( ',', $value->variants ) ); ?>" data-subsets="<?php echo esc_attr( implode( ',', $value->subsets ) ); ?>"><?php echo sanitize_text_field( $key ); ?></option>
						<?php } ?>
						</optgroup>>
					</select>
				</div>
			</div>
			<div class="customize-control control-vertical-c font-weight">
				<span class="customize-control-title"><?php echo esc_html__( 'Font Weight', 'zeen' ); ?></span>
				<div class="zeen-select-wrap">
					<select data-customize-setting-link="<?php echo esc_attr( $this->settings[1]->id ); ?>" class="zeen-font-weight" data-default-weight="<?php echo esc_attr( $this->settings[1]->default ); ?>" name="_customize-zeen-fonts-<?php echo esc_attr( $this->id ); ?>[]">
						<option value="100" <?php disabled( false, in_array( '100', $selected_variants ) ); ?>>Thin (100)</option>
						<option value="100italic" <?php disabled( false, in_array( '100italic', $selected_variants ) ); ?>>Thin Italic (100)</option>
						<option value="200" <?php disabled( false, in_array( '200', $selected_variants ) ); ?>>Extra-light (200)</option>
						<option value="200italic" <?php disabled( false, in_array( '200italic', $selected_variants ) ); ?>>Extra-light Italic (200)</option>
						<option value="300" <?php disabled( false, in_array( '300', $selected_variants ) ); ?>>Light (300)</option>
						<option value="300italic" <?php disabled( false, in_array( '300italic', $selected_variants ) ); ?>>Light Italic (300)</option>
						<option value="regular" <?php disabled( false, in_array( 'regular', $selected_variants ) ); ?>>Regular (400)</option>
						<option value="italic" <?php disabled( false, in_array( 'italic', $selected_variants ) ); ?>>Regular Italic (400)</option>
						<option value="500" <?php disabled( false, in_array( '500', $selected_variants ) ); ?>>Medium (500)</option>
						<option value="500italic" <?php disabled( false, in_array( '500italic', $selected_variants ) ); ?>>Medium Italic (500)</option>
						<option value="600" <?php disabled( false, in_array( '600', $selected_variants ) ); ?>>Semi-bold (600)</option>
						<option value="600italic" <?php disabled( false, in_array( '600italic', $selected_variants ) ); ?>>Semi-bold Italic (600)</option>
						<option value="700" <?php disabled( false, in_array( '700', $selected_variants ) ); ?>>Bold (700)</option>
						<option value="700italic" <?php disabled( false, in_array( '700italic', $selected_variants ) ); ?>>Bold Italic (700)</option>
						<option value="800" <?php disabled( false, in_array( '800', $selected_variants ) ); ?>>Extra-bold (800)</option>
						<option value="800italic" <?php disabled( false, in_array( '800italic', $selected_variants ) ); ?>>Extra-bold Italic (800)</option>
						<option value="900" <?php disabled( false, in_array( '900', $selected_variants ) ); ?>>Black (900)</option>
						<option value="900italic" <?php disabled( false, in_array( '900italic', $selected_variants ) ); ?>>Black Italic (900)</option>
					</select>
				</div>
			</div>
			<div class="customize-control control-vertical-c font-subsets">
				<span class="customize-control-title"><?php echo esc_html__( 'Character Set', 'zeen' ); ?></span>
				<div class="zeen-select-wrap zeen-select-wrap-multi">
					<select multiple="true" data-customize-setting-link="<?php echo esc_attr( $this->settings[2]->id ); ?>" class="zeen-font-subsets" data-default-subset="<?php //esc_attr( $this->settings[2]->default ); ?>" name="_customize-zeen-fonts-<?php echo esc_attr( $this->id ); ?>[]">
						<option value="latin" <?php disabled( false, in_array( 'latin', $selected_subsets ) ); ?>><?php esc_attr_e( 'Default', 'zeen' ); ?></option>
						<option value="latin-ext" <?php disabled( false, in_array( 'latin-ext', $selected_subsets ) ); ?>><?php esc_attr_e( 'Latin Extended', 'zeen' ); ?></option>
						<option value="greek" <?php disabled( false, in_array( 'greek', $selected_subsets ) ); ?>><?php esc_attr_e( 'Greek', 'zeen' ); ?></option>
						<option value="greek-ext" <?php disabled( false, in_array( 'greek-ext', $selected_subsets ) ); ?>><?php esc_attr_e( 'Greek Extended', 'zeen' ); ?></option>
						<option value="vietnamese" <?php disabled( false, in_array( 'vietnamese', $selected_subsets ) ); ?>><?php esc_attr_e( 'Vietnamese', 'zeen' ); ?></option>
						<option value="cyrillic" <?php disabled( false, in_array( 'cyrillic', $selected_subsets ) ); ?>><?php esc_attr_e( 'Cyrillic', 'zeen' ); ?></option>
						<option value="cyrillic-ext" <?php disabled( false, in_array( 'cyrillic-ext', $selected_subsets ) ); ?>><?php esc_attr_e( 'Cyrillic Extended', 'zeen' ); ?></option>
						<option value="oriya" <?php disabled( false, in_array( 'oriya', $selected_subsets ) ); ?>><?php esc_attr_e( 'Oriya', 'zeen' ); ?></option>
						<option value="bengali" <?php disabled( false, in_array( 'bengali', $selected_subsets ) ); ?>><?php esc_attr_e( 'Bengali', 'zeen' ); ?></option>
						<option value="korean" <?php disabled( false, in_array( 'korean', $selected_subsets ) ); ?>><?php esc_attr_e( 'Korean', 'zeen' ); ?></option>
						<option value="japanese" <?php disabled( false, in_array( 'japanese', $selected_subsets ) ); ?>><?php esc_attr_e( 'Japanese', 'zeen' ); ?></option>
						<option value="chinese-simplified" <?php disabled( false, in_array( 'chinese-simplified', $selected_subsets ) ); ?>><?php esc_attr_e( 'Chinese Simplified', 'zeen' ); ?></option>
						<option value="chinese-traditional" <?php disabled( false, in_array( 'chinese-traditional', $selected_subsets ) ); ?>><?php esc_attr_e( 'Chinese Traditional', 'zeen' ); ?></option>
						<option value="khmer" <?php disabled( false, in_array( 'khmer', $selected_subsets ) ); ?>><?php esc_attr_e( 'Khmer', 'zeen' ); ?></option>
						<option value="myanmar" <?php disabled( false, in_array( 'myanmar', $selected_subsets ) ); ?>><?php esc_attr_e( 'Myanmar', 'zeen' ); ?></option>
						<option value="devanagari" <?php disabled( false, in_array( 'devanagari', $selected_subsets ) ); ?>><?php esc_attr_e( 'Devanagari', 'zeen' ); ?></option>
					</select>
				</div>
			</div>
			<input type="hidden" class="zeen-font-cat" name="_customize-zeen-fonts-<?php echo esc_attr( $this->id ); ?>[]" data-customize-setting-link="<?php echo esc_attr( $this->settings[3]->id ); ?>">
		</label>
	<?php
	}

	/**
	 * Recommended
	 *
	 * @since 1.0.0
	 */
	public function recommended() {

		$fonts = '{	"Arvo": {"family": "Arvo", "category": "serif", "variants": ["regular", "italic", "700", "700italic"], "subsets": ["latin"] }, "Crimson Text": {"family": "Crimson Text", "category": "serif", "variants": ["regular", "italic", "600", "600italic", "700", "700italic"], "subsets": ["latin"] }, "Droid Sans": {"family": "Droid Sans", "category": "sans-serif", "variants": ["regular", "700"], "subsets": ["latin"] }, "Fira Sans": {"family": "Fira Sans", "category": "sans-serif", "variants": ["100", "100italic", "200", "200italic", "300", "300italic", "regular", "italic", "500", "500italic", "600", "600italic", "700", "700italic", "800", "800italic", "900", "900italic"], "subsets": ["latin-ext", "greek-ext", "vietnamese", "cyrillic-ext", "latin", "cyrillic", "greek"] }, "Indie Flower": {"family": "Indie Flower", "category": "handwriting", "variants": ["regular"], "subsets": ["latin"] }, "Josefin Slab": {"family": "Josefin Slab", "category": "serif", "variants": ["100", "100italic", "300", "300italic", "regular", "italic", "600", "600italic", "700", "700italic"], "subsets": ["latin"] }, "Lato": {"family": "Lato", "category": "sans-serif", "variants": ["100", "100italic", "300", "300italic", "regular", "italic", "700", "700italic", "900", "900italic"], "subsets": ["latin-ext", "latin"] }, "Merriweather": {"family": "Merriweather", "category": "serif", "variants": ["300", "300italic", "regular", "italic", "700", "700italic", "900", "900italic"], "subsets": ["latin-ext", "cyrillic-ext", "latin", "cyrillic"] }, "Merriweather Sans": {"family": "Merriweather Sans", "category": "sans-serif", "variants": ["300", "300italic", "regular", "italic", "700", "700italic", "800", "800italic"], "subsets": ["latin-ext", "latin"] }, "Montserrat": {"family": "Montserrat", "category": "sans-serif", "variants": ["100", "100italic", "200", "200italic", "300", "300italic", "regular", "italic", "500", "500italic", "600", "600italic", "700", "700italic", "800", "800italic", "900", "900italic"], "subsets": ["latin-ext", "vietnamese", "latin"] }, "Open Sans": {"family": "Open Sans", "category": "sans-serif", "variants": ["300", "300italic", "regular", "italic", "600", "600italic", "700", "700italic", "800", "800italic"], "subsets": ["latin-ext", "greek-ext", "vietnamese", "cyrillic-ext", "latin", "cyrillic", "greek"] }, "Oswald": {"family": "Oswald", "category": "sans-serif", "variants": ["200", "300", "regular", "500", "600", "700"], "subsets": ["latin-ext", "vietnamese", "latin", "cyrillic"] }, "Playfair Display": {"family": "Playfair Display", "category": "serif", "variants": ["regular", "italic", "700", "700italic", "900", "900italic"], "subsets": ["latin-ext", "latin", "cyrillic"] }, "Raleway": {"family": "Raleway", "category": "sans-serif", "variants": ["100", "100italic", "200", "200italic", "300", "300italic", "regular", "italic", "500", "500italic", "600", "600italic", "700", "700italic", "800", "800italic", "900", "900italic"], "subsets": ["latin-ext", "latin"] }, "Roboto": {"family": "Roboto", "category": "sans-serif", "variants": ["100", "100italic", "300", "300italic", "regular", "italic", "500", "500italic", "700", "700italic", "900", "900italic"], "subsets": ["latin-ext", "greek-ext", "vietnamese", "cyrillic-ext", "latin", "cyrillic", "greek"] }, "Ubuntu": {"family": "Ubuntu", "category": "sans-serif", "variants": ["300", "300italic", "regular", "italic", "500", "500italic", "700", "700italic"], "subsets": ["latin-ext", "greek-ext", "cyrillic-ext", "latin", "cyrillic", "greek"] }, "Work Sans": {"family": "Work Sans", "category": "sans-serif", "variants": ["100", "200", "300", "regular", "500", "600", "700", "800", "900"], "subsets": ["latin-ext", "latin"] } }';

		return json_decode( $fonts );

	}

}
