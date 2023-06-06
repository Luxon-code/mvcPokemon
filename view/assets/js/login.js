function login(){
    
    fetch(`../controller/login.php?txtCorreo=${txtCorreo.value}&txtPassword=${txtPassword.value}`)
    .then(response => response.json())
    .then((data) => {
        console.log(data);
        try{
            if(data[0]['correo']){
                location.href = "roles.php"
            }
        }catch{
            alert('Usuario o Password incorrectas')
        }
    })
}