$(document).ready(function () {
    getFacultyClassesByIdHTML();
});

function getFacultyClassesByIdHTML() {
    let html = `<table class="table table-hover">
    <thead>
      <th>S.No</th>
      <th>Date</th>
      <th>Time</th>
      <th>Stream</th>
      <th>Semester</th>
      <th>Section</th>
      <th>Subject</th>
      <th>Topic</th>
      <th>Link</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>28-10-2022</td>
        <td>10:00 AM</td>
        <td>BCA</td>
        <td>Sem1</td>
        <td>C Programming</td>
        <td>Alpha</td>
        <td>Introduction</td>
        <td>
          <a href="https://www.google.com/" target="_blank"><button class="btn btn-warning">
            <i class="fa-solid fa-link"></i>
          </button></a>
        </td>
        <td>
          <button class="btn btn-secondary" onclick="showEditClassForm();">
            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
          </button>
        </td>
        <td>
          <button class="btn btn-danger" onclick="deleteClass('id');">
            <i class="fa-solid fa-trash"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>`;
    document.getElementById("myclass-container").innerHTML = html;
    document.getElementById("show-table").disabled = true;
    document.getElementById("show-form").disabled = false;
}

function showCreateClassForm() {
    let html = `<div class="card overflow-auto bg-transparent border-0 col-sm-10 m-auto">
                    <div class="card-body overflow-auto">
                        <h4 class="card-title text-center">Schedule Class</h4>
                        <div class="row overflow-auto" id="createClass" method="post">

                            <div class="form-group col-sm-6 my-2">
                                <label class="text-dark px-2">Select Stream</label>
                                <div class="col-sm-9">
                                    <select id="stream" class="form-control" onchange="fetchSemester();">
                                        <option value="" selected disabled>Select Stream</option>
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
                                        <option value="Combined">Combined</option>
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
                                <button class="btn btn-success mx-3 mt-2" id="createClassBtn" type="button" onclick="createClassAPI();">Submit</button>
                                <button class="btn btn-danger mx-3 mt-2" id="cancelCreateClass" onclick="showCreateClassForm();">Cancel</button>
                            </div>
                            <div style="height:200px; width:100%;">
                            </div>
                        </div>
                    </div>
                </div>`;
    document.getElementById("myclass-container").innerHTML = html;
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

function showEditClassForm(id = "") {
    let html = `<div class="card overflow-auto bg-transparent border-0 col-sm-10 m-auto">
                    <div class="card-body overflow-auto">
                        <h4 class="card-title text-center">Edit your Scheduled Class</h4>
                        <input type="hidden" id="classid" value="${id}" >
                        <div class="row overflow-auto" id="createClass" method="post">

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
                                <button class="btn btn-success mx-3 mt-2" id="updateClassBtn">Update</button>
                                <button class="btn btn-danger mx-3 mt-2" id="updateCreateClass" onclick="cancelFormEdit();">Cancel</button>
                            </div>
                            <div style="height:200px; width:100%;">
                            </div>
                        </div>
                    </div>
                </div>`;
    document.getElementById("myclass-container").innerHTML = html;
    document.getElementById("show-table").disabled = false;
    document.getElementById("show-form").disabled = false;
}

function cancelFormEdit() {
    let id = document.getElementById("classid").value;
    showEditClassForm(id);
}

function deleteClass(id = "") {
    let val = confirm("Are you sure, You want to delete the class?");
    if (val) {
        getFacultyClassesByIdHTML();
    }
}


// Fetching Alll Semester by Stream Id -------------------------------------------------
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

//Fetch all subject by semesterId----------------------------------------------

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


// Create Class API Integration

async function createClassAPI() {
    let stream = document.getElementById("stream").value;
    let semester = document.getElementById("semester").value;
    let subject=document.getElementById("subject").value;
    let topic=document.getElementById("topic").value;
    let date=document.getElementById("date").value;
    let time=document.getElementById("time").value;
    let classlink=document.getElementById("classlink").value;
    let section=document.getElementById("section").value;
    var form = new FormData();
    form.append("faculty_id", "1");
    form.append("faculty_name", "subrata saha");
    form.append("stream", stream);
    form.append("sem", semester);
    form.append("subject", subject);
    form.append("topic",topic);
    form.append("date", date);
    form.append("time", time);
    form.append("classlink", classlink);
    form.append("section",section );

    var settings = {
        "url": "/api/v1/scheduleclass/create.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "contentType": false,
        "data": form
    };
    $.ajax(settings).done(function (response) {
        console.log(response);
        if(response.status_code == 1200){
            alert(response.message);
            getFacultyClassesByIdHTML(); 
        }else{
            alert(response.message);
            showCreateClassForm();
        }
      });
}
