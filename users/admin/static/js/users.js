async function addUser() {
    // Validation
    let usertype = document.getElementById("usertype");
    let email = document.getElementById("email");

    let flag = true;
    if (usertype.value == "") {
        usertype.classList.add("border-danger");
        flag = false;
    }
    if (email.value == "") {
        email.classList.add("border-danger");
        flag = false;
    }
    if (!flag) {
        return false;
    }

    // Integrate the api here
    var form = new FormData();
    form.append("email_id", email.value);
    form.append("role", usertype.value);
    
    var settings = {
      "url": "/api/v1/users/addusers.php",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "contentType": false,
      "data": form
    };
    
    $.ajax(settings).done(function (response) {
      console.log(response);
      if(response.status_code == 1200){
            alert("User Added");
            window.location.reload();
        }else{
            alert("User already exsist");
            window.location.reload();

        }
    });


}

async function removeUser(id){
    let x = confirm("Are you sure, You want to delete this data?");
    if(!x)
        return false;

    // Integrate the api here
    var form = new FormData();
    form.append("id", id);
    
    var settings = {
      "url": "/api/v1/users/deleteusers.php",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "contentType": false,
      "data": form
    };
    
    $.ajax(settings).done(function (response) {
      console.log(response);
      if(response.status_code == 1200){
            alert("User Deleted");
            window.location.reload();
        }else{
            alert("Some error occord");
            window.location.reload();

        }
    });
    
    
}

function removerBorderDanger(id) {
    this.classList.remove("border-danger");
}


async function viewAllUser() {

    var settings = {
        "url": "http://localhost/api/v1/users/viewallusers.php",
        "method": "GET",
        "timeout": 0,
      };
      
      $.ajax(settings).done(function (response) {
        console.log(response); // printing the response from api
        if(response.status_code == 1200){ // checking status_code of api response
            // API Successfully Executed
            let arr = response.data.row; // storing row into arr variable
            // arr is an indexed array of associative arrays
            let total = response.data.total; // storing the total variable of response
            if(!total){ // if total == 0
                // Printing No Data Found
                document.getElementById("fetch_users_message").innerHTML = "No Data Found";
                
            }

            // Printing the total results
            document.getElementById("fetch_users_total").innerHTML = arr.length;

            let tbody = ``; // backquote
            for(let i=0;i<total;i++){
                // Concatenating the table rows and printing dynamic values from api which are stored in arr varriable
                tbody += `
                <tr>
                    <td>${i+1 }</td>
                    <td>${arr[i].email_id}</td>
                    <td>${arr[i].role}</td>
                    <td><button class="btn btn-danger" onclick="removeUser('${arr[i].id}');"><i
                                class="fa-solid fa-trash"></i></button></td>
                </tr>
                `;
            }
            // Printing the table rows in the UI Table Body
            document.getElementById("fetch_users").innerHTML = tbody ;

        }else{
            // Some Error Occurred
            document.getElementById("fetch_users_message").innerHTML = "No Data Found";
            alert("Some Error Occured");
            document.getElementById("fetch_users_total").innerHTML =0;
                
        }

      });
}

viewAllUser();


async function viewAllTeacher(){
    var settings = {
        "url": "http://localhost/api/v1/users/viewAllTeacher.php",
        "method": "GET",
        "timeout": 0,
      };
      
      $.ajax(settings).done(function (response) {
        console.log(response); // printing the response from api
        if(response.status_code == 1200){ // checking status_code of api response
            // API Successfully Executed
            let arr = response.data.row; // storing row into arr variable
            // arr is an indexed array of associative arrays
            let total = response.data.total; // storing the total variable of response
            if(!total){ // if total == 0
                // Printing No Data Found
                document.getElementById("fetch_teacher_message").innerHTML = "No Data Found";
                
            }

            // Printing the total results
            document.getElementById("fetch_teacher_total").innerHTML = total;

            let tbody = ``; // backquote
            for(let i=0;i<total;i++){
                // Concatenating the table rows and printing dynamic values from api which are stored in arr varriable
                tbody += `
                <tr>
                    <td>${i+1}</td>
                    <td>${arr[i].unique_id}</td>
                    <td>${arr[i].firstname}${arr[i].midname}${arr[i].Lastname}</td>
                    <td>${arr[i].phone}</td>
                    <td>${arr[i].email}</td>
                    <td>${arr[i].dob}</td>
                    <td>${arr[i].gender}</td>
                </tr>
                `;
            }
            // Printing the table rows in the UI Table Body
            document.getElementById("fetch_teacher").innerHTML = tbody ;

        }else{
            // Some Error Occurred
            document.getElementById("fetch_teacher_message").innerHTML = "No Data Found";
            alert("Some Error Occured");
            document.getElementById("fetch_teacher_total").innerHTML =0;
                
        }

      });
}

viewAllTeacher();


async function viewAllStudent(){
    var settings = {
        "url": "/api/v1/users/viewAllStudent.php",
        "method": "GET",
        "timeout": 0,
      };
      
      $.ajax(settings).done(function (response) {
        console.log(response); // printing the response from api
        if(response.status_code == 1200){ // checking status_code of api response
            // API Successfully Executed
            let arr = response.data.row; // storing row into arr variable
            // arr is an indexed array of associative arrays
            let total = response.data.total; // storing the total variable of response
            if(!total){ // if total == 0
                // Printing No Data Found
                document.getElementById("fetch_student_message").innerHTML = "No Data Found";
                
            }

            // Printing the total results
            document.getElementById("fetch_student_total").innerHTML = total;

            let tbody = ``; // backquote
            for(let i=0;i<total;i++){
                // Concatenating the table rows and printing dynamic values from api which are stored in arr varriable
                tbody += `
                <tr>
                <td>${i+1}</td>
                <td>${arr[i].roll_number}</td>
                <td>${arr[i].name}</td>
                <td>${arr[i].mobile_number}</td>
                <td>${arr[i].email_id}</td>
                <td>${arr[i].dob}</td>
                <td>${arr[i].stream}</td>
                <td>${arr[i].semester}</td>
                <td>${arr[i].batch}</td>
            </tr>
                `;
            }
            // Printing the table rows in the UI Table Body
            document.getElementById("fetch_student").innerHTML = tbody ;

        }else{
            // Some Error Occurred
            document.getElementById("fetch_student_message").innerHTML = "No Data Found";
            alert("Some Error Occured");
            document.getElementById("fetch_student_total").innerHTML =0;
                
        }

      });
}

viewAllStudent();;