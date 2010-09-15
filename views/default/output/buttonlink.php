<?php
/**
 * Like_comment plugin 
 *
 * @package Like_Comment Plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Evobilis <info@evobilis.com>
 * @link http://evobilis.com/
 */



// always generate missing action tokens
$link = $vars['href'];

if (isset($vars['class']) && $vars['class']) {
	$class = 'class="' . $vars['class'] . '"';
} else {
	$class = 'class="buttonlink"';
}

if (isset($vars['id']) && $vars['id']) {
	$htmlid = 'id="' . $vars['id'] . '"';
}

?>
<a href="<?php echo $link; ?>" <?php echo $htmlid; ?> <?php echo $class; ?>><?php echo htmlentities($vars['text'], ENT_QUOTES, 'UTF-8'); ?></a>