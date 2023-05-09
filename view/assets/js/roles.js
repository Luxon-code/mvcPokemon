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
        read()
        document.getElementById("txtRol").value = ""
    })
    .catch((error)=>{
        console.log("Error al crear rol.")
    })
}
function read(){
    fetch("../controller/roles.read.php")
    .then((response) => response.json())
    .then((data)=>{
        console.log(data)
        let table = "";
        data.forEach((element,index) => {
            table+=`<tr>
                <th scope="row">${index+1}</th>
                <td>${element.nombreRol}</td>
                <td>${element.estado}</td>
                <td>${element.fechaCreacion}</td>
                <td class="d-flex justify-content-around"><a onclick="readID(${element.id})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" title="Editar"><i class="bi bi-box-arrow-in-down-left" ></i></a>
                <a class="btn btn-danger" title="Eliminar"><i class="bi bi-trash"></i></a></td>
            </tr>`
            document.getElementById("tblRol").innerHTML = table
        });
    })
    .catch((error)=>{
        console.log("Error al consultar Rol")
    })
}
function update(){

}
function deletes(){

}

function readID(id){
    console.log(id)
}

window.onload = (event) => {
    read()
}