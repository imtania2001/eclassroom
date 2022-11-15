$(document).ready(function () {
    document.getElementById("stream").innerHTML = `<option value="" disabled>Loading...!!!</option>`;
    $.ajax({
        "url": "/api/v1/data/getAllStream.php",
        "method": "POST",
        "timeout": 0,
    }).done(function (response) {
        console.log(response);
        if (response["status_code"] == 1200) {
            // console.log(response["data"]);
            let total_record = response["data"].total;
            let arr = response["data"].streams;
            let content = `<option value="" selected disabled>Select Stream</option>`;
            for (let i = 0; i < total_record; i++) {
                content += `<option value="${arr[i].id}">${arr[i].stream}</option>`;
            }
            document.getElementById("stream").innerHTML = content;
        } else {
            console.log(["message"]);
        }
    });
});
// Fetching All Semester by Stream Id -------------------------------------------------
function fetchSemester() {
    let stream_id = document.getElementById("stream").value;
    var form = new FormData();
    form.append("stream_id", stream_id);
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