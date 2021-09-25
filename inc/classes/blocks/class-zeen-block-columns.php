<?php
/**
 * Zeen block columns
 *
 * @since 1.0.0
 */

class ZeenBlockColumns extends ZeenBlocks {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	*/
	public function __construct( $args ) {
		$this->type = 'columns';
		parent::__construct( $args );
	}

	/**
	 * Block output
	 *
	 * @since 1.0.0
	 *
	*/
	public function output( $echo = true ) {

		if ( $this->enabled() != true ) {
			return;
		}

		if ( empty( $echo ) ) {
			ob_start();
		}
		$this->args['nested'] = empty( $this->args['nested'] ) ? array() : $this->args['nested'];
		$length = $this->args['columns'];
		if ( 3 == $this->args['layout'] && 3 == $length ) {
			$length = 4;
			$pieces = true;
		}
		$classes = '';
		$responsive = $this->responsive_check();
		if ( empty( $responsive['mobile'] ) ) {
			$classes .= ' mob-off';
		}

		if ( empty( $responsive['desktop'] ) ) {
			$classes .= ' dt-off';
		}
		$classes .= ' block-wrap-cols-' . (int) $this->args['columns'] . ' block-wrap-cols-' . (int) $this->args['columns'] . '-' . (int) $this->args['layout'];
		if ( $this->args['columns'] > 1 ) {
			$classes .= ' block-wrap-110-multi';
		}
		$classes .= 5 == $this->args['skin'] ? ' content-bg' : '';
		$this->opening_wrap( array(
			'classes' => $classes,
		) );

		$i = 0;
		$is_110 = parent::$is_110;
		$is_110_1 = parent::$is_110_1;
		parent::$is_110 = true;
		parent::$is_110_1 = 1 == $length;
		if ( ! empty( $pieces ) ) {
			echo '<div class="tipi-col-piece tipi-col-piece-1 tipi-flex tipi-flex-wrap tipi-flex-space-between zeen-col-sz-66">';
		}
		foreach ( $this->args['nested'] as $key ) {
			if ( 2 == $this->args['columns'] ) {
				$size = 50;
				if ( 1 == $this->args['layout'] ) {
					$size = 0 == $i ? 66 : 33;
				} elseif ( 2 == $this->args['layout'] ) {
					$size = 0 == $i ? 33 : 66;
				} elseif ( 3 == $this->args['layout'] ) {
					$size = 0 == $i ? 20 : 80;
				} elseif ( 4 == $this->args['layout'] ) {
					$size = 0 == $i ? 80 : 20;
				} elseif ( 5 == $this->args['layout'] ) {
					$size = 0 == $i ? 25 : 75;
				} elseif ( 6 == $this->args['layout'] ) {
					$size = 0 == $i ? 75 : 25;
				}
			} elseif ( 3 == $this->args['columns'] ) {
				$size = 33;
				if ( 1 == $this->args['layout'] ) {
					if ( 0 == $i ) {
						$size = 20;
					} elseif ( 1 == $i ) {
						$size = 46;
					}
				} elseif ( 2 == $this->args['layout'] ) {
					if ( 2 == $i ) {
						$size = 20;
					} elseif ( 1 == $i ) {
						$size = 46;
					}
				} elseif ( 3 == $this->args['layout'] ) {
					if ( 2 == $i ) {
						$size = 66;
					}
				} elseif ( 4 == $this->args['layout'] ) {
					$size = 25;
					if ( 2 == $i ) {
						$size = 50;
					}
				} elseif ( 5 == $this->args['layout'] ) {
					$size = 25;
					if ( 0 == $i ) {
						$size = 50;
					}
				} elseif ( 6 == $this->args['layout'] ) {
					$size = 25;
					if ( 1 == $i ) {
						$size = 50;
					}
				}
			} elseif ( 4 == $this->args['columns'] ) {
				$size = 25;
			} elseif ( 1 == $this->args['columns'] ) {
				$size = 100;
			}
			parent::$is_110_size = $size;
			echo '<div class="tipi-col zeen-col zeen-col-' . (int) $i . ' zeen-col-sz-' . (int) $size;
			if ( $size < 46 ) {
				echo ' zeen-col--narrow';
			} else {
				echo ' zeen-col--wide';
			}
			echo '">';
			TipiBuilder\ZeenHelpers::zeen_print_content( $key, true );
			echo '</div>';
			$i++;
			if ( ! empty( $pieces ) && 3 == $i ) {
				echo '</div><div class="tipi-col-piece tipi-col-piece-2 tipi-flex tipi-flex-wrap tipi-flex-space-between zeen-col-sz-33">';
			}
			if ( $i == $length ) {
				break;
			}
		}
		if ( ! empty( $pieces ) ) {
			echo '</div>';
		}
		if ( empty( $is_110 ) ) {
			parent::$is_110 = '';
			parent::$is_110_size = 101;
			parent::$is_110_1 = '';
		}

		$this->closing_wrap();

		if ( empty( $echo ) ) {
			return ob_get_clean();
		}
	}

}
