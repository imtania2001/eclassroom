$(document).ready(function () {
  
  getAllUpdateHTML();
});

function getAllUpdateHTML() {
  let html = `<table class="table table-hover">
    <thead>
      <th>S.No</th>
      <th>Date</th>
      <th>Time</th>
      <th>Message</th>
      <th>Link</th>
      
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>28-10-2022</td>
        <td>10:00 AM</td>
        <td>BCA</td>
        <td>
          <a href="https://www.google.com/" target="_blank"><button class="btn btn-warning">
            <i class="fa-solid fa-link"></i>
          </button></a>
        </td>
       
      </tr>
    </tbody>
  </table>`;
  document.getElementById("updates-container").innerHTML = html;
  document.getElementById("show-table").disabled = true;
  document.getElementById("show-form").disabled = false;
}

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
                </div>`;
  document.getElementById("updates-container").innerHTML = html;
  document.getElementById("show-table").disabled = false;
  document.getElementById("show-form").disabled = true;
}

function deleteUpdate(id = "") {
  let val = confirm("Are you sure, You want to delete the update?");
  if (val) {
    getAllUpdateHTML();
  }
}
