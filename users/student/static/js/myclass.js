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

      </tr>
    </tbody>
  </table>`;
  document.getElementById("myclass-container").innerHTML = html;
  document.getElementById("show-table").disabled = true;
  document.getElementById("show-form").disabled = false;
}
