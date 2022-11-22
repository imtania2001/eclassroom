$(document).ready(function () {
    getStreams();
});
console.log(login_user);
let first_name = document.getElementById("first_name");
let mid_name = document.getElementById("mid_name");
let last_name = document.getElementById("last_name");
let dob = document.getElementById("dob");
let gender = document.getElementById("gender");
let stream = document.getElementById("stream");
let semester = document.getElementById("semester");
let section = document.getElementById("section");
let phone = document.getElementById("phone");
let photo = document.getElementById("photo");


first_name.value = login_user.first_name;
mid_name.value = login_user.mid_name;
last_name.value = login_user.lastname;
dob.value = login_user.dob;
gender.value = login_user.gender;
section.value = login_user.section;
phone.value = login_user.phone;


// fetch streams

async function getStreams() {
    document.getElementById("stream").innerHTML = `<option value="" disabled>Loading...!!!</option>`;
    $.ajax({
        "url": "/api/v1/data/getAllStream.php",
        "method": "POST",
        "timeout": 0,
    }).done(function (response) {
        console.log(response);
        if (response["status_code"] == 1200) {
            let total_record = response["data"].total;
            let arr = response["data"].streams;
            let content = `<option value="" selected disabled>Select Stream</option>`;
            for (let i = 0; i < total_record; i++) {
                content += `<option value="${arr[i].id}">${arr[i].stream}</option>`;
            }
            document.getElementById("stream").innerHTML = content;
            stream.value = login_user.stream;
            fetchSemesterFirst();
        } else {
            console.log(["message"]);
        }
    });
}


// fetch semesters
// Fetching All Semester by Stream Id -------------------------------------------------
async function fetchSemesterFirst(stream_id = 0) {
    if (stream_id == 0)
        stream_id = document.getElementById("stream").value;
    var form = new FormData();
    form.append("stream_id", stream_id);
    var settings = {
        "url": "/api/v1/data/getSemesterByStreamId.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
        "data": form
    };

    document.getElementById("semester").innerHTML = `<option value="" selected disabled>Loading...!!!</option>`;

    $.ajax(settings).done(function (response) {
        console.log(response);
        if (response.status_code == "1200") {
            let total_record = response.data.total;
            let arr = response.data.semesters;
            let content = `<option value="" selected disabled>Select Semester</option>`;
            for (let i = 0; i < total_record; i++) {
                content += `<option value="${arr[i].id}">${arr[i].sem}</option>`;
            }
            document.getElementById("semester").innerHTML = content;
            semester.value = login_user.semester;
        } else {
            console.log(response["message"]);
        }
    });
}

// Fetching All Semester by Stream Id -------------------------------------------------
async function fetchSemester() {
    let stream_id = document.getElementById("stream").value;
    var form = new FormData();
    form.append("stream_id", stream_id);
    var settings = {
        "url": "/api/v1/data/getSemesterByStreamId.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
        "data": form
    };

    document.getElementById("semester").innerHTML = `<option value="" selected disabled>Loading...!!!</option>`;

    $.ajax(settings).done(function (response) {
        console.log(response);
        if (response.status_code == "1200") {
            let total_record = response.data.total;
            let arr = response.data.semesters;
            let content = `<option value="" selected disabled>Select Semester</option>`;
            for (let i = 0; i < total_record; i++) {
                content += `<option value="${arr[i].id}">${arr[i].sem}</option>`;
            }
            document.getElementById("semester").innerHTML = content;
        } else {
            console.log(response["message"]);
        }
    });
}

// integrate edit profile api here

// Student Registration API Integration
async function studentEditProfile() {

    var form = new FormData();
    form.append("id", login_user.id);
    form.append("first_name", first_name.value);
    form.append("mid_name", mid_name.value);
    form.append("gender", gender.value);
    form.append("phone", phone.value);
    form.append("lastname", last_name.value);
    form.append("dob", dob.value);
    form.append("stream", stream.value);
    form.append("section", section.value);
    form.append("semester", semester.value);
    if (photo.files.length) {
        form.append("file", photo.files[0]);
    }

    var settings = {
        "url": "/api/v1/studentregistration/edit.php",
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
    form.append("role", "student");
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