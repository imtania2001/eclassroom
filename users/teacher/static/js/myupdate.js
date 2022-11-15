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
      <th>Topic</th>
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
          let filepath = arr[i].file;
          let td = ``;
          if(filepath!=""){
            td = `<a href="/api/updates/${arr[i].file}" target="_blank"><button class="btn btn-warning">
            <i class="fa-solid fa-link"></i>
          </button></a>`;
          }else{
            td = `<button class="btn btn-warning" disabled>
            <i class="fa-solid fa-link"></i>
          </button>`;
          }

          stream = arr[i].stream;
        sem = arr[i].semester;
        if (stream == 1)
          stream = "BCA";
        else if (stream == 2)
          stream = "BBA";
        else if (stream == 3)
          stream = "MCA";
        else if (stream == 4)
          stream = "MSC";

        if (sem == 1 || sem == 7 || sem == 13 || sem == 17)
          sem = "SEM1";
        else if (sem == 2 || sem == 8 || sem == 14 || sem == 18)
          sem = "SEM2";
        else if (sem == 3 || sem == 9 || sem == 15 || sem == 19)
          sem = "SEM3";
        else if (sem == 4 || sem == 10 || sem == 16 || sem == 20)
          sem = "SEM4";
        else if (sem == 5 || sem == 11)
          sem = "SEM5";
        else if (sem == 6 || sem == 12)
          sem = "SEM6";

          tbody += `
          <tr>
          <td>${i+1}</td>
          <td>${arr[i].date}</td>
          <td>${arr[i].time}</td>
          <td>${stream}</td>
          <td>${sem}</td>
          <td>${arr[i].title}</td>
          <td>${arr[i].message}</td>
          <td>
          ${td}
          </td>
          <td>
            <button class="btn btn-danger" onclick="deleteUpdate('${arr[i].id}');">
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
                                    <select id="stream" onchange="fetchSemester();" class="form-control">
                                        <option value="" selected disabled>Choose Stream</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Semester</label>
                                <div class="col-sm-9">
                                    <select id="semester" class="form-control">
                                        <option value="" selected disabled>Choose Semester</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                          
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" id="title" class="form-control bg-light" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Message</label>
                                <div class="col-sm-9">
                                    <input type="text" id="message" class="form-control bg-light" placeholder="Enter The Message">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">File</label>
                                <div class="col-sm-9">
                                    <input type="file" id="file" class="form-control bg-light" >
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center align-items-center flex-wrap">
                                <button class="btn btn-success mx-3 mt-2" onclick="createUpdateAPI();" type="button">Submit</button>
                                <button class="btn btn-danger mx-3 mt-2" id="cancelCreateUpdate" onclick="window.location.reload();">Cancel</button>
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
}

// Call the API function for getting Semester
async function fetchSemester(stream_id = 0) {
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
    } else {
      console.log(response["message"]);
    }
  });
}

// Create a function to create/insert the Updates (API Integration)
async function createUpdateAPI() {
  // alert("Here");
  let stream = document.getElementById("stream").value;
  let semester = document.getElementById("semester").value;
  let title=document.getElementById("title").value;
  let message=document.getElementById("message").value;
  let fileInput=document.getElementById("file");
  var form = new FormData();
  form.append("stream", stream);
  form.append("semester", semester);
  form.append("title", title);
  form.append("message", message);
  if(fileInput.files.length){
    form.append("file", fileInput.files[0]);
  }
  
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
    if(response.status_code==1200){
      alert("Update Sent");
    }else{
      alert("Error Occured");
    }
  });
  }
  



// Function to Delete Update 
function deleteUpdate(id = "") {
  let val = confirm("Are you sure, You want to delete the update?");
  if (!val) {
    return false;}
    //  alert (id);
      // Integrate the API HERE or Call the Function  for Deleting
      var form = new FormData();
form.append("id", id);

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
  if (response.status_code == 1200) {
    alert("Update Deleted");
    window.location.reload();
  } else {
    alert("An Error Occured");
  }
});

  }






