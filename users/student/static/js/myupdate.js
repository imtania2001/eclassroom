$(document).ready(function () {
  let stream="bca";
  let semester="sem5";
  var form = new FormData();
  form.append("stream", stream);
  form.append("semester", semester);
  
  var settings = {
    "url": "/api/v1/update/viewallupdate.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "contentType": false,
    "data": form
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
          <td>${arr[i].title}</td>
          <td>${arr[i].message}</td>
          
          <td>
            <a href="/api/updates/${arr[i].file}" target="_blank"><button class="btn btn-warning">
              <i class="fa-solid fa-link"></i>
            </button></a>
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
});



