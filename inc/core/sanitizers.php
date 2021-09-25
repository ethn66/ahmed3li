<?php
/**
 * Theme sanitizers
 *
 * @package Zeen
 * @since 1.0.0
 */

function zeen_sanitize_wp_kses( $data ) {

	return wp_kses( $data, array(
		'a' => array(
			'href'  => array(),
			'class'  => array(),
			'style'    => array(),
			'id'  => array(),
			'target'  => array(),
			'rel' => array(),
			'data-format' => array(),
			'class' => array(),
			'data-source' => array(),
			'data-type' => array(),
			'data-src' => array(),
			'title' => array(),
		),
		'span' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'p' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
			'br'    => array(),
			'a' => array(
				'href'  => array(),
				'class'  => array(),
				'style'    => array(),
				'id'  => array(),
				'target'  => array(),
				'rel' => array(),
				'data-format' => array(),
				'class' => array(),
				'data-source' => array(),
				'data-type' => array(),
				'data-src' => array(),
				'title' => array(),
			),
		),
		'h1' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'h2' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'h3' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'h4' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'h5' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'img' => array(
			'src'    => array(),
			'srcset' => array(),
			'alt'    => array(),
		),
		'div' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'i' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'u' => array(
			'class' => array(),
			'id'    => array(),
			'style'    => array(),
		),
		'br'     => array(),
		'b'     => array(
			'style'    => array(),
		),
		'em'     => array(
			'class' => array(),
			'style'    => array(),
		),
		'ul'     => array(
			'class' => array(),
			'style'    => array(),
		),
		'ol'     => array(
			'class' => array(),
			'style'    => array(),
		),
		'li'     => array(
			'class' => array(),
			'style'    => array(),
		),
		'strong' => array(
			'class' => array(),
			'style'    => array(),
		),
		'italic' => array(
			'class' => array(),
			'style'    => array(),
		),
		'iframe'  => array(
			'class' => array(),
			'id'    => array(),
			'src'    => array(),
			'width'    => array(),
			'style'    => array(),
			'height'    => array(),
		),
	));
}

function zeen_sanitize_titles( $data ) {

	return wp_kses( $data, array(
		'span' => array(
			'class' => array(),
			'style' => array(),
		),
		'h1' => array(
			'class' => array(),
			'style' => array(),
		),
		'h2' => array(
			'class' => array(),
			'style' => array(),
		),
		'h3' => array(
			'class' => array(),
			'style' => array(),
		),
		'h4' => array(
			'class' => array(),
			'style' => array(),
		),
		'div' => array(
			'class' => array(),
			'style'    => array(),
		),
		'i' => array(
			'class' => array(),
			'style' => array(),
		),
		'u' => array(
			'style' => array(),
		),
		'p' => array(
			'style' => array(),
			'br'    => array(),
			'class' => array(),
		),
		'a' => array(
			'href' => array(),
			'style' => array(),
			'target' => array(),
			'data-format' => array(),
			'class' => array(),
			'rel' => array(),
			'data-source' => array(),
			'data-type' => array(),
			'data-src' => array(),
		),
		'b'     => array(),
		'strong' => array(
			'style'    => array(),
		),
		'em' => array(
			'style'    => array(),
			'class' => array(),
		),
		'br'     => array(),
	));

}

/**
 * Sanitizer Commas
 *
 * @since  1.0.0
 */
function zeen_sanitize_num_commas( $data ) {

	$data = filter_var( $data, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND );
	return $data;

}

/**
 * Sanitizer Array
 *
 * @since  1.0.0
 */
function zeen_sanitize_array( $array ) {

	if ( ! is_array( $array ) ) {
		return array();
	}

	foreach ( $array as $key => $value ) {

		if ( is_array( $value ) ) {
			$array[ $key ] = zeen_sanitize_array( $value );
		} else {
			$array[ $key ] = esc_attr( $value );
		}
	}

	return $array;
}

/**
 * Sanitizer Floats
 *
 * @since  1.0.0
 */
function zeen_sanitizer_float( $data ) {
	return floatval( $data );
}

/**
 * Sanitizer Builder
 *
 * @since  1.0.0
 */
function zeen_sanitizer_fonts( $fonts ) {
	$output = array();
	foreach ( $fonts as $font ) {
		$output[] = esc_attr( $font->key );
	}
	return $output;
}

/**
 * Sanitizer Builder
 *
 * @since  1.0.0
 */
function zeen_sanitizer_builder( $block, $id = '' ) {

	unset( $block->refreshing );
	unset( $block->render );
	unset( $block->render_m );
	unset( $block->only_inner );
	unset( $block->builder_request );
	if ( 101 == $block->preview || 300 == $block->preview ) {
		if ( ! empty( $block->sidebar ) && 2 == $block->sidebar ) {
			if ( ! empty( ZeenOptions::$zeen_options['zeen_sidebar_bids'] ) ) {
				if ( in_array( $block->uid, ZeenOptions::$zeen_options['zeen_sidebar_bids'] ) ) {
					$pos = array_search( $block->uid, ZeenOptions::$zeen_options['zeen_sidebar_bids'] );
					if ( ! empty( $pos ) || 0 === $pos ) {
						unset( ZeenOptions::$zeen_options['zeen_sidebar_bids'][ $pos ] );
					}
				}
				if ( ! empty( ZeenOptions::$zeen_options['zeen_sidebar_bids'][ $block->uid ] ) ) {
					unset( ZeenOptions::$zeen_options['zeen_sidebar_bids'][ $block->uid ] );
				}
				ZeenOptions::$zeen_options['zeen_sidebar_bids'][ $block->uid ] = array(
					'uid' => $block->uid,
					'label' => $block->label,
					'id' => $id,
				);
			} else {
				ZeenOptions::$zeen_options['zeen_sidebar_bids'] = array(
					$block->uid = array(
						'uid' => $block->uid,
						'label' => $block->label,
						'id' => $id,
					),
				);
			}

			ZeenOptions::zeen_update_option();
		} else {
			if ( ! empty( ZeenOptions::$zeen_options['zeen_sidebar_bids'] ) ) {
				$pos = array_search( $block->uid, ZeenOptions::$zeen_options['zeen_sidebar_bids'] );
				if ( ! empty( $pos ) && 0 !== $pos ) {
					unset( ZeenOptions::$zeen_options['zeen_sidebar_bids'][ $pos ] );
				}
				if ( ! empty( ZeenOptions::$zeen_options['zeen_sidebar_bids'][ $block->uid ] ) ) {
					unset( ZeenOptions::$zeen_options['zeen_sidebar_bids'][ $block->uid ] );
				}
				ZeenOptions::zeen_update_option();
			}
		}
	}
	foreach ( $block as $key => $value ) {
		if ( isset( $value->value ) ) {
			$block->{$key} = $value->value;
		}
		if ( 'nested' == $key ) {
			$nested = $block->nested;

			foreach ( $nested as $nest ) {
				if ( is_array( $nest ) ) {
					foreach ( $nest as $subkey ) {
						$subkey = zeen_sanitizer_builder( $subkey, $id );
					}
				} else {
					$nest = zeen_sanitizer_builder( $nest, $id );
				}
			}

			$block->{$key} = $nested;
		} else {
			if ( is_array( $value ) && isset( $value[0] ) ) {
				if ( is_object( $value[0] ) ) {
					$output = '';
					foreach ( $value as $obj_key ) {
						$output .= $obj_key->value . ',';
					}
					$block->{$key} = rtrim( $output, ',' );
				} else {
					$block->{$key} = implode( ',', $value );
				}
			}
			$block->{$key} = preg_replace_callback( '/rgb\((.*?)\);/', 'zeen_preg_replace_cb', $block->{$key} );
			$block->{$key} = str_replace( '&quot;',  '', $block->{$key} );
			if ( 'custom_content' != $key ) {
				$block->{$key} = zeen_sanitize_wp_kses( $block->{$key} );
			}
		}
		if ( empty( $block->{$key} ) && strpos( $key, 'padding' ) === false && 'skin' != $key && strpos( $key, 'gutter_width' ) === false ) {
			unset( $block->{$key} );
		}
	}
	return $block;
}


/**
 * Sanitizer Preg Callback - Needed for PHP < 5.3
 *
 * @since  1.0.0
 */
function zeen_preg_replace_cb( $matches ) {
	$colors = explode( ',', $matches[1] );
	$match = sprintf( '#%02x%02x%02x', $colors[0], $colors[1], $colors[2] );
	return $match;
}

/**
 * Sanitizer Builder Filter
 *
 * @since  1.0.0
 */
function zeen_sanitizer_builder_filter( $block ) {
	$output = '';
	if ( ! empty( $block->custom_content ) ) {
		$output .= PHP_EOL . $block->custom_content;
	}

	if ( ! empty( $block->small_print ) ) {
		$output .= PHP_EOL . '<small>' . esc_attr( $block->small_print ) . '</small>';
	}

	if ( ! empty( $block->ad_img ) ) {
		if ( ! empty( $block->title ) ) {
			$output .= PHP_EOL . '<small>' . esc_attr( $block->title ) . '</small>';
		}
		if ( ! empty( $block->ad_url ) ) {
			$output .= PHP_EOL . '<a href="' . esc_url( $block->ad_url ) . '">';
		}
		$output .= PHP_EOL . '<img src="' . esc_url( $block->ad_img ) . '">';
		if ( ! empty( $block->ad_url ) ) {
			$output .= PHP_EOL . '</a>';
		}
	}

	if ( ! empty( $block->img_bg ) ) {
		$output .= PHP_EOL . '<img src="' . esc_url( $block->img_bg ) . '">';
	}

	if ( ! empty( $block->button_text ) ) {
		if ( ! empty( $block->button_url ) ) {
			$output .= PHP_EOL . '<a href="' . esc_url( $block->button_url ) . '" class="button"';
			if ( ! empty( $block->button_color ) ) {
				$output .= 'style="background-color: ' . esc_attr( $block->button_color ) . ' ;"';
			}
			$output .= '>';
		}
		$output .= PHP_EOL . $block->button_text;
		if ( ! empty( $block->button_url ) ) {
			$output .= PHP_EOL . '</a>';
		}
	}

	return $output;
}



function zeen_sanitizer_options( $data, $options ) {
	if ( in_array( $data, $options ) ) {
		return $data;
	} else {
		return esc_attr( $data );
	}
}

function zeen_sanitizer_measurement_type( $data ) {
	$output = '';
	if ( 'px' == $data ) {
		$output = 'px';
	} elseif ( '%' == $data ) {
		$output = '%';
	} elseif ( 'em' == $data ) {
		$output = 'em';
	} elseif ( 'rem' == $data ) {
		$output = 'rem';
	} else {
		$output = esc_attr( $data );
	}
	return $output;
}


function zeen_sanitizer_border_type( $data ) {
	$output = '';
	if ( 'solid' == $data ) {
		$output = 'solid';
	} elseif ( 'dashed' == $data ) {
		$output = 'dashed';
	} elseif ( 'dotted' == $data ) {
		$output = 'dotted';
	} else {
		$output = esc_attr( $data );
	}
	return $output;
}
