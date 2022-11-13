$(document).ready(async function () {
    let stream = "bca";
    let sem = "sem5";
    let section = "alpha";
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
      if(response.status_code==1200){
        // API Success
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
                            <td><a href="${arr[i].file}" download><button type="view" class="btn btn-primary">view</button></a></td>
                         
                        </tr>
            `;
        }
        document.getElementById("fetch-notes").innerHTML = tbody;
        document.getElementById("total-note").innerHTML = total;
      }else{
        alert("ErrorOccured");
      }
    });
});

