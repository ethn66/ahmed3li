<?php
/**
 * Zeen detect
 *
 * @copyright Codetipi
 * @since 1.0.0
 */

if ( class_exists( 'Mobile_Detect' ) ) {

	class ZeenMobileDetect extends Mobile_Detect {

		private static $zeen_mob     = '';
		private static $zeen_tab     = '';
		private static $zeen_mob_tab = '';

		public function isMob( $user_agent = '', $http_headers = '' ) {

			if ( empty( self::$zeen_mob ) ) {
				if ( $this->isMobile( $user_agent, $http_headers ) && ! $this->isTablet( $user_agent, $http_headers ) ) {
					self::$zeen_mob = true;
				}
			}

			return self::$zeen_mob;
		}

		public function isTab( $user_agent = '', $http_headers = '' ) {

			if ( empty( self::$zeen_tab ) ) {
				self::$zeen_tab = $this->isTablet( $user_agent, $http_headers );
			}

			return self::$zeen_tab;
		}

		public function isMobTab( $user_agent = '', $http_headers = '' ) {

			if ( empty( self::$zeen_mob_tab ) ) {
				self::$zeen_mob_tab = $this->isMobile( $user_agent, $http_headers );
			}

			return self::$zeen_mob_tab;
		}

	}
}
