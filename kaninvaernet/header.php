<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<?php
	astra_header_before();

	astra_header();

	astra_header_after();

	astra_content_before();
	?>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
			
			
			<style>
				#masthead {
					transition: 400ms ease-in-out;
					position: fixed;
					width: 100%;
					box-shadow: 1px 1px 10px #00000026;

				}
				
				.custom-logo-link img, .sticky .site-branding {
					transition: 400ms ease-in-out;
				}
				
				.sticky .custom-logo-link img {
					max-width: 190px;
				}
				
				.sticky .site-branding {
					padding: 0 0 10px 0;
				}
				.sticky .ast-builder-menu-1 .main-header-menu > .menu-item > .sub-menu, .sticky .ast-builder-menu-1 .main-header-menu > .menu-item > .astra-full-megamenu-wrapper {
    margin-top: 0px;
    top: 55px;
	border-top: 2px solid #346733;
height: auto;}
	
			</style>
			<script>
				
			
 $(document).scroll(function() {
	 /* hent header */
	 var header = document.getElementById("masthead");
	 /* opret scroll */
				let y = window.scrollY;
	 /* hvis scroll er større eller lig med 30px tilføj sticky header */
  if (y >= 30) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
});
				
				
			
			</script>
