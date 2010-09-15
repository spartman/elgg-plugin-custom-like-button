<?php
/**
 * Like_comment plugin ajax
 *
 * @package Like_Comment Plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Evobilis <info@evobilis.com>
 * @link http://evobilis.com/
 */


require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/engine/start.php');

$annotation_guid = (int) get_input('annotation_guid');
$loginuser = get_loggedin_user();

if ($user = get_loggedin_user()) {
    $result = get_like_comment_string($annotation_guid);


    header("Content-Type: application/json; charset=UTF-8");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    echo json_encode($result);
}
exit();
?>