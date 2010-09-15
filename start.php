<?php
/**
 * Like_comment plugin
 *
 * @package Like_Comment Plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Evobilis <info@evobilis.com>
 * @link http://evobilis.com/
 */

function like_comment_init() {

    // Get config
    global $CONFIG;

    // Extend system CSS with our own styles, which are defined in the feeds/css view
    elgg_extend_view('css', 'like_comment/css');
    elgg_extend_view('js/initialise_elgg', 'like_comment/js');
}

function get_like_comment_string($annotation_guid) {
    $results["unlikeid"] = "";
    $results["listusername"] = "";
    $loginuser = get_loggedin_user();
    if (!empty($annotation_guid)) {
        $like_object = get_likerating_byannotation($annotation_guid);
        if ($like_object && !empty($like_object)) {
            foreach ($like_object as $like) {
                if ($like->owner_guid == $loginuser->guid) {
                    $results["listusername"] = add_and_between_name($results["listusername"], "you");
                    $results["unlikeid"] = $like->guid;
                } else {
                    $user_entity = get_entity($like->owner_guid);
                    $results["listusername"] = add_and_between_name($results["listusername"], $user_entity->name);
                }
            }
        }
        if(!empty($results["listusername"])) $results["listusername"] .= " ".elgg_echo ("like:likethis");
    }
    return $results;
}

function add_and_between_name($msg, $name) {
    if (empty($msg))
        $msg = $name;
    else
        $msg = $msg . " and " . $name;
    return $msg;
}

function get_likerating_byannotation($annotation_guid, $limit = 50) {

    $subtypeArray = array('like_rate');

    $options = array(
        'metadata_name' => "annotation_guid",
        'metadata_value' => $annotation_guid,
        'type' => 'object',
        'subtypes' => $subtypeArray,
        'limit' => $limit,
        'offset' => $offset,
    );

    $list_object = elgg_get_entities_from_metadata($options);

    return $list_object;
}

register_elgg_event_handler('init', 'system', 'like_comment_init');

?>