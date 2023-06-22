let json = localStorage.getItem("carrito")
produc = JSON.parse(json)
const carrito = produc 
console.log(carrito)
if(carrito==null){
    const carFalso = []
    localStorage.setItem("carrito",JSON.stringify(carFalso))
    location. reload()
}
const categorias = []
    const persona = {
        nombre: "David",
        edad: 20,
        ciuadad: "Neiva",
        cargo: "Programador"
    }
    function typePokemon(){
        fetch("https://pokeapi.co/api/v2/type")
            .then(Response => Response.json())
            .then(data => {
                console.log(data.results) 
                data.results.forEach(element => {
                    categorias.push(element)
                    divTypePokemon(element)
                    navCategorias(element)
                });
                carousel()
            })
    }
    function typePokemon2(){
        fetch("https://pokeapi.co/api/v2/type")
            .then(Response => Response.json())
            .then(data => {
                console.log(data.results) 
                data.results.forEach(element => {
                    navCategorias(element)
                });
                carousel()
            })
    }
    function divTypePokemon(element) {
        document.getElementById("typePokemonCarousel").innerHTML += `<div class="carousel-item ${element.name == "normal" ? "active" : ""}">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-img">
                        <a onclick="urlLocal('${element.url}')" href="tipos.php">
                        <img src="https://www.pokemon.com/static-assets/app/static3/img/og-default-image.jpeg" class="img-fluid" alt="${element.name}" style="height: 300px;">
                        </a>
                    </div>
                    <div class="card-img-overlays text-center fw-bold">${element.name}</div>
                </div>
            </div>
        </div>`
    }
    function navCategorias(element) {
        document.getElementById("listaCategorias").innerHTML += `<li><a class="dropdown-item" onclick="urlLocal('${element.url}')" href="tipos.php">${element.name}</a></li>`
    }
    function carousel() {
        let myCarousel = document.querySelectorAll('#featureContainer .carousel .carousel-item');
        myCarousel.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = myCarousel[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    }
    function urlLocal(url){
        localStorage.setItem("url",url)
    }
    function autoCompletPokemon(){
        fetch("https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0")
            .then(response => response.json())
            .then(data => {
                let textoBuscar = document.getElementById("txtBuscar").value
                if(textoBuscar.length >=2){
                    let lista = `<div class="list-group">`
                    const filtroPokemon = data.results.filter(filtrarPokemon)
                    filtroPokemon.forEach(element => {
                        console.log(element.url)
                        iconoPokemon(element.url)
                        lista += `<a onclick="detallePokemon2('${element.url}')" href="detallePokemon.php" class="list-group-item list-group-item-action">${element.name} <img id="icono${element.name}" style="width: 20%"></a>`
                    });
                    lista += `</div>`
                    document.getElementById("listPokemon").innerHTML = lista
                    document.getElementById("listPokemon").style  = `position: absolute;top: 53px;width: 22%;right:89px;z-index:9999;height: 380px;overflow: auto;`
                }else{
                    document.getElementById("listPokemon").innerHTML = ""
                }
            })
    }
    function filtrarPokemon(element){
        let textoBuscar = document.getElementById("txtBuscar").value
        let name  = element.name
        return name.includes(textoBuscar.toLowerCase())
    }
    function iconoPokemon(urlPokemon){
        fetch(urlPokemon)
            .then(response => response.json())
            .then(data =>{
                document.getElementById(`icono${data.name}`).src = data.sprites.other["official-artwork"].front_default
            })
    }
    function searchPokemon(){
        document.getElementById("txtBuscar").addEventListener("search", (event) =>{
            document.getElementById("listPokemon").innerHTML = ""
            document.getElementById("listPokemon").style = "overflow:hidden;"
            document.getElementById("txtBuscar").value = ""
        })
    }
    function getDetallePokemon(){
        let urlDetalle = localStorage.urlDetalle
        fetch(urlDetalle)
            .then((response) => response.json())
            .then((data =>{
                document.getElementById("detalle").innerHTML = `<div class="card mt-5">
                    <div class="titulo-card bg-dark-subtle">
                        <h1 class="text-center font">${data.name}</h1>
                    </div>
                    <div class="card-header bg-info-subtle">
                        <img src="${data.sprites.other["official-artwork"].front_default}" class="card-img-top w-50" alt="..." id="img">
                        <div>
                            <h5 class="card-title font">Habilidades:</h5>
                            <span>-${data.abilities[0].ability.name}</span>
                            <br>
                            <span>-${data.abilities[1].ability.name}</span>
                            <h5 class="card-title font">Movimientos:</h5>
                            <span>-${data.moves[0].move.name}</span>
                            <br>
                            <span>-${data.moves[1].move.name}</span>
                            <br>
                            <span>-${data.moves[2].move.name}</span>
                            <h5 class="card-title font">Habitad:</h5>
                            <span id="habitad">-</span>
                            <h5 class="card-title font">Area de localizacion:</h5>
                            <span id="areaLocalizacion">-</span>
                        </div>
                    </div>
                    <div class="card-body bg-info-subtle">
                    <h5 class="card-title font">ID: ${data.id}</h5>
                    <h5 class="card-title font">Principal Caracteristica:</h5>
                    <span id="principalCaracteristica"></span>
                    <h5 class="card-title text-center font">Estadisticas</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col text-center">${data.stats[0].stat.name}</th>
                            <th scope="col text-center">${data.stats[1].stat.name}</th>
                            <th scope="col text-center">${data.stats[2].stat.name}</th>
                            <th scope="col text-center">${data.stats[3].stat.name}</th>
                            <th scope="col text-center">${data.stats[4].stat.name}</th>
                            <th scope="col text-center">${data.stats[5].stat.name}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">${data.stats[0].base_stat}</td>
                            <td class="text-center">${data.stats[1].base_stat}</td>
                            <td class="text-center">${data.stats[2].base_stat}</td>
                            <td class="text-center">${data.stats[3].base_stat}</td>
                            <td class="text-center">${data.stats[4].base_stat}</td>
                            <td class="text-center">${data.stats[5].base_stat}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="card-footer bg-dark-subtle">
                        <div class="d-flex justify-content-between">
                            <span><b class="font">Altura: </b>${(data.height*0.1).toFixed(1)}<b> Mts</b></span>
                            <span><b class="font">Peso: </b>${(data.weight*0.1).toFixed(1)}<b> Kg</b></span>
                            <span><b class="font">Tipo: </b>${data.types[0].type.name}</span>
                        </div>
                    </div>
                </div>`
                getHabitad(data.id)
            }))
    }
    function getHabitad(id){
        fetch(`https://pokeapi.co/api/v2/pokemon-habitat/${id}/`)
        .then((response) => response.json())
        .then((data =>{
            document.getElementById("habitad").innerHTML = data.names[1].name
        }))
        getAreaLocalizacion(id)
    }
    function getAreaLocalizacion(id){
        fetch(`https://pokeapi.co/api/v2/pokemon/${id}/encounters`)
        .then((response) => response.json())
        .then((data =>{
            document.getElementById("areaLocalizacion").innerHTML = data[0].location_area.name
        }))
        getCaracteristica(id)
    }
    function getCaracteristica(id){
        fetch(`https://pokeapi.co/api/v2/characteristic/${id}/`)
        .then((response) => response.json())
        .then((data =>{
            document.getElementById("principalCaracteristica").innerHTML = data.descriptions[5].description
        }))
    }
    const pokemon = []
function obtenerUrl(){
    let url=  localStorage.getItem("url");
    return url
}
function obtenerPoke(){
    return new Promise((resolve)=>{
        fetch(obtenerUrl())
        .then(Response => Response.json())
        .then(data => {
            document.getElementById("titulo").innerHTML = `Categoria Pokemon ${data.name}`
            document.getElementById("tituloBarra").innerHTML = `Categoria Pokemon ${data.name}`
            data.pokemon.forEach(element => {
                datosPokemon(element.pokemon.url)
                pokemon.push(element)
                resolve("POkemones cargados")
            });
        })
    })
}
function PrintPokemon(){
    obtenerPoke()
    .then((response)=>{
        let lista = ""
        pokemon.forEach(element =>{
        lista +=  `<div class="card mb-3 mx-3 fondoCard" style="max-width: 540px;" draggable="true" ondragstart="drag(event)" id="card${element.pokemon.name}">
            <div class="row g-0">
              <div class="col-md-4">
                <a onclick="detallePokemon('${element.pokemon.url}')" href="detallePokemon.php">
                    <img id="img${element.pokemon.name}" src="" class="img-fluid rounded-start" alt="...">
                </a>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title text-center fontPokemon">${element.pokemon.name}</h5>
                  <span id="altura${element.pokemon.name}" class="card-text fw-bold color"></span><br>
                  <span id="peso${element.pokemon.name}" class="card-text fw-bold color"></span>
                  <br>
                  <div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-outline-danger boton" onclick="AgregarCarrito('${element.pokemon.name}')">Agregar al carrito</button>
                    <input type="number" id="cant${element.pokemon.name}" value="0" placeholder="Cantidad" class="btn btn-outline-danger" style="width: 47%;
                    height: 37px;
                    top: 20px;
                    position: relative;" min="0">
                  </div>
                </div>
              </div>
            </div>
          </div>`
        })
        document.getElementById("listaPokemones").innerHTML = lista
    })
}
function datosPokemon(urlInfoPokemon){
    fetch(urlInfoPokemon)
    .then((response) => response.json())
    .then((data => {
        console.log(data)
        document.getElementById(`img${data.name}`).src = data.sprites.other["official-artwork"].front_default
        document.getElementById(`altura${data.name}`).innerHTML = `Altura: ${(data.height*0.1).toFixed(1)} Mts`
        document.getElementById(`peso${data.name}`).innerHTML = `Peso: ${(data.weight*0.1).toFixed(1)} Kg`
    }))
}
function detallePokemon(urlDetallePokemon){
   localStorage.setItem("urlDetalle",urlDetallePokemon)
}
function detallePokemon2(url){
    localStorage.setItem("urlDetalle",url)
}
//Drag and drop
function allowDrop(ev) {
    ev.preventDefault();
}
  
function drag(ev) {
    switch (ev.target.nodeName) {
        case "DIV":
            namePokemon = ev.target.id.slice(4).toLowerCase()
            break;
        case "IMG":
            namePokemon = ev.target.id.slice(3).toLowerCase()
            break;
    }
    ev.dataTransfer.setData("name", namePokemon);
}
  
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("name");
    backInfoPokemon(data);
}
//end drag and drop
function backInfoPokemon(name){
    fetch(`https://pokeapi.co/api/v2/pokemon/${name}`)
    .then((response) => response.json())
    .then((data => {
        nombre = data.name
        precio = data.base_experience*100
        imagen = data.sprites.other["official-artwork"].front_default
        cantidad = parseInt(document.getElementById(`cant${name}`).value)
        const poke = {
            "id": data.id,
            "nombre": nombre,
            "precio": precio,
            "imagen": imagen,
            "cantidad": cantidad
        }
        if(cantidad == 0){
            alert("Ingrese la cantidad que desea comprar")
        }else{
            if(carrito.length>0){
                let existe = false
                carrito.forEach(element => {
                    if(element.id == poke.id){
                        alert("ya esta en el carrito")
                        existe=true
                        document.getElementById(`cant${name}`).value = 0
                    }else{
                        existe=false
                    }
                });
                if(existe==false){
                    carrito.push(poke)
                    localStorage.setItem("carrito",JSON.stringify(carrito))
                    document.getElementById(`cant${name}`).value = 0
                    listarCarrito()
                    Swal.fire(
                        'Carrito',
                        'Producto agregado',
                        'success'
                    )
                }
            }else{
                carrito.push(poke)
                localStorage.setItem("carrito",JSON.stringify(carrito))
            }
        }
    }))
}
function AgregarCarrito(name){
    fetch(`https://pokeapi.co/api/v2/pokemon/${name}`)
    .then((response) => response.json())
    .then((data => {
        nombre = data.name
        precio = data.base_experience*100
        imagen = data.sprites.other["official-artwork"].front_default
        cantidad = parseInt(document.getElementById(`cant${name}`).value)
        const poke = {
            "id": data.id,
            "nombre": nombre,
            "precio": precio,
            "imagen": imagen,
            "cantidad": cantidad
        }
        if(cantidad == 0){
            alert("Ingrese la cantidad que desea comprar")
        }else{
            if(carrito.length>0){
                let existe = false
                carrito.forEach(element => {
                    if(element.id == poke.id){
                        alert("ya esta en el carrito")
                        existe=true
                        document.getElementById(`cant${name}`).value = 0
                    }else{
                        existe=false
                    }
                });
                if(existe==false){
                    carrito.push(poke)
                    localStorage.setItem("carrito",JSON.stringify(carrito))
                    listarCarrito()
                    document.getElementById(`cant${name}`).value = 0
                    Swal.fire(
                        'Carrito',
                        'Producto agregado',
                        'success'
                    )
                }
            }else{
                carrito.push(poke)
                localStorage.setItem("carrito",JSON.stringify(carrito))
            }
        }
    }))
}
function listarCarrito(){
    let json = localStorage.getItem("carrito")
    productos = JSON.parse(json)
    console.log(productos)
    let car = ""
    productos.forEach((element,i) => {
        car += `<div class="card border-warning mb-3" style="max-width: 540px; border-bottom-left-radius: 9.25rem!important;
        border-top-left-radius: 10.25rem!important;">
        <div class="row g-0">
          <div class="col-md-4" style="display: flex;">
            <img src="${element.imagen}" class="img-fluid rounded-start" alt="..." style="border-bottom-left-radius: 9.25rem!important;
            border-top-left-radius: 10.25rem!important;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div style="margin-bottom: -28px;">
                <h5 class="card-title">${element.nombre}</h5>
                <button type="button" onclick="eliminarDelCarrito(${i})" class="btn-close" style="position: relative;
                top: -48px;
                left: 197px;"></button>
              </div>
              <p style="margin-bottom: 0rem;"><b>Precio: </b>$ ${element.precio}</p>
              <p style="margin-bottom: 0rem;"><b>Cantidad: </b>${element.cantidad}</p>
              <p style="margin-bottom: 0rem;"><b>Total: </b>$ ${element.cantidad*element.precio}</p>
            </div>
          </div>
        </div>
      </div>`
    });
    document.getElementById("list-car").innerHTML = car
    total()
}
function eliminarDelCarrito(i){
      carrito.splice(i, 1)
      localStorage.setItem("carrito",JSON.stringify(carrito))
      listarCarrito()
}
function total(){
    let total = 0
    carrito.forEach(element => {
      total += element.cantidad*element.precio
    });
    document.getElementById('total').innerHTML = `Total de la compra: ${total}`
}