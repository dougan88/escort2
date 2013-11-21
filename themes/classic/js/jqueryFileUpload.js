function test(){
    var input    = $("Girl_g_photo");
    var formdata = false;

    if (window.FormData) {
        formdata = new FormData();
        document.getElementById("btn").style.display = "none";
    }
    console.log(input);
}

$(document).ready();