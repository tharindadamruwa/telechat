$(document).ready(function () {
    const body = $("body");
    const form = $("form");
    const inputField = $("#input");
    const sendBtn = $(".button");

    form.submit(function (e) {
        e.preventDefault();
    });

    //  || 
    sendBtn.click(function () {
        $.ajax({
            url: "php/insert-chat.php",
            type: "POST",
            data: new FormData(form[0]),
            processData: false,
            contentType: false,
            success: function (data) {
                inputField.val('');
            },
            error: function (xhr, status, error) {
                // Code to handle error
            }
        });

    });
    setInterval(() => {
        $.ajax({
            url: "php/get-chat.php",
            type: "POST",
            data: new FormData(form[0]),
            processData: false,
            contentType: false,
            success: function (data) {
                $(".chat-box").html(data);
                var lastElementVisible = isLastElementVisible();
                // console.log('Last element visible:', lastElementVisible);
                if (!$(".chat-box").hasClass("active")) {
                    scroll();
                } else {
                    if (lastElementVisible) {
                        chatBox.classList.remove("active");
                    }
                }

            },
            error: function (xhr, status, error) {
                // Code to handle error
            }
        });

    }, 500);

});
var chatBox = document.querySelector(".chat-box");
var prevScrollPos = chatBox.scrollTop;

chatBox.addEventListener('scroll', function () {
    var currentScrollPos = chatBox.scrollTop;

    if (currentScrollPos > prevScrollPos) {
        // console.log('Scrolled down');
    } else {
        // console.log('Scrolled up');
        chatBox.classList.add("active");
    }

    prevScrollPos = currentScrollPos;
});

function scroll() {
    chatBox.scrollTop = chatBox.scrollHeight;
}

function isLastElementVisible() {
    var containerHeight = chatBox.scrollHeight;
    var visibleHeight = chatBox.clientHeight;
    var scrollPosition = chatBox.scrollTop;

    return (scrollPosition + visibleHeight) >= containerHeight;
}
