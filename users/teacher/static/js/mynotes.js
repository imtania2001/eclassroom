$(document).ready(function () {
  getFacultyNoteByIdHTML();
});

function getFacultyNoteByIdHTML() {
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
      <th>Notes</th>
      <th>Link</th>
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
        <td><button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></td>
        <td>
          <a href="https://www.google.com/" target="_blank"><button class="btn btn-warning">
            <i class="fa-solid fa-link"></i>
          </button></a>
        </td>
        <td>
          <button class="btn btn-danger" onclick="deleteNote('id');">
            <i class="fa-solid fa-trash"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>`;
  document.getElementById("mynote-container").innerHTML = html;
  document.getElementById("show-table").disabled = true;
  document.getElementById("show-form").disabled = false;
}

function showCreateNoteForm() {
  let html = `<div class="card overflow-auto bg-transparent border-0 col-sm-10 m-auto">
                    <div class="card-body overflow-auto">
                        <h4 class="card-title text-center">Upload Notes</h4>
                        <div class="row overflow-auto" id="createNote" method="post">

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
                                <button class="btn btn-success mx-3 mt-2" id="createNoteBtn" type="button">Submit</button>
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
}

function deleteNote(id = "") {
  let val = confirm("Are you sure, You want to delete the note?");
  if (val) {
    getFacultyNoteByIdHTML();
  }
}
