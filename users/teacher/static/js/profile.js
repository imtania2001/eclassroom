// console.log(login_user);
let first_name = document.getElementById("firstname");
let mid_name = document.getElementById("midname");
let last_name = document.getElementById("Lastname");
let dob = document.getElementById("dob");
let gender = document.getElementById("gender");
let phone = document.getElementById("phone");
let photo = document.getElementById("photo");

first_name.value = login_user.firstname;
mid_name.value = login_user.midname;
last_name.value = login_user.Lastname;
dob.value = login_user.dob;
gender.value = login_user.gender;
phone.value = login_user.phone;

async function TeacherEditProfile() {
    var form = new FormData();
    form.append("id", login_user.id);
    form.append("first_name", first_name.value);
    form.append("mid_name", mid_name.value);
    form.append("lastname", last_name.value);
    form.append("dob", dob.value);
    form.append("gender", gender.value);
    form.append("phone", phone.value);
    if (photo.files.length) {
        // alert("OK");
        form.append("file", photo.files[0]);
    }

    var settings = {
        "url": "/api/v1/registrationteacher/edit.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        // console.log("1++++++++++++++++++");
        if (response.status_code == 1200) {
            // console.log("2++++++++++++++++++");
            let arr = response.data;
            // console.log(arr);
            // console.log(arr.user);
            sessionStorage.setItem("user", JSON.stringify(arr.user));
            // console.log("3++++++++++++++++++");
            let getUser = JSON.parse(sessionStorage.getItem('user'));
            // console.log(getUser);
            // console.log("4++++++++++++++++++");
            console.log("4++++++++++++++++++");
            login_user.photo = getUser.photo;
            document.getElementById("profile").innerHTML = `<img src="${login_user.photo}" alt="">`;
            document.getElementById("login_user_name").innerHTML = `${login_user.firstname} ${login_user.midname
            } ${login_user.Lastname}`;
            // console.log("5++++++++++++++++++");
            alert("Profile Edited");
            window.location.assign("index.php");
        } else {
            alert("Some Error Occured");
        }
    });
}



async function changePassword() {
    let current_password = document.getElementById("current_password").value;
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirm_password").value;
    if(password != confirm_password){
        alert("Both Password Should be same");
        return false;
    }
    var form = new FormData();
    form.append("email_id", login_user.email);
    form.append("role", "teacher");
    form.append("current_password", current_password);
    form.append("password", password);

    var settings = {
        "url": "/api/v1/users/changePassword.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function (response) {
        // console.log(response);
        if(response.status_code==1200){
            alert("Password Changed Successfully");
            history.back();
        }else{
            alert("Invalid Credentials");
        }
    });
}