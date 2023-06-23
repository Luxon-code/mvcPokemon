function login(){
    
    fetch(`../controller/login.php?txtCorreo=${txtCorreo.value}&txtPassword=${txtPassword.value}`)
    .then(response => response.json())
    .then((data) => {
        console.log(data);
        try{
            if(data[0]['correo']){
                location.href = "inicio.php"
                localStorage.idUsuario = data[0]['id']
            }
        }catch{
            alert('Usuario o Password incorrectas')
        }
    })
} 