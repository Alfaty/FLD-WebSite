<?php
/**
 * Welcome Page
 *
 * @package    Modern
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    2.0.0
 * @version  2.0.0
 *
 * Contents:
 *
 *  1) Requirements check
 * 10) Admin page
 */





/**
 * 1) Requirements check
 */

	if (
		! is_admin()
		|| ! get_theme_mod( 'admin_welcome_page', true )
	) {
		return;
	}





/**
 * 10) Admin page
 */

	require MODERN_PATH_INCLUDES . 'welcome/class-welcome.php';
