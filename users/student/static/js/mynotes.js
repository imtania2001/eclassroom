$(document).ready(async function () {
  let stream = login_user.stream;
  let sem = login_user.semester;
  let section = login_user.section;

  var form = new FormData();
  form.append("stream", stream);
  form.append("sem", sem);
  form.append("section", section);

  var settings = {
    "url": "/api/v1/updatednote/viewallnotes.php?",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "contentType": false,
    "data": form
  };

  $.ajax(settings).done(function (response) {
    console.log(response);
    if (response.status_code == 1200) {
      // API Success
      let arr = response.data.row;
      let total = response.data.total;
      if (!total) {
        document.getElementById("message").innerHTML = `No Data Found`;
      }
      let tbody = ``;
      for (let i = 0; i < arr.length; i++) {
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
        tbody += `<tr>
            <td>${i + 1}</td>
            <td>${arr[i].date}</td>
            <td>${stream}</td>
            <td>${sem}</td>
            <td>${arr[i].section}</td>
            <td>${arr[i].subject}</td>
            <td>${arr[i].topic}</td>
            <td><a href="${arr[i].classlink}" download><button type="Link" class="btn btn-primary">Link</button></a></td>
         
        </tr>
`;
      }
      document.getElementById("fetch-notes").innerHTML = tbody;
      document.getElementById("total-note").innerHTML = total;
    } else {
      alert("ErrorOccured");
    }
  });
});

