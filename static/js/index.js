$("#login_form").submit(async function(e){
    e.preventDefault();
    alert("Hello");
    let email_id = document.getElementById("email_id");
    let password = document.getElementById("password");

    await $.ajax({
        type : "POST",
        url : "http://localhost/api/v1/users/login.php",
        data : {
            email_id : email_id,
            password : password
        },
        success : function(data){
            console.log(data);
        }
    });

});