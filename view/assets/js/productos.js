function create(){
    if(document.getElementById("txtNombre").value!=""&& document.getElementById("txtPrecio").value!=""&& 
    document.getElementById("txtCantidad").value!=""&& document.getElementById("txtDescripcion").value!=""){
        //informacion del formulario
        var data = `nombre=${txtNombre.value}&precio=${txtPrecio.value}&cantidad=${txtCantidad.value}&descripcion=${txtDescripcion.value}`
        //configuracion de la peticion
        var options = {
            method: "POST",
            body: data,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            }
        }
        fetch("../controller/productos.create.php",options)
        .then(response => response.json())
        .then((data)=>{
            console.log(data)
            read()
            txtNombre.value = ""
            txtPrecio.value = ""
            txtCantidad.value = ""
            txtDescripcion.value = ""
            Swal.fire(
                'Crear Producto',
                data,
                'success'
            )

        })
        .catch((error)=>{
            console.log("Error al crear rol.")
        })
    }else{
        Swal.fire(
            'Crear Producto',
            'Faltan Datos',
            'warning'
        )
    }
}
function update() {
    if(document.getElementById("txtNombreUp").value!=""&&document.getElementById("txtPrecioUp").value!=""&&
    document.getElementById("txtCantidadUp").value!=""&&document.getElementById("txtDescripcionUp").value!=""){
        let id = localStorage.id
        //informacion del formulario
        var data = `nombre=${txtNombreUp.value}&precio=${txtPrecioUp.value}&cantidad=${txtCantidadUp.value}&descripcion=${txtDescripcionUp.value}&id=${id}`
        //configuracion de la peticion
        var options = {
            method: "POST",
            body: data,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            }
        }
        fetch("../controller/productos.update.php",options)
        .then(response => response.json())
        .then((data)=>{
            console.log(data)
            read()
            Swal.fire(
                'Modificar Producto',
                data,
                'success'
            )

        })
        .catch((error)=>{
            console.log("Error al crear rol.")
        })
    }else{
        Swal.fire(
            'Modificar Producto',
            'Faltan Datos',
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
    fetch("../controller/productos.delete.php",options)
    .then(response => response.json())
    .then((data)=>{
        console.log(data)
        read()
        Swal.fire(
            'Eliminar Producto',
            data,
            'success'
        )
    })
    .catch((error)=>{
        console.log(error)
    })
}
function read(){
    fetch("../controller/productos.read.php")
    .then((response) => response.json())
    .then((data)=>{
        console.log(data)
        let table = "";
        data.forEach((element,index) => {
            table+=`<tr>
                <th scope="row">${index+1}</th>
                <td>${element.nombrePro}</td>
                <td>${element.precioPro}</td>
                <td>${element.cantidadPro}</td>
                <td>${element.descripPro}</td>
                <td>
                <div class="form-check form-switch">
                <input onclick="statusRol('${element.id}','${element.estado}')" class="form-check-input" type="checkbox" role="switch" id="switch${element.nombrePro}" ${element.estado=='A'?"checked":""}>
                <label class="form-check-label" for="switch${element.nombrePro}">${element.estado=='A'?"Activo":"Inactivo"}</label></div></td>
                <td>${element.fechaCreacion}</td>
                <td class="d-flex justify-content-around"><a onclick="readID(${element.id})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" title="Editar"><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-danger" onclick="readID(${element.id})" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Eliminar"><i class="bi bi-trash"></i></a></td>
            </tr>`
            document.getElementById("tblProducto").innerHTML = table
        });
        let tbl = new DataTable('#tableProducto',{
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
window.onload = (event) => {
    read()
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
    fetch("../controller/productos.readID.php",options)
    .then(response => response.json())
    .then((data)=>{
        console.log(data)
        txtNombreUp.value = data[0].nombrePro
        txtPrecioUp.value = data[0].precioPro
        txtCantidadUp.value = data[0].cantidadPro
        txtDescripcionUp.innerHTML = data[0].descripPro
        mensajeEliminar.innerHTML = `¿Esta seguro que quiere eliminar el producto ${data[0].nombrePro}?`
        localStorage.id = data[0].id
    })
    .catch((error)=>{
        console.log("Error al consultar rol.")
    })
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
    fetch("../controller/productos.estado.php",options)
    .then(response => response.json())
    .then((data)=>{
         console.log(data)
         read()
    })
 }