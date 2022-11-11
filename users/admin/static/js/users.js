async function addUser() {
    // Validation
    let usertype = document.getElementById("usertype");
    let email = document.getElementById("email");

    let flag = true;
    if (usertype.value == "") {
        usertype.classList.add("border-danger");
        flag = false;
    }
    if (email.value == "") {
        email.classList.add("border-danger");
        flag = false;
    }
    if (!flag) {
        return false;
    }

    // Integrate the api here



}

function removerBorderDanger(id) {
    this.classList.remove("border-danger");
}


async function viewAllUser() {

    var settings = {
        "url": "http://localhost/api/v1/users/viewallusers.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
    });
}


viewAllUser();
