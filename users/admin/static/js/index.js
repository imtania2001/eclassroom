$(document).ready(function () {
    getDashboradAPI();
});
async function getDashboradAPI() {
    // call the api here 


let email_id= login_user.email_id;
let role = login_user.role;
var form = new FormData();
form.append("roe", "");

var settings = {
  "url": "/api/v1/dashboard/admin.php",
  "method": "POST",
  "timeout": 0,
};


$.ajax(settings).done(function (response) {
  console.log(response);
  if(response.status_code==1200){
    let arr = response.data;

    let schedule_class = arr.class;
    let  note_upload = arr.notes;
    let  update= arr.updates;
    let total_user=arr.users;
    let  register_Teacher=arr.teacher;
    let register_Student=arr.student;

    document.getElementById("schedule_class").innerHTML = `(${schedule_class})`;
    document.getElementById("note_upload").innerHTML = `(${note_upload})`;
    document.getElementById("update").innerHTML = `(${update})`;
    document.getElementById("total_user").innerHTML = `(${total_user})`;
    document.getElementById("register_Teacher").innerHTML = `(${register_Teacher})`;
    document.getElementById("register_student").innerHTML = `(${register_Student})`;
    
    

}else{
    alert("Some Error Occurred");
}
});
}
