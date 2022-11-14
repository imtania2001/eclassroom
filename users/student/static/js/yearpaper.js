$(document).ready(function () {
  getYearPaperTableHTML();
});

function getYearPaperTableHTML() {
  let html = `<table class="table table-hover mx-4">
    <thead>
      <th>Year</th>
      <th>Stream</th>
      <th>Semester</th>
      <th>Subject</th>
      <th>Download</th>
    </thead>
    <tbody>
      <tr>
        <td>2020</td>
        <td>BCA</td>
        <td>Sem1</td>
        <td>C Language</td>
        <td><button class="btn btn-success"><i class="fa-solid fa-download"></i></button></td>

      </tr>
    </tbody>
  </table>`;
  document.getElementById("yearpaper-container").innerHTML = html;
}
