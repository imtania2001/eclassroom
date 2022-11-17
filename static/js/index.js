// Login API Integration
$("#login_form").submit(async function (e) {

    e.preventDefault();
    // alert("Hello");
    let email_id = document.getElementById("email_id").value;
    let password = document.getElementById("password").value;

    var form = new FormData();
    form.append("email", email_id);
    form.append("password", password);

    var settings = {
        "url": "/api/v1/users/login.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function (data) {
        console.log(data);
        if (data.status_code == 1200) {
            let arr = data.data;
            if (arr.login) {
                if (arr.role == "student") {
                    alert(arr.message);
                    window.location = "users/student/";
                    sessionStorage.setItem("user", JSON.stringify(arr.user));
                } else if (arr.role == "teacher") {
                    alert(arr.message);
                    window.location = "users/teacher/";
                    sessionStorage.setItem("user", JSON.stringify(arr.user));
                } else if (arr.role == "admin") {
                    alert(arr.message);
                    window.location = "users/admin/";
                    sessionStorage.setItem("user", JSON.stringify(arr.user));
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
//signup API Integration
$("#signup_form").submit(async function (e) {

    e.preventDefault();
    let email_id = document.getElementById("email_id").value;
    var form = new FormData();
    form.append("email_id", email_id);
    
    var settings = {
      "url": "/api/v1/users/checkUser.php",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "contentType": false,
      "data": form
    };
    
    $.ajax(settings).done(function (response) {
      console.log(response);
    if(response.status_code == 1200){
        if(response.data.login_code == 100){
            let role = response.data.role;
            sessionStorage.setItem('user_role', role);
            if(role == "teacher"){
                window.location.replace("/teacher_signup.php");
            }else if(role=="student"){
                window.location.replace("/student_signup.php");
            }else{
                alert("Some Error Occured");
            }
        }else{
            alert(response.data.message);
        }
    }else{
        // Error
        alert("Some Error Occured");
    }
    });

});

// Teacher Registration API Integration
async function teacherRegistration() {
    // fetch data from the form then pass them as params to the api
    let unique_id = document.getElementById("unique_id").value;
    let firstname = document.getElementById("firstname").value;
    let midname = document.getElementById("midname").value;
    let Lastname = document.getElementById("Lastname").value;
    let dob = document.getElementById("dob").value;
    let gender = document.getElementById("gender").value;
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let cpassword = document.getElementById("cpassword").value;
    if(password!=cpassword){
        alert("Password should be same");
        return false;
    }
    let photo = document.getElementById("photo");

    var form = new FormData();
    form.append("unique_id", unique_id);
    form.append("firstname", firstname);
    form.append("midname", midname);
    form.append("Lastname", Lastname);
    form.append("dob", dob);
    form.append("gender", gender);
    form.append("phone", phone);
    form.append("email", email);
    form.append("file", photo.files[0]);
    form.append("password", password);

    var settings = {
        "url": "/api/v1/registrationteacher/create.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,

        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function (response) {
        if (response.status_code == 1200) {
            alert(response.message);
            window.location.assign("/");
        } else {
            alert("Some Error Occured");
        }
    });

}

// Student Registration API Integration
async function studentRegistration() {

    // Getting the Form Inputs
    // fetch data from the form then pass them as params to the api
    let unique_id = document.getElementById("unique_id").value;
    let first_name = document.getElementById("first_name").value;
    let mid_name = document.getElementById("mid_name").value;
    let last_name = document.getElementById("last_name").value;
    let dob = document.getElementById("dob").value;
    let gender = document.getElementById("gender").value;
    let stream = document.getElementById("stream").value;
    let section = document.getElementById("section").value;
    let semester = document.getElementById("semester").value;
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let cpassword = document.getElementById("cpassword").value;
    let photo = document.getElementById("photo");

    var form = new FormData();
    form.append("first_name", first_name);
    form.append("mid_name", mid_name);
    form.append("lastname", last_name);
    form.append("dob", dob);
    form.append("gender", gender);
    form.append("stream", stream);
    form.append("section", section);
    form.append("semester", semester);
    form.append("email", email);
    form.append("phone", phone);
    form.append("password", password);
    form.append("file", photo.files[0]);
    form.append("unique_id", unique_id);

    var settings = {
        "url": "/api/v1/studentregistration/create.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function (response) {
        if (response.status_code == 1200) {
            alert(response.message);
            window.location.assign("/");
        } else {
            alert("Some Error Occured");
        }
    });


}

