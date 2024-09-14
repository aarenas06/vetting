async function Validar() {
  var User = $("#User").val();
  var Pass = $("#Pass").val();

  let formData = new FormData();
  formData.append("funcion", "Validar");
  formData.append("User", User);
  formData.append("Pass", Pass);

  try {
    let req2 = await fetch("/vetting/include/controller.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    if (res2 === "ok") {
      const urlRedireccion = `/vetting/modules/principal.php`;
      // Redireccionar a la URL con el parámetro
      window.location.href = urlRedireccion;
    } else {
      Swal.fire({
        icon: "error",
        title: "Error!",
        text: "Usuario o contraseña incorrecto",
      });
    }
  } catch {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: "Problema del Servidor",
    });
  }
}
