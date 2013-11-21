(function () {
    var input = document.getElementById("Photo_photo"),
        formdata = false;

    if (window.FormData) {
        formdata = new FormData();
        document.getElementById("btn").style.display = "none";
    }

    input.addEventListener("change", function (evt) {
        document.getElementById("response").innerHTML = "Uploading . . ."
        var i = 0, len = this.files.length, img, reader, file;

        for ( ; i < len; i++ ) {
            file = this.files[i];

            if (!!file.type.match(/image.*/)) {
                if ( window.FileReader ) {
                    reader = new FileReader();
                    reader.onloadend = function (e) {
                    };
                    reader.readAsDataURL(file);
                }
                if (formdata) {
                    formdata.append("Photo[photo][]", file);
                }
            }
        }

        if (formdata) {
            $.ajax({
                url: "http://escort/girls/savePhoto/id/2/type/girl",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (response) {
                    document.getElementById("main").innerHTML = response;
                }
            });
        }
    }, false);
}());
