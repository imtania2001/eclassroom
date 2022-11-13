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
            document.getElementById("fetch_users_total").innerHTML = total;

            let tbody = ``; // backquote
            for(let i=0;i<total;i++){
                // Concatenating the table rows and printing dynamic values from api which are stored in arr varriable
                tbody += `
                <tr>
                    <td>'1</td>
                    <td>${arr[i].email_id}</td>
                    <td>${arr[i].role}</td>
                    <td><button class="btn btn-danger"><i
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
