function (){
    var input    = $("Girl_g_photo");
    var formdata = false;

    if (window.FormData) {
        formdata = new FormData();
        document.getElementById("btn").style.display = "none";
    }
    console.log(input);
}

$(document).ready();
//(function () {
//    var input = document.getElementById("Girl_g_photo"),
//        formdata = false;
//
//    function showUploadedItem (source) {
//        var list = document.getElementById("image-list"),
//            li   = document.createElement("li"),
//            img  = document.createElement("img");
//        img.src = source;
//        li.appendChild(img);
//        list.appendChild(li);
//    }
//
//    if (window.FormData) {
//        formdata = new FormData();
//        document.getElementById("btn").style.display = "none";
//    }
//
//    input.addEventListener("change", function (evt) {
//        document.getElementById("response").innerHTML = "Uploading . . ."
//        var i = 0, len = this.files.length, img, reader, file;
//
//        for ( ; i < len; i++ ) {
//            file = this.files[i];
//
//            if (!!file.type.match(/image.*/)) {
//                if ( window.FileReader ) {
//                    reader = new FileReader();
//
//                    reader.readAsDataURL(file);
//                }
//                if (formdata) {
//                    formdata.append("Girl['g_photo'][]", file);
//                }
//            }
//        }
//        console.debug(formdata);
//
//        if (formdata) {
//            $.ajax({
//                url: "http://escort/girls/edit/id/2",
//                type: "POST",
//                data: formdata,
//                processData: false,
//                contentType: false,
//                success: function (response) {
////                    document.getElementById("response").innerHTML = res;
//                    $('#main').replaceWith(response);
//                }
//            });
//        }
//    }, false);
//}());
