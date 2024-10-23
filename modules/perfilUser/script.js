ObtDataPerfil();
async function ObtDataPerfil() {
  let formData = new FormData();
  formData.append("funcion", "ObtDataPerfil");
  formData.append("UsuCod", $("#UsuCod").val());
  formData.append("User", $("#User").val());

  try {
    let req2 = await fetch(
      "/vetting/modules/perfilUser/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();

    let Nombre = document.getElementById("Nombre");
    Nombre.innerHTML = res2[0]["UsuNom"];

    let Rol = document.getElementById("Rol");
    Rol.innerHTML = res2[0]["RolNom"];

    let InputNombre = document.getElementById("InputNombre");
    InputNombre.value = res2[0]["UsuNom"];

    let InputIdentificacion = document.getElementById("InputIdentificacion");
    InputIdentificacion.value = res2[0]["UsuCC"];

    let InputDireccion = document.getElementById("InputDireccion");
    InputDireccion.value = res2[0]["UsuDirec"];

    let InputCelular = document.getElementById("InputCelular");
    InputCelular.value = res2[0]["UsuCel"];

    let InputEmail = document.getElementById("InputEmail");
    InputEmail.value = res2[0]["UsuEmail"];

    let InputContrasena = document.getElementById("InputContrasena");
    InputContrasena.value = res2[0]["UsuCla"];
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

async function UpdateDataPerfil() {
  let formData = new FormData();
  formData.append("funcion", "UpdateDataPerfil");
  formData.append("Nombre", $("#InputNombre").val());
  formData.append("Identificacion", $("#InputIdentificacion").val());
  formData.append("Direccion", $("#InputDireccion").val());
  formData.append("Celular", $("#InputCelular").val());
  formData.append("Contrasena", $("#InputContrasena").val());
  formData.append("UsuCod", $("#UsuCod").val());
  formData.append("User", $("#User").val());

  try {
    let req2 = await fetch(
      "/vetting/modules/perfilUser/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();
    ObtDataPerfil();
    if ((res2 === true)) {
      Swal.fire({
        icon: "success",
        title: "Exito.!",
        text: `Actualizado correctamente...!`,
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Error!",
        text: `Problema al Actualizar...!`,
      });
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
