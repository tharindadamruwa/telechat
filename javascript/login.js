$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();
    });

    $("#login").click(function () {
        document.querySelector(".loading").style.display = "flex";
        $(".loading").animate({ scrollTop: $(".loading").offset().top }, "slow");
        let formData = new FormData($("form")[0]);

        $.ajax({
            url: "php/login.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "success") {
                    location.href = "users.php";
                } else {
                    document.querySelector(".loading").style.display = "none";
                    $(".error-txt").text(data);
                    $(".error-txt").css("display", "flex");
                    document.querySelector(".wrapper").scrollIntoView({

                        behavior: "smooth"

                    });
                }
            }
        });
    });
});
