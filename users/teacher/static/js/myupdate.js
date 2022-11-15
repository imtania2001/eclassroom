$(document).ready(function () {
  getAllUpdateHTML();
});

// Function to render the HTML of Updates Table
function getAllUpdateHTML() {
  let html = `<table class="table table-hover">
    <thead>
      <th>S.No</th>
      <th>Date</th>
      <th>Time</th>
      <th>Stream</th>
      <th>Semester</th>
      <th>Message</th>
      <th>Link</th>
      <th>Delete</th>
    </thead>
    <tbody id="fetch_update">

    </tbody>
  </table>
  <p class="text-muted text-center" id="message"></p>`;
  document.getElementById("updates-container").innerHTML = html;
  document.getElementById("show-table").disabled = true;
  document.getElementById("show-form").disabled = false;
  
  var settings = {
    "url": "/api/v1/update/view.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "contentType": false,
  };
  
  $.ajax(settings).done(function (response) {
    console.log(response);
    if(response.status_code==1200){
      // API Success
      let arr = response.data.row;
      let total = arr.length;
      tbody = ``;
      if(total){
        // If Data Found
        for(let i=0;i<total;i++){
          tbody += `
          <tr>
          <td>${i+1}</td>
          <td>${arr[i].date}</td>
          <td>${arr[i].time}</td>
          <td>${arr[i].stream}</td>
          <td>${arr[i].semester}</td>
          <td>${arr[i].title}</td>
          <td>
            <a href="/api/updates/${arr[i].file}" target="_blank"><button class="btn btn-warning">
              <i class="fa-solid fa-link"></i>
            </button></a>
          </td>
          <td>
            <button class="btn btn-danger" onclick="deleteUpdate('id');">
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>
        </tr>
            `;
          }
          // RenderingDynamic Content to table body
          document.getElementById("fetch_update").innerHTML = tbody;
      }else{
        // No Data Found
        document.getElementById("fetch_update").innerHTML = tbody;
        document.getElementById("message").innerHTML = `No Data Found`;
      }
      document.getElementById("total_update").innerHTML = total;
    }else{
      // API Error
      document.getElementById("message").innerHTML = `An Error Occured`;
    }
  });


  }
  



// Function to render the Form of Updates Table
function showCreateUpdateForm() {
  let html = `<div class="card overflow-auto bg-transparent border-0 col-sm-10 m-auto">
                    <div class="card-body overflow-auto">
                        <h4 class="card-title text-center">Send the Update</h4>
                        <div class="row overflow-auto" id="createUpdate" method="post">

                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Stream</label>
                                <div class="col-sm-9">
                                    <select id="stream" class="form-control">
                                        <option value="" selected disabled>Choose Stream</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BBA">BBA</option>
                                        <option value="MCA">MCA</option>
                                        <option value="MSC">MSC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Semester</label>
                                <div class="col-sm-9">
                                    <select id="semester" class="form-control">
                                        <option value="" selected disabled>Choose Semester</option>
                                        <option value="Semester 1">Semester 1</option>
                                        <option value="Semester 2">Semester 2</option>
                                        <option value="Semester 3">Semester 3</option>
                                        <option value="Semester 4">Semester 4</option>
                                        <option value="Semester 5">Semester 5</option>
                                        <option value="Semester 6">Semester 6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Section</label>
                                <div class="col-sm-9">
                                    <select id="section" class="form-control">
                                        <option value="" selected disabled>Choose Section</option>
                                        <option value="Alpha">Alpha</option>
                                        <option value="Beta">Beta</option>
                                        <option value="Combined">Combined</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Subject</label>
                                <div class="col-sm-9">
                                    <select id="subject" class="form-control">
                                        <option value="" selected disabled>Choose Subject</option>
                                        <option value="C Language">C Language</option>
                                        <option value="C++ Language">C++ Language</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Date</label>
                                <div class="col-sm-9">
                                    <input type="date" id="date" class="form-control bg-light" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Time</label>
                                <div class="col-sm-9">
                                    <input type="time" id="time" class="form-control bg-light" placeholder="Select Time">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Enter the topic</label>
                                <div class="col-sm-9">
                                    <input type="text" id="topic" class="form-control bg-light" placeholder="Enter the topic">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Enter class link</label>
                                <div class="col-sm-9">
                                    <input type="text" id="classlink" class="form-control bg-light" placeholder="Enter class link">
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center align-items-center flex-wrap">
                                <button class="btn btn-success mx-3 mt-2" id="createUpdateBtn" type="button">Submit</button>
                                <button class="btn btn-danger mx-3 mt-2" id="cancelCreateUpdate" onclick="showCreateUpdateForm();">Cancel</button>
                            </div>
                            <div style="height:200px; width:100%;">
                            </div>
                        </div>
                    </div>
                </div>`;
  document.getElementById("updates-container").innerHTML = html;
  document.getElementById("show-table").disabled = false;
  document.getElementById("show-form").disabled = true;
  // Call the API function for getting stream
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

}
// Call the API function for getting Semester
function fetchSubject() {
  let semesters_id = document.getElementById("semester").value;
  var form = new FormData();
  form.append("semesters_id", semesters_id);
  var settings = {
      "url": "/api/v1/data/getSubjectBySemesterId.php",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "contentType": false,
      "data": form
  };

  document.getElementById("subject").innerHTML = `<option value="" selected disabled>Loading...!!!</option>`;

  $.ajax(settings).done(function (response) {
      console.log(response);
      if (response.status_code == "1200") {
          let total_record = response.data.total;
          let arr = response.data.subjects;
          let content = `<option value="" selected disabled>Select Subject</option>`;
          for (let i = 0; i < total_record; i++) {
              content += `<option value="${arr[i].id}">${arr[i].subject}</option>`;
          }
          document.getElementById("subject").innerHTML = content;
      } else {
          console.log(response["message"]);
      }
  });
}

// Create a function to create/insert the Updates (API Integration)
async function createUpdateAPI() {
  alert("Here");
  let stream = document.getElementById("stream").value;
  let semester = document.getElementById("semester").value;
  let title=document.getElementById("title").value;
  let message=document.getElementById("mesage").value;
  let file=document.getElementById("file").value;
  let date=document.getElementById("date").value;
  let time=document.getElementById("time").value;
  var form = new FormData();
  form.append("stream", "bca");
  form.append("semester", "sem5");
  form.append("title", "absulate program  updated");
  form.append("message", "program updated");
  form.append("file", fileInput.files[0], "/C:/Users/Ditipriya Sen/OneDrive/Documents/absulate.c");
  form.append("date", "11/11/2022");
  form.append("time", "3.00pm");
  
  var settings = {
    "url": "/api/v1/update/create.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "contentType": false,
    "data": form
  };
  
  $.ajax(settings).done(function (response) {
    console.log(response);
  });
  }
  



// Function to Delete Update 
function deleteUpdate(id = "") {
  let val = confirm("Are you sure, You want to delete the update?");
  if (val) {
      // Integrate the API HERE or Call the Function  for Deleting
      var form = new FormData();
form.append("id", "2");

var settings = {
  "url": "/api/v1/update/delete.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
});
  }
}
