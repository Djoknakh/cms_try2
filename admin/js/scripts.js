// $(document).ready(function() {
//     $('#summernote').summernote({
//         height: 200
//     });
// });
document.addEventListener("DOMContentLoaded", function (event) {
    //do work
    document.getElementById('selectAllBoxes').addEventListener('click',checkAll);
    function checkAll(obj) {
        obj = obj.target;
        'use strict';
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