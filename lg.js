document.getElementById("btn").addEventListener("click",function(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("pass").value;
    if(email !== null && password !== null && email !== "" && password !== "")
    {
        alert("Successfully signed in");
        window.location.href="intro.html";
    }
    else{
        alert("Please enter your credentials");
    }
});