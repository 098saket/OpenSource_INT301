function validateForm () {
    let password1 = document.forms["myform"]["password1"].value;
    let password2 =document.forms["myform"]["password2"].value;
    let email =document.forms["myform"]["email"].value;
    console.log(password1 + "  "+email);

    if(email.includes("@") && email.includes(".")){
        if (password1 !== password2) {
            alert("Password Mismatch"); 
            return false; 
        }else{
            return true;
        }
    }else {
        alert("Please enter a valid email");
        return false;
    }
}