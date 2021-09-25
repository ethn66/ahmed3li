<?php
/**
 * Section title
 *
 * @package Zeen
 * @since 1.0.0
 */

class Zeen_Section_Title extends WP_Customize_Section {

	/**
	 * Type of this section.
	 *
	 */
	public $type = 'zeen-section-title';

	/**
	 * Unique identifier.
	 *
	 */
	public $zeen_title;

	/**
	 * Output
	 *
	 * @since 1.0.0
	 */
	public function render() {
		$description = $this->description;
		?>
		<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="accordion-section zeen-section-title">
			<h3><?php echo esc_html( $this->title ); ?></h3>
			<?php if ( ! empty( $description ) ) { ?>
				<span class="description"><?php echo esc_html( $description ); ?></span>
			<?php } ?>
		</li>
	<?php
	}
}
