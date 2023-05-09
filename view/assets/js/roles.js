function create(){
    //informacion del formulario
    var data = `txtRol=${document.getElementById("txtRol").value}`
    //configuracion de la peticion
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        }
    }
    fetch("../controller/roles.create.php",options)
    .then(response => response.json())
    .then((data)=>{
        console.log(data)
    })
    .catch((error)=>{
        console.log("Error al crear rol.")
    })
}
function read(){
    
}
function update(){

}
function deletes(){

}