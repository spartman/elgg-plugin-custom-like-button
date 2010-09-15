<?php
/**
 * Like_comment plugin language pack
 *
 * @package Like_Comment Plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Evobilis <info@evobilis.com>
 * @link http://evobilis.com/
 */

$owner = get_user($vars['annotation']->owner_guid);
$loginuser = get_loggedin_user();

$result = get_like_comment_string($vars['annotation']->id);
?>
<div id="com<?php echo $vars['annotation']->id; ?>" class="generic_comment"><!-- start of generic_comment div -->

    <div class="generic_comment_icon">
<?php
echo elgg_view("profile/icon",
        array(
            'entity' => $owner,
            'size' => 'small'
        )
);
?>
    </div>

    <div class="generic_comment_details">

        <!-- output the actual comment -->
<?php echo elgg_view("output/longtext", array("value" => $vars['annotation']->value)); ?>

        <p class="generic_comment_owner">
            <a href="<?php echo $owner->getURL(); ?>"><?php echo $owner->name; ?></a> <?php echo elgg_view_friendly_time($vars['annotation']->time_created); ?>
            - <?php
echo "" . elgg_view("output/buttonlink", array(
    'href' => "#",
    'text' => elgg_echo('like'),
    'id' => "likebutton" . $vars['annotation']->id,
    'class' => "likebutton hide",
)) . "";
?>

<?php
echo "" . elgg_view("output/buttonlink", array(
    'href' => "#",
    'text' => elgg_echo('unlike'),
    'id' => "unlikebutton" . $vars['annotation']->id,
    'class' => "unlikebutton hide",
)) . "";
?>
        </p>

<?php
// if the user looking at the comment can edit, show the delete link
if ($vars['annotation']->canEdit()) {
?>
        <p>
<?php
    echo elgg_view("output/confirmlink", array(
        'href' => $vars['url'] . "action/comments/delete?annotation_id=" . $vars['annotation']->id,
        'text' => elgg_echo('delete'),
        'confirm' => elgg_echo('deleteconfirm'),
    ));
?>
        </p>

<?php
} //end of can edit if statement
?>

        <div id="like<?php echo $vars['annotation']->id ?>" class="like_display hide">
            <i></i>
            <div><img src="<?php echo $vars['url']; ?>mod/like_comment/graphics/like.png" />
                <span><?php echo $listeusername . " like this"; ?></span>
            </div>
        </div>
        
    </div><!-- end of generic_comment_details -->
</div><!-- end of generic_comment div -->

<script>
    $.getJSON("<?php echo $CONFIG->wwwroot . "/mod/like_comment/ajax/get_usernamelist.php?annotation_guid=" . $vars['annotation']->id; ?>", function(data){
        initDisplayLike(<?php echo $vars['annotation']->id ?>, data);
    });
</script>