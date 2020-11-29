  var iconEye = document.querySelector("#IconEye");
  var inputPassword = document.querySelector("#passwordEye");

  iconEye.addEventListener("click", function(){
    this.classList.toggle("active");
    
    if(inputPassword.type == "password"){
      inputPassword.type = "text";
    }
    else{
      inputPassword.type = "password";
    }
    
  });


  