$(document).ready(function () {
    getDashboradAPI();
});
async function getDashboradAPI() {
    // call the api here 
    var form = new FormData();
    form.append("faculty_id", login_user.id);

    var settings = {
        "url": "/api/v1/dashboard/teacher.php",
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
            let total_class = arr.class;
            let total_notes = arr.notes;
            let total_updates = arr.updates;
            document.getElementById("total_class").innerHTML = `(${total_class})`;
            document.getElementById("total_notes").innerHTML = `(${total_notes})`;
            document.getElementById("total_updates").innerHTML = `(${total_updates})`;

        }else{
            alert("Some Error Occurred");
        }
    });

}