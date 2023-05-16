function create(){
    if(document.getElementById("txtRol").value!=""){
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
            Swal.fire(
                'Crear Rol',
                data,
                'success'
            )

        })
        .catch((error)=>{
            console.log("Error al crear rol.")
        })
    }else{
        Swal.fire(
            'Crear Rol',
            'Ingrese el nombre del rol',
            'warning'
        )
    }
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
                <td>
                <div class="form-check form-switch">
                <input onclick="statusRol('${element.id}','${element.estado}')" class="form-check-input" type="checkbox" role="switch" id="switch${element.nombreRol}" ${element.estado=='A'?"checked":""}>
                <label class="form-check-label" for="switch${element.nombreRol}">${element.estado=='A'?"Activo":"Inactivo"}</label></div></td>
                <td>${element.fechaCreacion}</td>
                <td class="d-flex justify-content-around"><a onclick="readID(${element.id})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" title="Editar"><i class="bi bi-pencil-square"></i></a>
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
    let nombreRol = document.getElementById("txtNombreRol").value
    let id = localStorage.id
    if(nombreRol != ""){
        let data = `nombreRol=${nombreRol}&id=${id}`
        var options = {
            method: "POST",
            body: data,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            }
        }
        fetch("../controller/roles.update.php",options)
        .then(response => response.json())
        .then((data)=>{
            console.log(data)
            read()
            Swal.fire(
                'Modificar Rol',
                data,
                'success'
            )
        })
        .catch((error)=>{
            console.log("Error al modificar rol.")
        })
    }else{
        Swal.fire(
            'Modificar Rol',
            'Ingrese el nombre del rol',
            'warning'
        )
    }
}
function deletes(){

}

function readID(id){
    data = `txtId=${id}`
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        }
    }
    fetch("../controller/roles.readID.php",options)
    .then(response => response.json())
    .then((data)=>{
        console.log(data)
        document.getElementById('txtNombreRol').value = data[0].nombreRol
        localStorage.id = data[0].id
    })
    .catch((error)=>{
        console.log("Error al consultar rol.")
    })
}

window.onload = (event) => {
    read()
}

function statusRol(id,estado) {
   let data = `id=${id}&estado=${estado}`
   var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        }
   }
   fetch("../controller/roles.estado.php",options)
   .then(response => response.json())
   .then((data)=>{
        console.log(data)
        read()
   })
}