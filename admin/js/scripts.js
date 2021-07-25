// $(document).ready(function() {
//     $('#summernote').summernote({
//         height: 200
//     });
// });
'use strict';

document.addEventListener("DOMContentLoaded", function (event) {
    //do work
    document.getElementById('selectAllBoxes').addEventListener('click',checkAll);
    function checkAll(obj) {
        obj = obj.target;
        var items = obj.form.getElementsByTagName('input'),
            len, i;
        for (i = 0, len = items.length; i < len; i += 1) {
            if (items.item(i).type && items.item(i).type === "checkbox") {
                if (obj.checked) {
                    items.item(i).checked = true;
                } else {
                    items.item(i).checked = false;
                }
            }
        }
     }

});

$(document).ready(function (){
    var div_box = "<div id = 'load-screen'> <div id='loading'></div></div>";
    $("body").prepend(div_box);
    $('#load-screen').delay(700).fadeOut(600, function () {
    $(this).remove();
    });

});

function loadUsersOnline () {
    $.get("functions.php?onlineusers=result", function (data) {
        $(".usersonline").text(data);
    });
}

setInterval(function (){
    loadUsersOnline();
},500);

