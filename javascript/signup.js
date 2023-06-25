$(document).ready(function () {
    var load = document.querySelector(".loading");
    $("form").submit(function (e) {
        e.preventDefault();
    });

    $("#signup").click(function () {

        load.style.display = "flex";
        $('html, body').animate({
            scrollTop: $(load).offset().top
        }, 1000);
        let formData = new FormData($("form")[0]);

        $.ajax({
            url: "php/signup.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "success") {
                    location.href = "users.php";
                } else {
                    $(".error-txt").text(data);
                    $(".error-txt").css("display", "flex");
                    load.style.display = "none";
                    document.querySelector(".wrapper").scrollIntoView({
                        behavior: "smooth"
                    });
                }
            }
        });
    });
});
