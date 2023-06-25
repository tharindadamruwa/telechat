setInterval(() => {
    $.ajax({
        url: "php/users.php",
        type: "GET",
        success: function (data) {
            if (!document.querySelector("#searchBar").classList.contains("active")) {
                document.querySelector(".user-list").innerHTML = data;
            }
        },
        error: function (xhr, status, error) {
            // Code to handle error
        }
    });
}, 500);

document.querySelector("#searchBar").onkeyup = () => {
    let searchTerm = document.querySelector("#searchBar").value;
    if (!searchTerm == "") {
        document.querySelector("#searchBar").classList.add("active");
        $.ajax({
            url: "php/search.php",
            type: "POST",
            data: {
                searchTerm: searchTerm
            },
            success: function (data) {
                document.querySelector(".user-list").innerHTML = data;
            },
            error: function (xhr, status, error) {
                // Code to handle error
            }
        });
    } else {

        document.querySelector("#searchBar").classList.remove("active");

    }

}