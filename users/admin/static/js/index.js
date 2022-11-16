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
  "method": "GET",
  "timeout": 0,
  "processData": false,
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
  if(response.status_code==1200){
    let arr = response.data;
    let email_id = arr.email;
    let role = arr.role;

    document.getElementById("email_id").innerHTML = `(${email_id})`;
    document.getElementById("role").innerHTML = `(${role})`;

}else{
    alert("Some Error Occurred");
}
});
}
