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
    console.log(res2);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
