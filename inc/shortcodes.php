<?php

/**
 * Shortcode Bootstrap Visuals Shortcode Handler
 *
 * @author George Lewe
 * @link https://www.lewe.com
 *
 * @package Shortcode Bootstrap Visuals
 * @subpackage Shortcodes
 * @since 1.0.0
 */

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-alert].
 * 
 * This function picks up the [bsv-alert] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - style: Identifies the Bootstrap style to use. Defaults to 'primary'.
 * - heading: Heading of the alertbox. Leave empty for none.
 * - headinglevel: HTML heading level to use for the heading.
 * - dismissible: Whether the alert box shall be dismissible or not. yes/no.
 * - width: Width of the alertbox in pixel or percent. Leave empty for parent width.
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_alert_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'style'        => 'primary',
            'heading'      => '',
            'headinglevel' => 'h4',
            'dismissible'  => 'no',
            'width'        => ''
         ),
         $atts
      )
   );

   return $BS->alert($style, $heading, $headinglevel, $content, $dismissible, $width);
}
add_shortcode('bsv-alert', 'bsv_alert_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-badge].
 * 
 * This function picks up the [bsv-badge] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - style: Identifies the Bootstrap style to use. Defaults to 'primary'.
 * - type: Badge type. badge/pill
 * - size: Badge size. Default 75%.
 * - displayas: Whether to make the Badge part of a heading or a button. Omit for just badge.
 * - prefix: If part of a heading or button, this is the text of the heading or button.
 * - buttonstyle: Identifies the Bootstrap style for the button. Defaults to 'dark'.
 * - buttonlink: Button link incl. http:// or https://
 * - target: Link target of the button
 * - customtextcolor: Overwrites the Bootstrap text color here that is defined by the style, e.g. #990000.
 * - custombgcolor: Overwrites the Bootstrap background color here that is defined by the style, e.g. #990000.
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_badge_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'style'           => 'primary',
            'type'            => 'badge',
            'size'            => '75%',
            'displayas'       => '',
            'prefix'          => 'Prefix',
            'buttonstyle'     => 'primary',
            'buttonlink'      => '',
            'target'          => '',
            'customtextcolor' => '',
            'custombgcolor'   => ''
         ),
         $atts
      )
   );

   return $BS->badge($style, $type, $size, $displayas, $prefix, $buttonstyle, $buttonlink, $target, $customtextcolor, $custombgcolor, $content);
}
add_shortcode('bsv-badge', 'bsv_badge_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-blockquote].
 * 
 * This function picks up the [bsv-blockquote] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - sourcename: Name of the source
 * - sourcelink: Link of the source
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_blockquote_shortcode($atts, $content) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'source' => '',
            'sourceurl' => '',
            'title'  => '',
         ),
         $atts
      )
   );
   return $BS->blockquote($source, $sourceurl, $title, $content);
}
add_shortcode('bsv-blockquote', 'bsv_blockquote_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-button].
 * 
 * This function picks up the [bsv-button] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - style: Identifies the Bootstrap style to use. Defaults to 'primary'.
 * - size: Button size
 * - link: Button link incl. http:// or https://
 * - tooltip: Button link incl. http:// or https://
 * - target: Link target of the button
 * - outline: Display as outline button: yes/no
 * - customtextcolor: Overwrites the Bootstrap text color here that is defined by the style, e.g. #990000.
 * - custombgcolor: Overwrites the Bootstrap background color here that is defined by the style, e.g. #000099.
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_button_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'style'           => 'primary',
            'size'            => '75%',
            'link'            => '',
            'target'          => '',
            'tooltip'         => '',
            'outline'         => 'no',
            'customtextcolor' => '',
            'custombgcolor'   => ''
         ),
         $atts
      )
   );
   return $BS->button($style, $size, $link, $target, $tooltip, $outline, $customtextcolor, $custombgcolor, $content);
}
add_shortcode('bsv-button', 'bsv_button_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-button-group].
 * 
 * This function picks up the [bsv-button-group] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - styles: Addl. CSS styles separated by semicolon
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_button_group_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'styles'       => '',
         ),
         $atts
      )
   );
   return $BS->buttongroup($styles, do_shortcode($content));
}
add_shortcode('bsv-button-group', 'bsv_button_group_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-callout].
 * 
 * This function picks up the [bsv-callout] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - style: Identifies the Bootstrap style to use. Defaults to 'primary'.
 * - heading: Heading. Leave empty for none.
 * - headinglevel: HTML heading level to use for the heading.
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_callout_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'style'        => 'primary',
            'heading'      => '',
            'headinglevel' => 'h4',
         ),
         $atts
      )
   );
   return $BS->callout($style, $heading, $headinglevel, $content);
}
add_shortcode('bsv-callout', 'bsv_callout_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-card].
 * 
 * This function picks up the [bsv-card] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - style: Identifies the Bootstrap style to use. Defaults to 'primary'.
 * - heading: Heading. Leave empty for none.
 * - headinglevel: HTML heading level to use for the heading.
 * - title: Title. Leave empty for none.
 * - titlelevel: HTML heading level to use for the title.
 * - subtitle: Subtitle. Leave empty for none.
 * - subtitlelevel: HTML heading level to use for the subtitle.
 * - width: Width
 * - floatleft: Float left or not. yes/no
 * - outline: Outline style or not. yes/no
 * - img: Image source
 * - footer: Footer text
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_card_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'style'         => 'default',
            'heading'       => '',
            'headinglevel'  => 'h4',
            'title'         => '',
            'titlelevel'    => 'h4',
            'subtitle'      => '',
            'subtitlelevel' => 'h5',
            'width'         => '',
            'floatleft'     => 'no',
            'outline'       => 'no',
            'img'           => '',
            'footer'        => '',
         ),
         $atts
      )
   );
   return $BS->card($style, $heading, $headinglevel, $title, $titlelevel, $subtitle, $subtitlelevel, $width, $floatleft, $outline, $img, $footer, $content);
}
add_shortcode('bsv-card', 'bsv_card_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-jumbo].
 * 
 * This function picks up the [bsv-jumbo] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - heading: Heading.
 * - headingsize: Size of the heading.
 * - lead: Lead text underneath the heading.
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_jumbo_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'heading'     => 'Hello, world!',
            'headingsize' => '4',
            'lead'        => '',
         ),
         $atts
      )
   );
   return $BS->jumbotron($heading, $headingsize, $lead, $content);
}
add_shortcode('bsv-jumbo', 'bsv_jumbo_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-panel].
 * 
 * This function picks up the [bsv-panel] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - textcolor: Text color
 * - bgcolor: Background color
 * - bordertop: Border on top: yes/no
 * - borderright: Border on right: yes/no
 * - borderbottom: Border on bottom: yes/no
 * - borderleft: Border on left: yes/no
 * - borderradius: Border on bottom: yes/no
 * - id: Object ID
 * - classes: Addl. style classes separated by blank
 * - styles: Addl. styles separated by semicolon
 *
 * @param array  $atts     Attributes received from the shortcode tag
 * @param string $content  Content between the opening and closing shortcode tags.
 * 
 * @return string HTML code
 */
function bsv_panel_shortcode($atts, $content = null) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'textstyle'    => 'inherit',
            'bgstyle'      => 'inherit',
            'bordertop'    => 'yes',
            'borderright'  => 'yes',
            'borderbottom' => 'yes',
            'borderleft'   => 'yes',
            'borderstyle'  => '',
            'borderradius' => 'none',
            'id'           => '',
            'classes'      => '',
            'styles'       => '',
         ),
         $atts
      )
   );
   return $BS->panel($textstyle, $bgstyle, $bordertop, $borderright, $borderbottom, $borderleft, $borderstyle, $borderradius, $id, $classes, $styles, $content);
}
add_shortcode('bsv-panel', 'bsv_panel_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-progress].
 * 
 * This function picks up the [bsv-progress] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - animated: Animated progress bar: yes/no
 * - progress: Progress value in percent
 * - striped: Striped progress bar: yes/no
 * - style: Style of the progress bar
 * - width: Custom width
 *
 * @param array $atts  Attributes received from the shortcode tag
 * 
 * @return string HTML code
 */
function bsv_progress_shortcode($atts) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'animated' => 'no',
            'id'       => '',
            'progress' => '75',
            'striped'  => 'no',
            'style'    => 'primary',
            'width'    => '',
         ),
         $atts
      )
   );
   return $BS->progress($animated, $id, $progress, $striped, $style, $width);
}
add_shortcode('bsv-progress', 'bsv_progress_shortcode');

// ----------------------------------------------------------------------
/**
 * Shortcode handler for [bsv-spinner].
 * 
 * This function picks up the [bsv-spinner] shortcode and its parameters
 * and initiates the appropriate creation of the Bootstrap object.
 * 
 * Supported shortcode attributes:
 * 
 * - button: Display in a button
 * - buttontext: Button text
 * - shape: Shape of the spinner
 * - size: Size of the spinner
 * - style: Bootstrap style of the spinner
 *
 * @param array $atts  Attributes received from the shortcode tag
 * 
 * @return string HTML code
 */
function bsv_spinner_shortcode($atts) {
   $BS = new Bootstrap();
   //
   // Extract the submitted parameters
   //
   extract(
      shortcode_atts(
         array(
            'button'     => 'no',
            'buttontext' => '',
            'shape'      => 'border',
            'size'       => 'normal',
            'style'      => 'primary',
         ),
         $atts
      )
   );
   return $BS->spinner($button, $buttontext, $shape, $size, $style);
}
add_shortcode('bsv-spinner', 'bsv_spinner_shortcode');
