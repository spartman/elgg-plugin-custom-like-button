<?php
/**
 * Like_comment plugin javascript
 *
 * @package Like_Comment Plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Evobilis <info@evobilis.com>
 * @link http://evobilis.com/
 */
?>
function initDisplayLike(annoid, data){
    if(typeof(data.listusername) != "undefined" && data.listusername.length >0){
        $("#like" + annoid + " span").html(data.listusername);
        $("#like" + annoid + "").removeClass("hide");
    } else
        $("#like" + annoid + "").addClass("hide");

    if(typeof(data.unlikeid) != "undefined" && data.unlikeid > 0){
        $("#unlikebutton"+annoid).removeClass("hide");
        $("#likebutton"+annoid).addClass("hide");
        $("#unlikebutton"+annoid).attr('rel',data.unlikeid);
    }  else {
        $("#likebutton"+annoid).removeClass("hide");
        $("#unlikebutton"+annoid).addClass("hide");
    }
}

$(document).ready(function(){
    $(".unlikebutton").each(function (){
        $( this ).click(function () {
            var erel = $( this ).attr("rel");
            var eid = $( this ).attr("id");
            eid = eid.substring(12,eid.length);
            $.getJSON("<?php echo $CONFIG->wwwroot . "/mod/like_comment/ajax/unlike.php?like_rate_guid="; ?>"+erel, function(data1){
                initDisplayLike(eid, data1);
            });
            return false;
        });
    });

    $(".likebutton").each(function (){
        $( this ).click(function () {
            var eid = $( this ).attr("id");
            eid = eid.substring(10,eid.length);
            $.getJSON("<?php echo $CONFIG->wwwroot . "/mod/like_comment/ajax/like.php?annotation_guid="; ?>"+eid, function(data2){
                 initDisplayLike(eid, data2);
            });
            return false;
        });
    });
});



