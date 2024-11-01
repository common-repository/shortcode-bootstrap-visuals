/**
 * Shortcode Bootstrap Visuals Javascript
 *
 * Custom Javascript functions for the Bootstrap Visuals plugin.
 *
 * @author George Lewe
 * @link https://www.lewe.com
 *
 * @package Shortcode Bootstrap Visuals
 * @subpackage Scripts
 * @since 1.0.0
 */

/**
 * Hides an HTML parent element via CSS.
 *
 * This function hides the parent element of the given one by settingg its
 * display style property to 'none'.
 *
 * @since 1.0.0
 *
 * @param object $el HTML object.
 */
function dismissParent(el)
{
   el.parentNode.style.display='none';
};