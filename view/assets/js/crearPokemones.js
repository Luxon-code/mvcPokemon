function createPokemones(){
    fetch("https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0")
    .then(response => response.json())
    .then((data)=>{
        data.results.forEach(element => {
            fetch(`https://pokeapi.co/api/v2/pokemon/${element.name}/`)
            .then(response => response.json())
            .then((datos)=>{
                id = datos.id
                nombre = datos.name
                precio = datos.base_experience*100
                cantidad = 1000
                descripcion = `Pokemon con una experiencia base de ${datos.base_experience} EXP`
                var data = `id=${id}&nombre=${nombre}&precio=${precio}&cantidad=${cantidad}&descripcion=${descripcion}`
                //configuracion de la peticion
                var options = {
                    method: "POST",
                    body: data,
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    }
                }
                fetch("../controller/productos.createPokemons.php",options)
                .then(response => response.json())
                .then((data)=>{
                    console.log(data)
                })
                .catch((error)=>{
                    console.log("Error al crear Pokemones.")
                })
            })
        });
    })
}
