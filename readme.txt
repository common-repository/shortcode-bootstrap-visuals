=== Lewe Bootstrap Visuals ===
Contributors: glewe
Donate link: http://www.paypal.me/GeorgeLewe
Tags: bootstrap,lewe,bootstrap-visuals,visuals,shortcode,style,css,alert,badge,button,blockquote,callout,card,jumbotron,panel,progressbar,spinner,table
Requires at least: 4.0
Tested up to: 6.1
Stable tag: 2.2.2
Requires PHP: 5.2.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.html
 
The Lewe Bootstrap Visuals plugin provides shortcodes for easy placement of Bootstrap 4 visual objects on your page.

== Description ==
The Lewe Bootstrap Visuals plugin provides shortcodes for putting Bootstrap 4 visual objects onto your page. The Bootstrap Javascript is not included. Only objects based on CSS are supported at this point.
The plugin uses custom style names so they don't interfere with other theme styles that may be based on the default Bootstrap styles.

Insert one of the Lewe Bootstrap Visuals shortcodes into your page and specify the parameters if needed.
For example:
`[bsv-alert style="danger" heading="Attention" dismissible="yes"]` will add the start of a Bootstrap alert box.
Now continue typing regular text which will be the content of the alert box.
`[/bsv-alert]` will close the Bootstrap alert box.

== Features ==
Lewe Bootstrap Visuals supports the following Bootstrap elements:
* `alert`
* `badge`
* `blockquote`
* `button`
* `callout`
* `card`
* `jumbotron`
* `panel`
* `progressbar`
* `spinner`
* `table`

It also includes the Bootstrap table styles that you can freely apply to your tables.

== Usage ==
1. Enter a `[bsv-...]` shortcode in your page or post editor
2. Specify shortcode parameters if applicable and needed
3. Type your content
3. Enter the closing `[/bsv-...]` shortcode tag

*TinyMCE*
When using the TinyMCE editor, a menu button will be available to conveniently insert the shortcuts, either wrapping in selected text or as a standalone shortcode.

[Documentation](https://lewe.gitbook.io/lewe-bootstrap-visuals/ "Lewe Bootstrap Visuals Documentation")

== Support ==
Choose your preferred support channel:
1. [WordPress Support Forum](https://wordpress.org/support/plugin/shortcode-bootstrap-visuals/ "WordPress Support Forum")
3. [Lewe Service Desk](https://georgelewe.atlassian.net/servicedesk/customer/portal/5/ "Lewe Service Desk")

== Screenshots ==
1. Lewe Bootstrap Visuals Examples

== Frequently Asked Questions ==
= What colors are in the Bootstrap styles ? =
See this link for the Boostrap color styles: [Bootstrap Color Codes](https://lewe.gitbook.io/lewe-bootstrap-visuals/color-styles/ "Bootstrap Color Codes")

== Installation ==
= Backend Installation =
1. Go to Plugin page
2. Click Add New
3. Enter "Lewe Bootstrap Visuals" in search field
4. Install and Activate

= Manual Installation =
1. Download the plugin ZIP file from [here](https://www.lewe.com/shortcode-bootstrap-visuals/ "Download Lewe Bootstrap Visuals")
2. Unpack the ZIP file locally
3. Upload the 'shortcode-bootstrap-visuals' folder to your '/wp-content/plugins/' directory
4. Activate the plugin on the 'Plugins' page of your WordPress backend

== Changelog ==
= 2.2.2
* 2022-10-14
* Minor bugfixes
* Updated documentation and support link

= 2.2.0
* 2022-09-28
* Change display name to Lewe Bootstrap Visuals

= 2.1.1
* 2022-06-12
* WordPress 6.0 compatibility check

= 2.1.0
* 2021-11-10
* Fixed several styles

= 2.0.2
* 2021-10-09
* Fixed blockquote bug

= 2.0.1
* 2021-09-16
* Fixed alert box bug

= 2.0.0
* 2021-08-30
* Updated styles to Bootstrap 4.6
* Added styles= parameter to button-group shortcode

= 1.5.0 =
* Added the Button Group shortcode

= 1.4.0 =
* Alert heading changed to styled div instead of html heading to avoid theme overwrites
* Callout heading changed to styled div instead of html heading to avoid theme overwrites
* Style updates for Card for better readability

= 1.3.2 =
* Bugfix release

= 1.3.1 =
* Updated documentation link in TinyMCE menu

= 1.3.0 =
* Proper naming

= 1.2.1 =
* Updated support links

= 1.2.0 =
* Added TinyMCE editor button

= 1.1.0 =
* Added the blockquote shortcode

= 1.0.1 =
* Fixed documentation link on plugin page
* Fixed Lewe.com support forum link in readme

= 1.0.0 =
* Initital release

## Upgrade Notice ##
### 2.0.1 ###
This version fixes a CSS bug in the alert box module.