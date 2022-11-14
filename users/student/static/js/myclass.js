$(document).ready(function () {
  let stream="bca";
  let sem="sem1";
  let section="alpha";
  var form = new FormData();
form.append("stream", "bca");
form.append("sem", "sem1");
form.append("section", "alpha");

var settings = {
  "url": "http://localhost/api/v1/scheduleclass/viewclass.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
  if(response.status_code==1200){
    //API success
    let arr = response.data.row;
        let total = response.data.total;
        if(!total){
            document.getElementById("message").innerHTML = `No Data Found`;
        }
        let tbody = ``;
        for(let i=0;i<arr.length;i++){
            tbody += `<tr>
                            <td>${i+1}</td>
                            <td>${arr[i].date}</td>
                            <td>${arr[i].stream}</td>
                            <td>${arr[i].sem}</td>
                            <td>${arr[i].section}</td>
                            <td>${arr[i].subject}</td>
                            <td>${arr[i].topic}</td>
                            <td><a href="${arr[i].classlink}" download><button type="Link" class="btn btn-primary">Link</button></a></td>
                         
                        </tr>
            `;
        }
        document.getElementById("fetch-class").innerHTML = tbody;
        document.getElementById("total-class").innerHTML = total;
      }else{
        alert("ErrorOccured");
      }
    });
});

  