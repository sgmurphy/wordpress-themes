<?php
/**
 * Zakra svg icons class
 *
 * @package Zakra
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();

if ( ! class_exists( 'Zakra_SVG_Icons' ) ) {

	/**
	 * Zakra_SVG_Icons class.
	 */
	class Zakra_SVG_Icons {

		/**
		 * Allowed HTML.
		 *
		 * @var bool[][]
		 */
		public static $allowed_html = array(
			'svg'     => array(
				'class'       => true,
				'xmlns'       => true,
				'width'       => true,
				'height'      => true,
				'viewbox'     => true,
				'aria-hidden' => true,
				'role'        => true,
				'focusable'   => true,
				'fill'        => true,
				'stroke'      => true,
				'fill-rule'   => true,
			),
			'path'    => array(
				'fill'      => true,
				'fill-rule' => true,
				'clip-rule' => true,
				'd'         => true,
				'transform' => true,
			),
			'circle'  => array(
				'cx' => true,
				'cy' => true,
				'r'  => true,
			),
			'polygon' => array(
				'fill'      => true,
				'fill-rule' => true,
				'points'    => true,
				'transform' => true,
				'focusable' => true,
			),
			'rect'    => array(
				'x'      => true,
				'rx'     => true,
				'fill'   => true,
				'height' => true,
				'width'  => true,
			),
		);

		/**
		 * SVG icons.
		 *
		 * @var string[]
		 */
		public static $icons = array(
			'arrow-right-long'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92 12.38a1 1 0 0 0 0-.76 1 1 0 0 0-.21-.33L17.42 7A1 1 0 0 0 16 8.42L18.59 11H2.94a1 1 0 1 0 0 2h15.65L16 15.58A1 1 0 0 0 16 17a1 1 0 0 0 1.41 0l4.29-4.28a1 1 0 0 0 .22-.34Z"/></svg>',
			'arrow-left-long'       => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M2 12.38a1 1 0 0 1 0-.76.91.91 0 0 1 .22-.33L6.52 7a1 1 0 0 1 1.42 0 1 1 0 0 1 0 1.41L5.36 11H21a1 1 0 0 1 0 2H5.36l2.58 2.58a1 1 0 0 1 0 1.41 1 1 0 0 1-.71.3 1 1 0 0 1-.71-.3l-4.28-4.28a.91.91 0 0 1-.24-.33Z"></path></svg>',
			'chevron-down'          => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.5c-.3 0-.5-.1-.7-.3l-9-9c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l8.3 8.3 8.3-8.3c.4-.4 1-.4 1.4 0s.4 1 0 1.4l-9 9c-.2.2-.4.3-.7.3z"/></svg>',
			'chevron-up'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 17.5c-.3 0-.5-.1-.7-.3L12 8.9l-8.3 8.3c-.4.4-1 .4-1.4 0s-.4-1 0-1.4l9-9c.4-.4 1-.4 1.4 0l9 9c.4.4.4 1 0 1.4-.2.2-.4.3-.7.3z"/></svg>',
			'magnifying-glass'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 22c-.3 0-.5-.1-.7-.3L16.6 18c-1.5 1.2-3.5 2-5.6 2-5 0-9-4-9-9s4-9 9-9 9 4 9 9c0 2.1-.7 4.1-2 5.6l3.7 3.7c.4.4.4 1 0 1.4-.2.2-.4.3-.7.3zM11 4c-3.9 0-7 3.1-7 7s3.1 7 7 7c1.9 0 3.6-.8 4.9-2 0 0 0-.1.1-.1s0 0 .1-.1c1.2-1.3 2-3 2-4.9C18 7.1 14.9 4 11 4z"/></svg>',
			'magnifying-glass-bars' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 20H3a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2Zm4-2a1 1 0 0 1-.71-.29L18 15.4a6.29 6.29 0 0 1-10-5A6.43 6.43 0 0 1 14.3 4a6.31 6.31 0 0 1 6.3 6.3 6.22 6.22 0 0 1-1.2 3.7l2.31 2.3a1 1 0 0 1 0 1.42A1 1 0 0 1 21 18ZM14.3 6a4.41 4.41 0 0 0-4.3 4.4 4.25 4.25 0 0 0 4.3 4.2 4.36 4.36 0 0 0 4.3-4.3A4.36 4.36 0 0 0 14.3 6ZM6 14H3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-6H3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Z"/></svg>',
			'x-mark'                => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m14 12 7.6-7.6c.6-.6.6-1.5 0-2-.6-.6-1.5-.6-2 0L12 10 4.4 2.4c-.6-.6-1.5-.6-2 0s-.6 1.5 0 2L10 12l-7.6 7.6c-.6.6-.6 1.5 0 2 .3.3.6.4 1 .4s.7-.1 1-.4L12 14l7.6 7.6c.3.3.6.4 1 .4s.7-.1 1-.4c.6-.6.6-1.5 0-2L14 12z"/></svg>',
			'ellipsis-vertical'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.5 3.125C13.5417 3.125 14.375 3.95833 14.375 5C14.375 6.04167 13.5417 6.875 12.5 6.875C11.4583 6.875 10.625 6.04167 10.625 5C10.625 3.95833 11.4583 3.125 12.5 3.125ZM12.5 10.625C13.5417 10.625 14.375 11.4583 14.375 12.5C14.375 13.5417 13.5417 14.375 12.5 14.375C11.4583 14.375 10.625 13.5417 10.625 12.5C10.625 11.4583 11.4583 10.625 12.5 10.625ZM12.5 18.125C13.5417 18.125 14.375 18.9583 14.375 20C14.375 21.0417 13.5417 21.875 12.5 21.875C11.4583 21.875 10.625 21.0417 10.625 20C10.625 18.9583 11.4583 18.125 12.5 18.125Z" stroke="#27272A" stroke-width="2" stroke-miterlimit="10"/></svg>',
			'no-result'             => '<svg width="232" height="186" viewBox="0 0 232 186" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="1.63379" y="1" width="228.866" height="184" rx="7" fill="#F4F4F5" stroke="#3F3F46" stroke-width="2"></rect><circle cx="11.5773" cy="14.751" r="4" fill="#3F3F46"></circle><circle cx="23.5773" cy="14.751" r="4" fill="#3F3F46"></circle><circle cx="35.5773" cy="14.751" r="4" fill="#3F3F46"></circle><rect width="175.751" height="2.95238" rx="1.47619" transform="matrix(1 0 0 -1 48.7444 15.7461)" fill="#3F3F46"></rect><line x1="2.36975" y1="28.5527" x2="229.764" y2="28.5527" stroke="#3F3F46" stroke-width="2"></line><path d="M113 126.076C128.464 126.076 141 113.511 141 98.011C141 82.5111 128.464 69.946 113 69.946C97.536 69.946 85 82.5111 85 98.011C85 113.511 97.536 126.076 113 126.076Z" stroke="#3F3F46" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"></path><path d="M148 133.092L132.775 117.832" stroke="#3F3F46" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
			'user'                  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M4.66667 4.66659C4.66667 2.79992 6.13333 1.33325 8 1.33325C9.86667 1.33325 11.3333 2.79992 11.3333 4.66659C11.3333 6.53325 9.86667 7.99992 8 7.99992C6.13333 7.99992 4.66667 6.53325 4.66667 4.66659ZM10.6667 9.33325H5.33333C3.46667 9.33325 2 10.7999 2 12.6666V13.9999C2 14.3999 2.26667 14.6666 2.66667 14.6666H13.3333C13.7333 14.6666 14 14.3999 14 13.9999V12.6666C14 10.7999 12.5333 9.33325 10.6667 9.33325Z"></path></svg>',
			'calendar'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M14.0667 4.39992V5.46659C14.0667 5.86659 13.8 6.13325 13.4 6.13325H2.60002C2.20002 6.13325 1.93335 5.86659 1.93335 5.46659V4.39992C1.93335 3.39992 2.80002 2.53325 3.80002 2.53325H4.93335V1.99992C4.93335 1.59992 5.20002 1.33325 5.60002 1.33325C6.00002 1.33325 6.26668 1.59992 6.26668 1.99992V2.53325H9.73335V1.99992C9.73335 1.59992 10 1.33325 10.4 1.33325C10.8 1.33325 11.0667 1.59992 11.0667 1.99992V2.53325H12.2C13.2 2.53325 14.0667 3.39992 14.0667 4.39992ZM13.4 7.46659H2.60002C2.20002 7.46659 1.93335 7.73325 1.93335 8.13325V12.7999C1.93335 13.7999 2.80002 14.6666 3.80002 14.6666H12.2C13.2 14.6666 14.0667 13.7999 14.0667 12.7999V8.13325C14.0667 7.73325 13.8 7.46659 13.4 7.46659Z"></path></svg>',
			'comment'               => '<svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 16 16"><path d="M14.6667 3.33325V9.99992C14.6667 11.1333 13.8 11.9999 12.6667 11.9999H4.93337L2.46671 14.4666C2.33337 14.5999 2.20004 14.6666 2.00004 14.6666C1.93337 14.6666 1.80004 14.6666 1.73337 14.5999C1.46671 14.5333 1.33337 14.2666 1.33337 13.9999V3.33325C1.33337 2.19992 2.20004 1.33325 3.33337 1.33325H12.6667C13.8 1.33325 14.6667 2.19992 14.6667 3.33325Z"></path></svg>',
			'chevron-right'         => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.707 11.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L13.586 12 8.293 6.707a1 1 0 011.414-1.414l6 6z" /></svg>',
			'chevron-left'          => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.293 12.707a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L10.414 12l5.293 5.293a1 1 0 01-1.414 1.414l-6-6z"/></svg>',
			'cart'                  => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 24 24"><path d="M18.5 22c-1 0-1.8-.8-1.8-1.8s.8-1.8 1.8-1.8 1.8.8 1.8 1.8-.8 1.8-1.8 1.8zm0-2c-.2 0-.2 0-.2.2s0 .2.2.2.2 0 .2-.2 0-.2-.2-.2zm-8.9 2c-1 0-1.8-.8-1.8-1.8s.8-1.8 1.8-1.8 1.8.8 1.8 1.8-.8 1.8-1.8 1.8zm0-2c-.2 0-.2 0-.2.2s0 .2.2.2.2 0 .2-.2 0-.2-.2-.2zm8.4-2.9h-7.9c-1.3 0-2.4-.9-2.6-2.2L6.1 8.2v-.1L5.4 4H3c-.6 0-1-.4-1-1s.4-1 1-1h3.3c.5 0 .9.4 1 .8L8 7h12.9c.3 0 .6.1.8.4.2.2.3.5.2.8L20.6 15c-.3 1.3-1.3 2.1-2.6 2.1zM8.3 9l1.2 5.6c.1.4.4.5.6.5H18c.1 0 .5 0 .6-.5L19.7 9H8.3z"/></svg>',
			'search'                => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11 4a7 7 0 100 14 7 7 0 000-14zm-9 7a9 9 0 1118 0 9 9 0 01-18 0z"/><path d="M15.943 15.943a1 1 0 011.414 0l4.35 4.35a1 1 0 01-1.414 1.414l-4.35-4.35a1 1 0 010-1.414z"/></svg>',
			'calender'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M17 2C17 1.44772 16.5523 1 16 1C15.4477 1 15 1.44772 15 2V3H9V2C9 1.44772 8.55228 1 8 1C7.44772 1 7 1.44772 7 2V3H5C3.34315 3 2 4.34315 2 6V10V20C2 21.6569 3.34315 23 5 23H19C20.6569 23 22 21.6569 22 20V10V6C22 4.34315 20.6569 3 19 3H17V2ZM20 9V6C20 5.44772 19.5523 5 19 5H17V6C17 6.55228 16.5523 7 16 7C15.4477 7 15 6.55228 15 6V5H9V6C9 6.55228 8.55228 7 8 7C7.44772 7 7 6.55228 7 6V5H5C4.44772 5 4 5.44772 4 6V9H20ZM4 11H20V20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11Z" /></svg>',
			'edit'                  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M17.207 4.207a1.121 1.121 0 011.586 1.586L6.489 18.097l-2.115.529.529-2.115L17.207 4.207zM18 1.88c-.828 0-1.622.329-2.207.914l-12.5 12.5a1 1 0 00-.263.464l-1 4a1 1 0 001.213 1.213l4-1a1 1 0 00.464-.263l12.5-12.5a3.12 3.12 0 00-1.012-5.09A3.121 3.121 0 0018 1.878zM12 19a1 1 0 100 2h9a1 1 0 100-2h-9z" /></svg>',
			'arrow-right'           => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 12a1 1 0 011-1h14a1 1 0 110 2H5a1 1 0 01-1-1z" clip-rule="evenodd"/><path d="M11.293 4.293a1 1 0 011.414 0l7 7a1 1 0 010 1.414l-7 7a1 1 0 01-1.414-1.414L17.586 12l-6.293-6.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>',
			'arrow-down'            => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.293 8.293a1 1 0 011.414 0L12 13.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414z"/></svg>',
			'arrow-up'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 20a1 1 0 01-1-1V5a1 1 0 112 0v14a1 1 0 01-1 1z"></path><path fill-rule="evenodd" d="M4.293 12.707a1 1 0 010-1.414l7-7a1 1 0 011.414 0l7 7a1 1 0 01-1.414 1.414L12 6.414l-6.293 6.293a1 1 0 01-1.414 0z"></path></svg>',
			'filter'                => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path clip-rule="evenodd" d="M4 2a1 1 0 011 1v7a1 1 0 11-2 0V3a1 1 0 011-1zm1 13h2a1 1 0 100-2H1a1 1 0 100 2h2v6a1 1 0 102 0v-6zm8-3a1 1 0 10-2 0v9a1 1 0 102 0v-9zM12 2a1 1 0 011 1v4h2a1 1 0 110 2H9a1 1 0 110-2h2V3a1 1 0 011-1zm8 13h3a1 1 0 110 2h-2v4a1 1 0 11-2 0v-4h-2a1 1 0 110-2h3zm0-13a1 1 0 011 1v9a1 1 0 11-2 0V3a1 1 0 011-1z"/></svg>',
			'tag'                   => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 24 24"><path d="M14.4 21.5c-.3 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l5.2-5.2c.7-.7 1.1-1.7 1.1-2.7 0-1-.4-2-1.1-2.7l-4.9-5c-.4-.4-.4-1 0-1.4.4-.4 1-.4 1.4 0l4.9 4.9c1.1 1.1 1.7 2.6 1.7 4.1s-.6 3-1.7 4.1l-5.2 5.2c-.2.3-.5.4-.7.4zm-1-2.7 4.7-4.7c1.3-1.3 1.3-3.3 0-4.6l-5.9-5.9c-.6-.6-1.4-.9-2.3-.9H4.7C3.2 2.7 2 3.9 2 5.4v5.2c0 .9.3 1.7.9 2.3l5.9 5.9c.6.6 1.5.9 2.3.9.8 0 1.6-.3 2.3-.9zM9.9 4.7c.3 0 .6.1.9.4l5.9 5.9c.5.5.5 1.3 0 1.8L12 17.3c-.5.5-1.3.5-1.8 0l-5.9-5.9c-.2-.2-.3-.5-.3-.8V5.4c0-.4.3-.7.7-.7h5.2zm-3 4c-.6 0-1.1-.5-1.1-1.1s.5-1.1 1.1-1.1S8 7 8 7.6s-.5 1.1-1.1 1.1z"></path></svg>',
			'close'                 => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.293 5.293a1 1 0 011.414 0L12 10.586l5.293-5.293a1 1 0 111.414 1.414L13.414 12l5.293 5.293a1 1 0 01-1.414 1.414L12 13.414l-5.293 5.293a1 1 0 01-1.414-1.414L10.586 12 5.293 6.707a1 1 0 010-1.414z" /></svg>',
			'grid'                  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 2a1 1 0 00-1 1v7a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H3zm1 7V4h5v5H4zM14 2a1 1 0 00-1 1v7a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1h-7zm1 7V4h5v5h-5zM13 14a1 1 0 011-1h7a1 1 0 011 1v7a1 1 0 01-1 1h-7a1 1 0 01-1-1v-7zm2 1v5h5v-5h-5zM3 13a1 1 0 00-1 1v7a1 1 0 001 1h7a1 1 0 001-1v-7a1 1 0 00-1-1H3zm1 7v-5h5v5H4z"/></svg>',
			'close-circle'          => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 3a9 9 0 100 18 9 9 0 000-18zM1 12C1 5.925 5.925 1 12 1s11 4.925 11 11-4.925 11-11 11S1 18.075 1 12z" /><path d="M15.707 8.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414l6-6a1 1 0 011.414 0z" /><path d="M8.293 8.293a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414l-6-6a1 1 0 010-1.414z" /></svg>',
			'bars-sort'             => '<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path d="M9 19H3a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2Zm6-6H3a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2Zm6-6H3a.94.94 0 0 1-1-1 .94.94 0 0 1 1-1h18a.94.94 0 0 1 1 1 .94.94 0 0 1-1 1Z"></path></svg>',
			'folder'                => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.2 5.60039H11.6L10.1 3.30039C9.9 3.10039 9.6 2.90039 9.3 2.90039H4.8C3.3 2.90039 2 4.20039 2 5.70039V18.3004C2 19.8004 3.3 21.1004 4.8 21.1004H19.2C20.7 21.1004 22 19.8004 22 18.3004V8.40039C22 6.90039 20.7 5.60039 19.2 5.60039Z" ></path></svg>',
			'bars'                  => '<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path d="M21 19H3a1 1 0 0 1 0-2h18a1 1 0 0 1 0 2Zm0-6H3a1 1 0 0 1 0-2h18a1 1 0 0 1 0 2Zm0-6H3a1 1 0 0 1 0-2h18a1 1 0 0 1 0 2Z"/></svg>',
			'heart'                 => '<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path d="M12 20.85a1 1 0 0 1-.71-.29l-7.61-7.62a5.73 5.73 0 1 1 8.11-8.11L12 5l.21-.21a5.73 5.73 0 0 1 8.11 0 5.73 5.73 0 0 1 0 8.11l-7.61 7.62a1 1 0 0 1-.71.33ZM7.74 5.15a3.74 3.74 0 0 0-2.65 6.38L12 18.44l6.91-6.91a3.74 3.74 0 0 0 0-5.28 3.75 3.75 0 0 0-5.29 0l-.91.92a1 1 0 0 1-1.42 0l-.91-.91a3.7 3.7 0 0 0-2.64-1.11Z"/></svg>',
		);

		/**
		 * Get the SVG icon.
		 *
		 * @param string $icon Default is empty.
		 * @param bool   $echo Default is true.
		 * @param array  $args Default is empty.
		 *
		 * @return string|null
		 */
		public static function get_svg( $icon = '', $echo = true, $args = array() ) {

			$icons = self::get_icons();
			$atts  = '';
			$svg   = '';

			if ( ! empty( $args ) ) {

				foreach ( $args as $key => $value ) {

					if ( ! empty( $value ) ) {

						$atts .= esc_html( $key ) . '="' . esc_attr( $value ) . '" ';
					}
				}
			}

			if ( array_key_exists( $icon, $icons ) ) {

				$repl = sprintf( '<svg class="zak-icon zakra-icon--%1$s" %2$s', $icon, $atts );
				$svg  = preg_replace( '/^<svg /', $repl, trim( $icons[ $icon ] ) );
				$svg  = preg_replace( "/([\n\t]+)/", ' ', $svg );
				$svg  = preg_replace( '/>\s*</', '><', $svg );
			}

			if ( ! $svg ) {

				return null;
			}

			if ( $echo ) {

				echo wp_kses( $svg, self::$allowed_html );
			} else {

				return wp_kses( $svg, self::$allowed_html );
			}
		}

		/**
		 * Get all SVG icons.
		 *
		 * @return mixed|void
		 */
		public static function get_icons() {

			/**
			 * Filter for svg icons.
			 *
			 * @since 3.0.0
			 */
			return apply_filters( 'zakra_svg_icons', self::$icons );
		}
	}
}
