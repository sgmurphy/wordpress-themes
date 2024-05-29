jQuery(window).load(function() {

	// Select external links
	var externalLink = jQuery('#toplevel_page_thinkup-setup').find('a[href*="thinkupthemes.com"]');

	// Open external links in new tab
	externalLink.attr('target', '_blank');

	// Select upgrade link
	var upgradeLink   = jQuery('#toplevel_page_thinkup-setup').find('a[href*="thinkupthemes.com/themes/"]');
	var upgradeParent = upgradeLink.closest('li');

	// Highlight upgrade link
	upgradeParent.addClass('thinkup-sidebar-upgrade-pro');
});
