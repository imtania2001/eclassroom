function toggle(){


const t = document.querySelector('.menu');


t.classList.toggle('active');


}


let login_user = JSON.parse(sessionStorage.getItem('user'));
console.log(login_user);
if(!login_user){
    window.location.replace("/");
}else{
    console.log(login_user);
    console.log(login_user.id);

    document.getElementById("profile").innerHTML = `<img src="${login_user.photo}" alt="">`;
    document.getElementById("login_user_name").innerHTML = `${login_user.first_name} ${login_user.mid_name
    } ${login_user.lastname}`;

}
