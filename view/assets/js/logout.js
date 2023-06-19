function logout(){
    fetch("../controller/logout.php", {
        method: "GET",
        credentials: "same-origin" // Incluir las credenciales de la sesión en la solicitud
      })
      .then(response => {
        if (response.ok) {
          // Redirigir a la página de inicio de sesión después de cerrar la sesión
          window.location.href = "login.php";
        } else {
          console.error("Error al cerrar sesión");
        }
      })
      .catch(error => {
        console.error("Error al cerrar sesión:", error);
      });
}