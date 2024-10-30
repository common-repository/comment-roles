=== Plugin Name ===
Contributors: kendalltristan
Donate link: https://inspirepay.com/pay/kendall
Tags: comments, roles,
Requires at least: 3.4
Tested up to: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows filering of comments by user role. It adds checkboxes for each role above the comments allowing users to determing which comments to show.

== Description ==

Comment Roles is a very simple plugin. The sole purpose is to provide users with the ability to filter comments based
on the role of users who have contributed comments to any given post. This plugin is not meant to be used simply as
is. Rather it's expected that a site administrator will apply additional CSS rules to their child theme or to the CSS
section of their theme or another plugin in order to to best integrate this plugin in their site. There is currently
no additional functionality associated with this plugin.

This plugin does not work with Jetpack Comments. At present there are no plans to try and make it work with Jetpack
based on how it functions. Perhaps this will change in the future, but for now I don't anticipate anything different. 
Additionally, this plugin requires the permalink structure be changed from the default. Any other permalink structure
will work fine.

== Installation ==

1. Install Comment Roles via the WordPress plugin installer, the plugin uploader, or upload the file to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Add necessary CSS rules to your child theme or a custom CSS field provided by your theme or another plugin (Jetpack works well for this).

== Frequently Asked Questions ==

= Do you have plans to add more functionality to the plugin? =

At this moment nothing is set in stone, but I'd like to have it to where privileged users can defined whether or not to enable the plugin on individual posts and have a global setting for which roles are to be used. I have no general timeline at the moment, but this is in a very early stage of development so anything could change.

== Screenshots ==

1. This shows the Comment Roles form with minor styling in the Twenty Twelve theme. No comments are currently being filtered.
2. This shows the Comment Roles form as above, but set to only show comments by Administrator accounts.

== Changelog ==

= 0.0.3 =
* Tested with obsolete WordPress versions to determine accurate compatibility. Compatibility confirmed back to version 3.4.
* Added initial screenshots.
* Added div.comment-roles-wrap around the form.
* Added classes to form inputs to simplify styling.

= 0.0.2 =
* Fixed a couple of very minor non-functional formatting issues in the code.
* Added proper comments to the code.
* Added "comment-roles-form" class to the form.

= 0.0.1 =
* Initial Release on wordpress.org forums.

== Upgrade Notice ==

= 0.0.3 =
Version 0.0.3 adds some additional classes to help with styling. Other changes are purely administrative.

= 0.0.2 =
This version adds a specific class to the form for assistance when styling it.

