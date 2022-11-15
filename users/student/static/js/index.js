$(document).ready(function () {
    getDashboradAPI();
});
async function getDashboradAPI() {
    // call the api here 


let stream = login_user.stream;
let semester = login_user.semester;
let section = login_user.section;

var form = new FormData();
form.append("stream", stream);
form.append("sem", semester);
form.append("section", section);

var settings = {
  "url": "/api/v1/dashboard/student.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,

  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
  if(response.status_code==1200){
    let arr = response.data;
    let schedule_class = arr.class;
    let upload_notes = arr.notes;
    let updates = arr.updates;
    document.getElementById("schedule_class").innerHTML = `(${schedule_class})`;
    document.getElementById("upload_notes").innerHTML = `(${upload_notes})`;
    document.getElementById("updates").innerHTML = `(${updates})`;

}else{
    alert("Some Error Occurred");
}
});
}