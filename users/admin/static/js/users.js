async function addUser(){
    // Validation
    let usertype = document.getElementById("usertype");
    let email = document.getElementById("email");

    let flag = true;
    if(usertype.value == ""){
        usertype.classList.add("border-danger");
        flag = false;
    }
    if(email.value == ""){
        email.classList.add("border-danger");
        flag = false;
    }
    if(!flag){
        return false;
    }

    // Integrate the api here



    
    

}

function removerBorderDanger(id){
    this.classList.remove("border-danger");
}