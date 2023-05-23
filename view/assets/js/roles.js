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
                <a class="btn btn-danger" onclick="deleteID(${element.id})" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Eliminar"><i class="bi bi-trash"></i></a></td>
            </tr>`
            document.getElementById("tblRol").innerHTML = table
        });
        let tbl = new DataTable('#tableRol',{
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
            retrieve: true,
            dom: "Bfrtip",
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="bi bi-clipboard"></i>',
                    titleAttr : 'Copiar',
                    exportOptions: {
                        columns: [0,1,2,3],
                    },
                    className: 'bg-primary',
                }, {
                    extend: 'excel',
                    text: '<i class="bi bi-filetype-xlsx"></i>',
                    titleAttr : 'Excel',
                    exportOptions: {
                        columns: [0,1,2,3],
                    },
                    className: 'bg-success',
                }, {
                    extend: 'pdf',
                    text: '<i class="bi bi-file-earmark-pdf"></i>',
                    titleAttr : 'PDF',
                    exportOptions: {
                        columns: [0,1,2,3],
                    },
                    className: 'bg-danger',
                },{
                    extend: 'print',
                    text: '<i class="bi bi-printer-fill"></i>',
                    titleAttr : 'Print',
                    exportOptions: {
                        columns: [0,1,2,3],
                    },
                    className: 'bg-warning',
                }
            ],
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
    let id = localStorage.id
    let data = `id=${id}`
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        }
    }
    fetch("../controller/roles.delete.php",options)
    .then(response => response.json())
    .then((data)=>{
        console.log(data)
        read()
        Swal.fire(
            'Eliminar Rol',
            data,
            'success'
        )
    })
    .catch((error)=>{
        console.log("Error al eliminar rol.")
    })
}
function deleteID(id){
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
        localStorage.id = data[0].id
        document.getElementById("mensajeEliminar").innerHTML = `¿Esta seguro que quiere eliminar el rol ${data[0].nombreRol}?`
    })
    .catch((error)=>{
        console.log("Error al consultar rol.")
    })
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