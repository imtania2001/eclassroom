$("#login_form").submit(async function (e) {
    e.preventDefault();
    let email_id = document.getElementById("email_id").value;
    let password = document.getElementById("password").value;

    $.ajax({
        "url": "http://localhost/eclassroom/api/v1/users/login.php",
        "method": "POST",
        "data": {
            email_id: email_id,
            password: password,
        }
    }).done(function (data) {
        if (data.status_code == 1200) {
            let arr = data.data;
            if (arr.login) {
                if (arr.role == "student") {
                    alert(arr.message);
                    window.location = "users/student/";
                    sessionStorage.setItem("user", arr.user);
                } else if (arr.role == "teacher") {
                    alert(arr.message);
                    window.location = "users/teacher/";
                    sessionStorage.setItem("user", arr.user);
                } else if (arr.role == "admin") {
                    alert(arr.message);
                    window.location = "users/admin/";
                    sessionStorage.setItem("user", arr.user);
                } else {
                    alert("An Error Occured");
                    window.location.reload();
                }
            } else {
                alert(arr.message);
            }
        } else {
            alert(data.message);
        }
    });

});