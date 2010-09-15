<?php
/**
 * Like_comment CSS
 *
 * @package Like_Comment Plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Evobilis <info@evobilis.com>
 * @link http://evobilis.com/
 */
?>

.like_display {
    padding: 0px;
}

.like_display i {
    background: url(<?php echo $vars['url']; ?>mod/like_comment/graphics/pyramid.png) no-repeat 0 0;
    display:block;
    height:5px;
    margin-left:17px;
    width:9px;
}

.like_display div{
    background: #eaeaea;
    padding: 5px;
}

a.unlikebutton:link,a.likebutton:link,a.buttonlink:link {
    -moz-border-radius:4px 4px 4px 4px;
    background:none repeat scroll 0 0 #4690D6;
    border:1px solid #4690D6;
    padding: 1px 3px;
    color: white;
    font-size: 11px;
}

.generic_comment_owner {
    padding-top:5px;
}

.hide {
    display:none;
}