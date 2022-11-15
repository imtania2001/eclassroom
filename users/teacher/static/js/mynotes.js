$(document).ready(function () {
  getFacultyNoteByIdHTML();
});

function getFacultyNoteByIdHTML() {
  let html = `<table class="table table-hover">
    <thead>
      <th>S.No</th>
      <th>Date</th>
      <th>Stream</th>
      <th>Semester</th>
      <th>Section</th>
      <th>Subject</th>
      <th>Topic</th>
      <th>Notes</th>
      <th>Link</th>
      <th>Delete</th>
    </thead>
    <tbody id="fetch_notes">
      
    </tbody>
  </table>
  <p id="fetch_notes_message" class="text-center text-muted"></p>`;
  document.getElementById("mynote-container").innerHTML = html;
  document.getElementById("show-table").disabled = true;
  document.getElementById("show-form").disabled = false;

  var form = new FormData();
  form.append("faculty_id", login_user.id);

  var settings = {
    "url": "/api/v1/updatednote/viewnotes.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "contentType": false,
    "data": form
  };

  $.ajax(settings).done(function (response) {
    console.log(response);
    if (response.status_code == 1200) {
      let arr = response.data.row;
      let total = response.data.total;
      document.getElementById("total_notes").innerHTML = `(${total})`;
      if (!total) {
        document.getElementById("fetch_notes_message").innerHTML = `No Data Found`;
      }
      tbody = ``;
      for (let i = 0; i < total; i++) {
        stream = arr[i].stream;
        sem = arr[i].sem;
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
                            <td>${i + 1}</td>
                            <td>${arr[i].date}</td>
                            <td>${stream}</td>
                            <td>${sem}</td>
                            <td>${arr[i].subject}</td>
                            <td>${arr[i].section}</td>
                            <td>${arr[i].topic}</td>
                            <td><a href="${arr[i].file}" download><button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></a></td>
                            <td>
                              <a href="${arr[i].recordinglink}" target="_blank"><button class="btn btn-warning">
                                <i class="fa-solid fa-link"></i>
                              </button></a>
                            </td>
                            <td>
                              <button class="btn btn-danger" onclick="deleteNote('${arr[i].id}');">
                                <i class="fa-solid fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                `;
      }
      document.getElementById("fetch_notes").innerHTML = tbody;
    }
  });


}

function showCreateNoteForm() {
  let html = `<div class="card overflow-auto bg-transparent border-0 col-sm-10 m-auto">
                    <div class="card-body overflow-auto">
                        <h4 class="card-title text-center">Upload Notes</h4>
                        <div class="row overflow-auto" id="createNote" method="post">

                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Stream</label>
                                <div class="col-sm-9">
                                    <select id="stream" class="form-control" onchange="fetchSemester();">
                                        <option value="" selected disabled>Choose Stream</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Semester</label>
                                <div class="col-sm-9">
                                    <select id="semester" class="form-control" onchange="fetchSubject();">
                                        <option value="" selected disabled>Choose Semester</option>
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
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Subject</label>
                                <div class="col-sm-9">
                                    <select id="subject" class="form-control">
                                        <option value="" selected disabled>Choose Subject</option>
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
                                <label class="text-dark px-2">Select Note</label>
                                <div class="col-sm-9">
                                    <input type="file" id="file" class="form-control bg-light" placeholder="Select File">
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
                                <button class="btn btn-success mx-3 mt-2" onclick="createNoteAPI();" type="button">Submit</button>
                                <button class="btn btn-danger mx-3 mt-2" id="cancelCreateNote" onclick="showCreateNoteForm();">Cancel</button>
                            </div>
                            <div style="height:200px; width:100%;">
                            </div>
                        </div>
                    </div>
                </div>`;
  document.getElementById("mynote-container").innerHTML = html;
  document.getElementById("show-table").disabled = false;
  document.getElementById("show-form").disabled = true;

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


async function deleteNote(id) {
  let val = confirm("Are you sure, You want to delete the note?");
  if (!val) {
    return false;
  }

  var form = new FormData();
  form.append("id", id);

  var settings = {
    "url": "/api/v1/scheduleclass/delete.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "contentType": false,
    "data": form
  };

  $.ajax(settings).done(function (response) {
    console.log(response);
    if (response.status_code == 1200) {
      alert("Class Deleted");
    } else {
      alert("An Error Occured");
      window.location.reload();
    }
  });


}


// Fetching All Semester by Stream Id -------------------------------------------------
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

//Fetch all subject by semesterId----------------------------------------------

async function fetchSubject() {
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

// Create Note API Integration

async function createNoteAPI() {
  // alert("Here");
  let stream = document.getElementById("stream").value;
  let semester = document.getElementById("semester").value;
  let subject = document.getElementById("subject").value;
  let topic = document.getElementById("topic").value;
  let date = document.getElementById("date").value;
  let recordinglink = document.getElementById("classlink").value;
  let section = document.getElementById("section").value;
  let fileInput = document.getElementById("file");
  var form = new FormData();
  form.append("faculty_id", login_user.id);
  form.append("faculty_name", login_user.firstname + " " + login_user.midname + " " + login_user.Lastname);
  form.append("stream", stream);
  form.append("sem", semester);
  form.append("section", section);
  form.append("subject", subject);
  form.append("topic", topic);
  form.append("date", date);
  form.append("file", fileInput.files[0],);
  form.append("recordinglink", recordinglink);

  var settings = {
    "url": "/api/v1/updatednote/create.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "contentType": false,
    "data": form
  };
  $.ajax(settings).done(function (response) {
    console.log(response);
    if (response.status_code == 1200) {
      alert(response.message);
      window.location.reload();
    } else {
      alert(response.message);
      showCreateClassForm();
    }
  });
}
//