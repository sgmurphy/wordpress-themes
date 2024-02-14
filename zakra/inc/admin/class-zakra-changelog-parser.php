<?php
/**
 * Zakra Changelog Parser Class.
 *
 * @author  ThemeGrill
 * @package Zakra
 * @since   1.3.9
 */

defined( 'ABSPATH' ) || exit;

! defined( 'ZAKRA_CHANGELOG_ENTRY_PATTERN' ) && define( 'ZAKRA_CHANGELOG_ENTRY_PATTERN', '/(?=\=\s\d+\.\d+\.\d+|\Z)/' );
! defined( 'ZAKRA_CHANGELOG_VERSION_PATTERN' ) && define( 'ZAKRA_CHANGELOG_VERSION_PATTERN', '/^= (\d+(\.\d+)+) - (\d+-\d+-\d+) =/m' );
! defined( 'ZAKRA_CHANGELOG_CHANGE_PATTERN' ) && define( 'ZAKRA_CHANGELOG_CHANGE_PATTERN', '/^\* (\w+(\s*-\s*.+)?)$/m' );

if ( ! class_exists( 'Zakra_Changelog_Parser' ) ) {

	/**
	 * Zakra Changelog Parser.
	 */
	class Zakra_Changelog_Parser {


		/**
		 * Changelog txt file path.
		 *
		 * @var string
		 */
		private $file_path;

		/**
		 * Raw changelog.
		 * @var string
		 */
		private $raw_changelog;

		/**
		 * Parsed changelog.
		 *
		 * @var array
		 */
		private $parsed_changelog;


		/**
		 * Constructor.
		 *
		 * @param string $file_path Path to changelog .txt file.
		 */
		public function __construct( $file_path ) {
			$this->file_path = $file_path;
		}

		/**
		 * Parse.
		 *
		 * @return boolean|array
		 */
		public function parse() {
			try {
				if ( is_wp_error( $this->read() ) ) {
					return false;
				}
				$this->parse_changelog();
			} catch ( Exception $e ) {
				$this->parsed_changelog = array();
			}
			return $this->parsed_changelog;
		}

		/**
		 * Render changelog html.
		 *
		 * @return void
		 */
		public function render_changelog_html() {
			$this->parse();
			$changelog = $this->parsed_changelog;
			include __DIR__ . '/views/changelog.php';
		}

		/**
		 * Read content of changelog file.
		 *
		 * @return \WP_Error|string
		 */
		private function read() {
			/**
			 * WP_FIlesystem_Direct instance.
			 *
			 *  @var \WP_Filesystem_Direct $wp_filesystem WP_FIlesystem_Direct instance.
			 */
			global $wp_filesystem;

			if ( ! $wp_filesystem || 'direct' !== $wp_filesystem->method ) {
				require_once ABSPATH . '/wp-admin/includes/file.php';
				$credentials = request_filesystem_credentials( '', 'direct' );
				WP_Filesystem( $credentials );
			}

			if ( ! $wp_filesystem ) {
				return new \WP_Error( 'filesystem_error', esc_html__( 'Could not access filesystem.', 'zakra' ) );
			}

			if ( ! $wp_filesystem->exists( $this->file_path ) ) {
				return new \WP_Error( 'changelog_not_found', esc_html__( 'Changelog not found.', 'zakra' ) );
			}

			$raw_changelog = $wp_filesystem->get_contents( $this->file_path );

			if ( ! $raw_changelog ) {
				return new \WP_Error( 'changelog_read_error', esc_html__( 'Failed to read changelog.', 'zakra' ) );
			}

			$this->raw_changelog = $raw_changelog;
		}

		/**
		 * Parse the raw changelog.
		 *
		 * @return void
		 */
		private function parse_changelog() {
			$entries = preg_split( ZAKRA_CHANGELOG_ENTRY_PATTERN, $this->raw_changelog, -1, PREG_SPLIT_NO_EMPTY );
			array_shift( $entries );

			$parsed_changelog = array();

			foreach ( $entries as $entry ) {
				$date    = null;
				$version = null;

				if ( preg_match( ZAKRA_CHANGELOG_VERSION_PATTERN, $entry, $matches ) ) {
					$version = $matches[1] ?? null;
					$date    = $matches[3] ?? null;
				}

				$changes_arr = $this->parse_changes( $entry );

				if ( $version && $date && $changes_arr ) {
					$parsed_changelog[] = array(
						'version' => $version,
						'date'    => $date,
						'changes' => $changes_arr,
					);
				}
			}

			$this->parsed_changelog = $parsed_changelog;
		}

		/**
		 * Parse changes for a given entry.
		 *
		 * @param string $entry Changelog entry.
		 * @return array
		 */
		private function parse_changes( $entry ) {
			$changes_arr = array();

			if ( preg_match_all( ZAKRA_CHANGELOG_CHANGE_PATTERN, $entry, $matches ) ) {
				$changes = $matches[1] ?? null;

				if ( is_array( $changes ) ) {
					foreach ( $changes as $change ) {
						$parts = explode( ' - ', $change );
						$tag   = trim( $parts[0] ?? '' );
						$data  = isset( $parts[1] ) ? trim( $parts[1] ) : '';

						if ( isset( $changes_arr[ $tag ] ) ) {
							$changes_arr[ $tag ][] = $data;
						} else {
							$changes_arr[ $tag ] = array( $data );
						}
					}
				}
			}

			return $changes_arr;
		}
	}
}
