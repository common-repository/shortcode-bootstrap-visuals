<?php

/**
 * Bootstrap Class
 *
 * @author George Lewe
 * @link https://www.lewe.com
 *
 * @package Shortcode Bootstrap Visuals
 * @subpackage Classes
 * @since 1.0.0
 */

/**
 * Bootstrap Element Handler
 *
 * This class provides methods and properties for the creation of Bootstrap 4
 * elements.
 *
 * @since 1.0.0
 */
class Bootstrap {
   // 
   // Class variables
   //
   private $styles = array('danger', 'dark', 'info', 'light', 'primary', 'secondary', 'success', 'warning');
   private $calloutStyles = array('danger', 'info', 'primary', 'success', 'warning');
   private $cardStyles = array('danger', 'info', 'primary', 'success', 'warning');
   private $headingLevels = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
   private $targets = array('_blank', '_parent', '_self', '_top');
   private $borderRadiuses = array('rounded', 'rounded-top', 'rounded-right', 'rounded-bottom', 'rounded-left', 'rounded-circle');
   private $spinnerShapes = array('border', 'grow');
   private $blockquoteStyles = array('blue', 'blue-bordered', 'dark');

   // -------------------------------------------------------------------------
   /**
    * Constructor.
    *
    * @since 1.0.0
    */
   public function __construct() {
   }

   // -------------------------------------------------------------------------
   /**
    * Alert.
    *
    * Builds a Bootstrap alert element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $style         Bootstrap style
    * @param string $heading       Heading of the alert box
    * @param string $headingLevel  HTML heading level to use for the heading
    * @param string $content       Content of the alert box
    * @param string $dismissible   Whether the alert box shall be dismissible or not: yes/no
    * @param string $width         Width of the alert box in pixel or percent
    *
    * @return string HTML code of the alert box
    */
   public function alert($style, $heading, $headinglevel, $content, $dismissible, $width) {
      //
      // Prepare the HTML frame
      //
      $identifier    = "\n\n<!-- Shortcode Bootstrap Visuals Alert Box -->\n";
      $startTag      = "<div role=\"alert\" class=\"bsv-alert bsv-alert-%style%\" style=\"width:%width%;\">\n";
      $dismissButton = "   <button type=\"button\" class=\"close close-parent\" onclick=\"dismissParent(this);\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\n";
      // $headingTag    = "   <%headingLevel% class=\"bsv-mt-0\">%headingText%</%headingLevel%>\n   <hr>\n   ";
      $headingTag    = "   <div class=\"bsv-mt-0\" style=\"font-size:100%; font-weight:bold;\">%headingText%</div>\n   <hr>\n   ";
      $endTag        = "\n</div>\n";

      //
      // Style
      //
      if (in_array($style, $this->styles)) {
         $startTag = str_replace('%style%', $style, $startTag);
      } else {
         $startTag = str_replace('%style%', 'primary', $startTag);
      }

      //
      // Heading
      //
      if (strlen($heading)) {
         $headingTag = str_replace('%headingText%', $heading, $headingTag);
         if (in_array(strtolower($headinglevel), $this->headingLevels)) {
            $headingTag = str_replace('%headingLevel%', $headinglevel, $headingTag);
         } else {
            $headingTag = str_replace('%headingLevel%', 'h3', $headingTag);
         }
      } else {
         $headingTag = '';
      }

      //
      // Dismissible
      //
      if (strtolower($dismissible) == 'no') {
         $dismissButton = '';
      } else {
         $startTag = str_replace('bsv-alert ', 'bsv-alert bsv-alert-dismissible fade show ', $startTag);
      }

      //
      // Width
      //
      if (strpos($width, 'px') || strpos($width, '%')) {
         $startTag = str_replace('%width%', $width, $startTag);
      } else {
         $startTag = str_replace('%width%', '100%', $startTag);
      }

      //
      // Return output
      //
      return $identifier . $startTag . $dismissButton . $headingTag . $content . $endTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Badge.
    *
    * Builds a Bootstrap badge element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $style            Bootstrap style
    * @param string $type             Type of the badge: badge/pill
    * @param string $size             Size of the badge
    * @param string $displayas        Display as: heading/button. Empty if just badge.
    * @param string $prefix           Text of the heading or button
    * @param string $buttonstyle      Bootstrap style of the button
    * @param string $buttonlink       Link of the button or empty
    * @param string $target           Target of the button link: _blank/_self/_parent/_top
    * @param string $customtextcolor  Overwrites Bootstrap style text color, e.g. #990000
    * @param string $custombgcolor    Overwrites Bootstrap style background color, e.g. #990000
    * @param string $content          Content of the badge
    *
    * @return string HTML code of the badge
    */
   public function badge($style = 'primary', $type = 'badge', $size = '75%', $displayas = '', $prefix = '', $buttonstyle = 'dark', $buttonlink = '', $target = '_self', $customtextcolor = '', $custombgcolor = '', $content = 'My Badge') {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Badge -->\n";
      $badgeTag = "<span class=\"bsv-badge bsv-badge-%style%%type%\" style=\"font-size:%size%;%marginleft%%customstyles%\">%content%</span>\n\n";

      //
      // Style
      //      
      if (!in_array(strtolower($style), $this->styles)) {
         $style = 'primary';
      }

      //
      // Type
      //      
      if (strtolower($type) == 'pill') {
         $type = " bsv-badge-pill";
      } else {
         $type = "";
      }

      //
      // Size
      //      
      if (!strpos($size, 'px') && !strpos($size, '%')) {
         $size = "75%";
      }

      $customstyles = '';
      //
      // Custom text color
      //
      if (strlen($customtextcolor) == 7 && strpos($customtextcolor, '#') == 0) {
         $customstyles .= "color:" . $customtextcolor . " !important;";
      }

      //
      // Custom background color
      //
      if (strlen($custombgcolor) == 7 && strpos($custombgcolor, '#') == 0) {
         $customstyles .= "background-color:" . $custombgcolor . " !important;";
      }

      //
      // Build core badge tag
      //
      $badgeTag = str_replace("%style%", $style, $badgeTag);
      $badgeTag = str_replace("%type%", $type, $badgeTag);
      $badgeTag = str_replace("%size%", $size, $badgeTag);
      $badgeTag = str_replace("%customstyles%", $customstyles, $badgeTag);
      $badgeTag = str_replace("%content%", $content, $badgeTag);

      //
      // DisplayAs
      //
      if (strlen($displayas)) {
         if (strtolower($displayas) == 'button') {
            if (strlen($buttonlink)) {
               $badgeTag = "<a href=\"%buttonlink%\" target=\"%target%\" class=\"bsv-btn bsv-btn-%buttonstyle%\">%prefix%" . $badgeTag . "</a>\n";
               $badgeTag = str_replace("%buttonlink%", $buttonlink, $badgeTag);
               if (!strlen($buttonstyle) || !in_array($buttonstyle, $this->styles)) {
                  $buttonstyle = 'dark';
               }
               $badgeTag = str_replace("%buttonstyle%", $buttonstyle, $badgeTag);
            } else {
               $badgeTag = "<button class=\"bsv-btn bsv-btn-%buttonstyle%\">%prefix%" . $badgeTag . "</button>\n";
               if (!strlen($buttonstyle) || !in_array($buttonstyle, $this->styles)) {
                  $buttonstyle = 'dark';
               }
               $badgeTag = str_replace("%buttonstyle%", $buttonstyle, $badgeTag);
            }
         } else if (in_array(strtolower($displayas), $this->headingLevels)) {
            $badgeTag = "<%headinglevel%>%prefix%" . $badgeTag . "</%headinglevel%>\n";
            $badgeTag = str_replace("%headinglevel%", $displayas, $badgeTag);
         }
         $badgeTag = str_replace("%prefix%", $prefix, $badgeTag);
         $badgeTag = str_replace("%marginleft%", "margin-left:16px;", $badgeTag);
      } else {
         $badgeTag = str_replace("%marginleft%", "", $badgeTag);
      }

      //
      // Return output
      //
      return $identifier . $badgeTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Blockquote.
    *
    * Builds a Bootstrap blockquoter element based on the given parameters
    *
    * @since 1.1.0
    *
    * @param string $source     Name of the source
    * @param string $sourceurl  URL of source
    * @param string $title      Title of the quote
    * @param string $content    Content of the shorttag
    *
    * @return string HTML code of the badge
    */
   public function blockquote($source, $sourceurl, $title, $content) {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Blockquote -->\n";
      $bsvTag = "<blockquote%class%%title%>%content%%cite%</blockquote>\n";
      $tagClass = "bsv-blockquote ";

      //
      // Source
      //
      if (strlen($source)) {
         if (strlen($sourceurl)) {
            $source = "<footer class=\"bsv-blockquote-footer\"><cite><a href=\"" . $sourceurl . "\" target=\"_blank\">" . $source . "</a></cite></footer>";
         } else {
            $source = "<footer class=\"bsv-blockquote-footer\"><cite>" . $source . "</cite></footer>";
         }
         $bsvTag = str_replace('%cite%', $source, $bsvTag);
      } else {
         $bsvTag = str_replace('%cite%', "", $bsvTag);
      }

      $bsvTag = str_replace('%class%', " class=\"" . $tagClass . "\"", $bsvTag);

      //
      // Title
      //
      if (strlen($title)) {
         $bsvTag = str_replace('%title%', " title=\"" . $title . "\"", $bsvTag);
      } else {
         $bsvTag = str_replace('%title%', "", $bsvTag);
      }

      //
      // Content
      //
      $bsvTag = str_replace('%content%', $content, $bsvTag);

      //
      // Return output
      //
      return $identifier . $bsvTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Button.
    *
    * Builds a Bootstrap button element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $style            Bootstrap style
    * @param string $size             Size of the button
    * @param string $link             Link of the button
    * @param string $target           Target of the button link: _blank/_self/_parent/_top
    * @param string $tooltip          Tooltip of the button
    * @param string $outline          Outline button or not: yes/no
    * @param string $customtextcolor  Overwrites Bootstrap style text color, e.g. #990000
    * @param string $custombgcolor    Overwrites Bootstrap style background color, e.g. #990000
    * @param string $content          Content of the badge
    *
    * @return string HTML code of the badge
    */
   public function button($style = 'primary', $size = 'default', $link = '', $target = '_self', $tooltip = '', $outline = 'no', $customtextcolor = '', $custombgcolor = '', $content = 'My Button') {
      //
      // Prepare the HTML frame for the Bootstrap alert box
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Button -->\n";
      $simpleTag = "<button class=\"bsv-btn bsv-btn-%style%%size%\" style=\"%customstyles%\">%content%</button>\n\n";
      $linkedTag = "<a class=\"bsv-btn bsv-btn-%style%%size%\" href=\"%link%\" target=\"%target%\" title=\"%tooltip%\" style=\"%customstyles%\">%content%</a>\n";
      $buttonTag = $simpleTag;
      $customstyles = '';

      //
      // Linked or not
      //      
      if (strlen($link)) {
         $buttonTag = $linkedTag;
         $buttonTag = str_replace("%link%", $link, $buttonTag);
         if (!strlen($target) || !in_array($target, $this->targets)) {
            $target = "_self";
         }
         $buttonTag = str_replace("%target%", $target, $buttonTag);
         if (strlen($tooltip)) {
            $buttonTag = str_replace("%tooltip%", $tooltip, $buttonTag);
         } else {
            $buttonTag = str_replace("%tooltip%", '', $buttonTag);
         }
      }

      //
      // Style
      //      
      if (!in_array(strtolower($style), $this->styles)) {
         $style = 'primary';
      }
      if (strtolower($outline) == "yes") {
         $style = 'outline-' . $style;
      }
      $buttonTag = str_replace("%style%", $style, $buttonTag);

      //
      // Size
      //      
      if (strtolower($size) == "xs") {
         $buttonTag = str_replace("%size%", ' bsv-btn-xs', $buttonTag);
      } else if (strtolower($size) == "sm") {
         $buttonTag = str_replace("%size%", ' bsv-btn-sm', $buttonTag);
      } else if (strtolower($size) == "lg") {
         $buttonTag = str_replace("%size%", ' bsv-btn-lg', $buttonTag);
      } else {
         $buttonTag = str_replace("%size%", '', $buttonTag);
      }

      //
      // Custom text color
      //
      if (strlen($customtextcolor) == 7 && strpos($customtextcolor, '#') == 0) {
         $customstyles .= "color:" . $customtextcolor . " !important;";
      }

      //
      // Custom background color
      //
      if (strlen($custombgcolor) == 7 && strpos($custombgcolor, '#') == 0) {
         $customstyles .= "background-color:" . $custombgcolor . " !important;";
      }

      //
      // Build core badge tag
      //
      $buttonTag = str_replace("%customstyles%", $customstyles, $buttonTag);
      $buttonTag = str_replace("%content%", $content, $buttonTag);

      //
      // Return output
      //
      return $identifier . $buttonTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Button Group.
    *
    * Builds a Bootstrap button group
    *
    * @since 1.5.0
    *
    * @param   string  $content          Content of the button group
    *
    * @return  string  HTML code of the badge
    */
   public function buttongroup($styles, $content) {
      //
      // Prepare the HTML frame for the Bootstrap alert box
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Button Group -->\n";
      $bsvTag = "<div class=\"bsv-btn-group bsv-mr-2 bsv-mb-2\" role=\"group\"%CSS%>%content%</div>\n\n";

      //
      // Styles
      //
      if (strlen($styles)) {

         $css = " style=\"" . $styles . ";\"";
         $bsvTag = str_replace('%CSS%', $css, $bsvTag);
      } else {

         $bsvTag = str_replace('%CSS%', "", $bsvTag);
      }

      //
      // Insert content
      //
      $bsvTag = str_replace("%content%", $content, $bsvTag);

      //
      // Return output
      //
      return $identifier . $bsvTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Callout.
    *
    * Builds a Bootstrap callout element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $style            Bootstrap style
    * @param string $heading          Heading of the callout
    * @param string $headinglevel     HTML heading level of the heading
    * @param string $content          Content of the callout
    *
    * @return string HTML code of the badge
    */
   public function callout($style = 'primary', $heading = '', $headinglevel = '', $content = 'My Callout', $outline = "no") {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Callout -->\n";
      $bsvTag = "<div class=\"bsv-callout bsv-callout-%style%\">%heading%%content%</div>\n\n";

      //
      // S2tyle
      //      
      if (!in_array(strtolower($style), $this->calloutStyles)) {
         $style = 'primary';
      }

      if (strtolower($outline) == "yes") {
         $style = 'outline-' . $style;
      }

      $bsvTag = str_replace("%style%", $style, $bsvTag);

      //
      // Heading
      //
      if (strlen($heading)) {
         // if (in_array(strtolower($headinglevel), $this->headingLevels)) {
         //    $headingTagStart = "<".strtolower($headinglevel).">";
         //    $headingTagEnd = "</".strtolower($headinglevel).">";
         // }
         // else {
         //    $headingTagStart = "<h4>";
         //    $headingTagEnd = "</h4>";
         // }
         $headingTagStart = "<div class=\"bsv-mt-0 bsv-mb-1 bsv-text-" . $style . "\" style=\"font-size:120%; font-weight:normal;\">";
         $headingTagEnd = "</div>";
         $headingTag = $headingTagStart . $heading . $headingTagEnd;
      } else {
         $headingTag = '';
      }
      $bsvTag = str_replace('%heading%', $headingTag, $bsvTag);
      $bsvTag = str_replace('%content%', $content, $bsvTag);

      //
      // Return output
      //
      return $identifier . $bsvTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Card.
    *
    * Builds a Bootstrap card element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $style            Bootstrap style
    * @param string $heading          Heading of the callout
    * @param string $headinglevel     HTML heading level of the heading
    * @param string $content          Content of the callout
    *
    * @return string HTML code of the badge
    */
   public function card($style, $heading = '', $headinglevel = '', $title = '', $titlelevel = '', $subtitle = '', $subtitlelevel = '', $width, $floatleft, $outline, $img, $footer, $content) {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Card -->\n";
      $startTag = "<div class=\"bsv-card bsv-mb-3";
      $blockTag = "   <div class=\"bsv-card-block\">\n";
      $endTag = "   </div>\n";
      $finalTag = "</div>\n\n";
      $footerTag = "";
      $imgTag = "";
      $text = "";
      $output = "";
      $hx = "";

      //
      // Style
      //      
      if (in_array(strtolower($style), $this->cardStyles)) {
         $style = " bsv-card-inverse bsv-card-" . $style;
      } else {
         $style = " default";
      }

      //
      // Float left
      //      
      if (strtolower($floatleft) == "yes") {
         $style = $style . " float-left bsv-mr-3 bsv-mb-3";
      }

      $style = $style . "\"";

      //
      // Outline
      //      
      if (strtolower($outline) == "yes") {
         $style = str_replace(" bsv-card-inverse bsv-card-", " bsv-card-outline-", $style);
      }

      $startTag = $startTag . $style;

      //
      // Width
      // 
      if (strpos($width, 'px') || strpos($width, '%')) {
         $width = " style=\"width:" . $width . ";\"";
      } else {
         $width = " style=\"width:99.6%;\"";
      }

      $startTag = $startTag . $width . ">\n";

      //
      // Header
      //      
      if (strlen($heading)) {
         if (!in_array(strtolower($headinglevel), $this->headingLevels)) {
            $headinglevel = "h4";
         }
         $startTag = $startTag . "   <" . $headinglevel . " class=\"bsv-card-header\">" . $heading . "</" . $headinglevel . ">\n";
      }

      //
      // Title
      //      
      if (strlen($title)) {
         if (!in_array(strtolower($titlelevel), $this->headingLevels)) {
            $titlelevel = "h4";
         }
         $text = $text . "      <" . $titlelevel . " class=\"bsv-card-title\">" . $title . "</" . $titlelevel . ">\n";
      }

      //
      // Subtitle
      //      
      if (strlen($subtitle)) {
         if (!in_array(strtolower($subtitlelevel), $this->headingLevels)) {
            $subtitlelevel = "h5";
         }
         $text = $text . "      <" . $subtitlelevel . " class=\"bsv-card-subtitle mb-2\">" . $subtitle . "</" . $subtitlelevel . ">\n";
      }

      //
      // Image
      //      
      if (strlen($img)) {
         $imgTag = "   <img class=\"bsv-card-img-top\" src=\"" . $img . "\" alt=\"Card image\" style=\"width:100%;\"/>\n";
      }

      $text = $text . "      <p class=\"bsv-card-text\">" . $content . "</p>\n";

      //
      // Footer
      //      
      if (strlen($footer)) {
         $footerTag = "   <div class=\"bsv-card-footer\">" . $footer . "</div>\n";
      }

      //
      // Return output
      //
      return $identifier . $startTag . $imgTag . $blockTag . $text . $endTag . $footerTag . $finalTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Jumbotron.
    *
    * Builds a Bootstrap jumbotron element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $heading          Heading of the callout
    * @param string $headingsize      Size of the heading, 1-4
    * @param string $lead             Lead text
    * @param string $content          Content of the callout
    *
    * @return string HTML code of the badge
    */
   public function jumbotron($heading, $headingsize, $lead, $content) {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Jumbotron -->\n";
      $bsvTag = "<div class=\"bsv-jumbotron\">\n
         <h1 class=\"bsv-display-%size%\">%heading%</h1>\n
         %lead%\n
         %sep%\n
         %content%\n
      </div>\n\n";
      $leadTag = "<p class=\"bsv-lead\">%lead%</p>";
      $sepTag = "<hr class=\"bsv-my-4\">";
      $contentTag = "<p>%content%</p>";
      $headingSizes = array('1', '2', '3', '4');

      //
      // Heading
      //
      if (strlen($heading)) {
         $bsvTag = str_replace('%heading%', $heading, $bsvTag);
      }

      //
      // Size
      //
      if (strlen($headingsize) && in_array($headingsize, $headingSizes)) {
         $bsvTag = str_replace('%size%', $headingsize, $bsvTag);
      } else {
         $bsvTag = str_replace('%size%', '4', $bsvTag);
      }

      //
      // Lead
      //
      if (strlen($lead)) {
         $leadTag = str_replace('%lead%', $lead, $leadTag);
         $bsvTag = str_replace('%lead%', $leadTag, $bsvTag);
      } else {
         $bsvTag = str_replace('%lead%', '', $bsvTag);
      }

      //
      // Content
      //
      if (strlen($content)) {
         $contentTag = str_replace('%content%', $content, $contentTag);
         $bsvTag = str_replace('%sep%', $sepTag, $bsvTag);
         $bsvTag = str_replace('%content%', $contentTag, $bsvTag);
      }

      //
      // Return output
      //
      return $identifier . $bsvTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Panel.
    *
    * Builds a Bootstrap panel element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $textstyle     Text color style
    * @param string $bgstyle       Background color style
    * @param string $bordertop     Border on top: yes/no
    * @param string $borderright   Border on right: yes/no
    * @param string $borderbottom  Border on bottom: yes/no
    * @param string $borderleft    Border on left: yes/no
    * @param string $borderstyle   Border color style
    * @param string $borderradius  Border radius style
    * @param string $id            Object id
    * @param string $classes       Addl. style classes
    * @param string $styles        Addl. styles
    * @param string $content       Content of the callout
    *
    * @return string HTML code of the badge
    */
   public function panel($textstyle, $bgstyle, $bordertop, $borderright, $borderbottom, $borderleft, $borderstyle, $borderradius, $id, $classes, $styles, $content) {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Panel -->\n";
      $bsvTag = "<div %id% class=\"%textStyle% %bgStyle% %borderTop% %borderRight% %borderBottom% %borderLeft% %borderStyle% %borderRadius% %classes%\"%CSS%>%content%</div>\n";

      //
      // ID
      //
      if (strlen($id)) {
         $bsvTag = str_replace('%id%', "id=\"" . $id . "\"", $bsvTag);
      } else {
         $bsvTag = str_replace('%id%', "", $bsvTag);
      }

      //
      // Text style
      //
      if (strlen($textstyle) && in_array($textstyle, $this->styles)) {
         $bsvTag = str_replace('%textStyle%', "bsv-text-" . $textstyle, $bsvTag);
      } else {
         $bsvTag = str_replace('%textStyle%', "", $bsvTag);
      }

      //
      // Background style
      //
      if (strlen($bgstyle) && in_array($bgstyle, $this->styles)) {
         $bsvTag = str_replace('%bgStyle%', "bsv-bg-" . $bgstyle, $bsvTag);
      } else {
         $bsvTag = str_replace('%bgStyle%', "", $bsvTag);
      }

      //
      // Border top
      //
      if (strlen($bordertop) && strtolower($bordertop) == 'yes') {
         $bsvTag = str_replace('%borderTop%', "bsv-border-top", $bsvTag);
      } else {
         $bsvTag = str_replace('%borderTop%', "", $bsvTag);
      }

      //
      // Border right
      //
      if (strlen($borderright) && strtolower($borderright) == 'yes') {
         $bsvTag = str_replace('%borderRight%', "bsv-border-right", $bsvTag);
      } else {
         $bsvTag = str_replace('%borderRight%', "", $bsvTag);
      }

      //
      // Border bottom
      //
      if (strlen($borderbottom) && strtolower($borderbottom) == 'yes') {
         $bsvTag = str_replace('%borderBottom%', "bsv-border-bottom", $bsvTag);
      } else {
         $bsvTag = str_replace('%borderBottom%', "", $bsvTag);
      }

      //
      // Border left
      //
      if (strlen($borderleft) && strtolower($borderleft) == 'yes') {
         $bsvTag = str_replace('%borderLeft%', "bsv-border-left", $bsvTag);
      } else {
         $bsvTag = str_replace('%borderLeft%', "", $bsvTag);
      }

      //
      // Border style
      //
      if (strlen($borderstyle) && in_array($borderstyle, $this->styles)) {
         $bsvTag = str_replace('%borderStyle%', "bsv-border-" . $borderstyle, $bsvTag);
      } else {
         $bsvTag = str_replace('%borderStyle%', "", $bsvTag);
      }

      //
      // Border radius
      //
      if (strlen($borderradius) && in_array($borderradius, $this->borderRadiuses)) {
         $bsvTag = str_replace('%borderRadius%', "bsv-" . $borderradius, $bsvTag);
      } else {
         $bsvTag = str_replace('%borderRadius%', "", $bsvTag);
      }

      //
      // Classes
      //
      if (strlen($classes)) {
         $bsvTag = str_replace('%classes%', $classes, $bsvTag);
      } else {
         $bsvTag = str_replace('%classes%', "", $bsvTag);
      }

      //
      // Styles
      //
      if (strlen($styles)) {
         $css = " style=\"" . $styles . ";\"";
         $bsvTag = str_replace('%CSS%', $css, $bsvTag);
      } else {
         $bsvTag = str_replace('%CSS%', "", $bsvTag);
      }

      //
      // Content
      //
      if (strlen($content)) {
         $bsvTag = str_replace('%content%', $content, $bsvTag);
      } else {
         $bsvTag = str_replace('%content%', "", $bsvTag);
      }

      //
      // Return output
      //
      return $identifier . $bsvTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Progress Bar.
    *
    * Builds a Bootstrap progressbar element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $animated  Animated progress bar: yes/no
    * @param string $animated  Element ID
    * @param string $progress  Progress in percent
    * @param string $striped   Striped progress bar: yes/no
    * @param string $style     Style of the progress bar
    * @param string $width     Custom width of the progrees bar
    *
    * @return string HTML code of the badge
    */
   public function progress($animated, $id, $progress, $striped, $style, $width) {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Progress Bar -->\n";
      $bsvTag = "<div class=\"bsv-progress\" style=\"width:%width%;\"><div %id% role=\"progressbar\" class=\"bsv-progress-bar bsv-bg-%style%%animated%%striped%\" style=\"width:%progress%;\"></div></div>\n";

      //
      // ID
      //
      if (strlen($id)) {
         $bsvTag = str_replace('%id%', "id=\"" . $id . "\"", $bsvTag);
      } else {
         $bsvTag = str_replace('%id%', "", $bsvTag);
      }

      //
      // Animated
      //
      if (strlen($animated) && strtolower($animated) == 'yes') {
         $bsvTag = str_replace('%animated%', " bsv-progress-bar-animated", $bsvTag);
      } else {
         $bsvTag = str_replace('%animated%', "", $bsvTag);
      }

      //
      // Progress
      //
      if (strlen($progress) && is_numeric($progress) && intval($progress) <= 100) {
         $bsvTag = str_replace('%progress%', $progress . '%', $bsvTag);
      } else {
         $bsvTag = str_replace('%textStyle%', "", $bsvTag);
      }

      //
      // Striped
      //
      if (strlen($striped) && strtolower($striped) == 'yes') {
         $bsvTag = str_replace('%striped%', " bsv-progress-bar-striped", $bsvTag);
      } else {
         $bsvTag = str_replace('%striped%', "", $bsvTag);
      }

      //
      // Style
      //
      if (strlen($style) && in_array($style, $this->styles)) {
         $bsvTag = str_replace('%style%', $style, $bsvTag);
      } else {
         $bsvTag = str_replace('%style%', 'primary', $bsvTag);
      }

      //
      // Width
      //
      if (strlen($width)) {
         $bsvTag = str_replace('%width%', $width, $bsvTag);
      } else {
         $bsvTag = str_replace('%width%', "100%", $bsvTag);
      }

      //
      // Return output
      //
      return $identifier . $bsvTag;
   }

   // -------------------------------------------------------------------------
   /**
    * Spinner.
    *
    * Builds a Bootstrap spinner element based on the given parameters
    *
    * @since 1.0.0
    *
    * @param string $button      Display in a button: yes/no
    * @param string $buttontext  Button text
    * @param string $shape       Shape of the spinner
    * @param string $size        Size of the spinner
    * @param string $style       Style of the progress bar
    *
    * @return string HTML code of the badge
    */
   public function spinner($button, $buttontext, $shape, $size, $style) {
      //
      // Prepare the HTML frame
      //
      $identifier = "\n\n<!-- Shortcode Bootstrap Visuals Spinner -->\n";
      $bsvTag = "<div role=\"status\" class=\"bsv-spinner-%shape% bsv-text-%style% %size%\"><span class=\"bsv-sr-only\">Busy...</span></div>\n";
      $btnTag = "<button class=\"bsv-btn bsv-btn-%style%\" type=\"button\" disabled>%btnInner%</button>";
      $btnSpinnerTagNoText = "<span role=\"status\" class=\"bsv-spinner-%shape% bsv-spinner-%shape%-sm\" aria-hidden=\"true\"></span><span class=\"bsv-sr-only\">Busy...</span>\n";
      $btnSpinnerTagText = "<span role=\"status\" class=\"bsv-spinner-%shape% bsv-spinner-%shape%-sm\" aria-hidden=\"true\" style=\"margin-right:8px;\"></span>%btnText%\n";

      //
      // Shape
      //      
      if (strlen($shape) && in_array($shape, $this->spinnerShapes)) {
         $bsvTag = str_replace('%shape%', $shape, $bsvTag);
         $btnSpinnerTagNoText = str_replace('%shape%', $shape, $btnSpinnerTagNoText);
         $btnSpinnerTagText = str_replace('%shape%', $shape, $btnSpinnerTagText);
      } else {
         $shape = 'border';
         $bsvTag = str_replace('%shape%', $shape, $bsvTag);
         $btnSpinnerTagNoText = str_replace('%shape%', $shape, $btnSpinnerTagNoText);
         $btnSpinnerTagText = str_replace('%shape%', $shape, $btnSpinnerTagText);
      }

      //
      // Style
      //
      if (strlen($style) && in_array($style, $this->styles)) {
         $bsvTag = str_replace('%style%', $style, $bsvTag);
         $btnTag = str_replace('%style%', $style, $btnTag);
      } else {
         $bsvTag = str_replace('%style%', 'primary', $bsvTag);
         $btnTag = str_replace('%style%', 'primary', $btnTag);
      }

      //
      // Size
      //      
      if (strlen($size) && strtolower($size) == 'small') {
         $bsvTag = str_replace('%size%', "bsv-spinner-" . $shape . "-sm", $bsvTag);
      } else if (strlen($size) && strtolower($size) == 'medium') {
         $bsvTag = str_replace('%size%', "bsv-spinner-" . $shape . "-md", $bsvTag);
      } else if (strlen($size) && strtolower($size) == 'large') {
         $bsvTag = str_replace('%size%', "bsv-spinner-" . $shape . "-lg", $bsvTag);
      }

      //
      // Button
      //      
      if (strlen($button) && strtolower($button) == 'yes') {
         if (strlen($buttontext)) {
            $btnSpinnerTagText = str_replace('%btnText%', $buttontext, $btnSpinnerTagText);
            $bsvTag = $btnSpinnerTagText;
         } else {
            $bsvTag = $btnSpinnerTagNoText;
         }
         $btnTag = str_replace('%btnInner%', $bsvTag, $btnTag);
         $bsvTag = $btnTag;
      }

      //
      // Return output
      //
      return $identifier . $bsvTag;
   }
}
