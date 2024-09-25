listPropietarios();
async function listPropietarios() {
  let formData = new FormData();
  formData.append("funcion", "listPropietarios");
  try {
    let req2 = await fetch("/vetting/modules/home/controller/controller.php", {
      method: "POST",
      body: formData,
    });

    let res2 = await req2.text();
    $("#listPropietarios").html(res2);
    $("#tbPropietarios").DataTable();
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
