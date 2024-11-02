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
    if (res2.success === "ok") {
      if (res2.idTbRoles === 2) {
        //Vista propietarios
        const urlRedireccion = `/vetting/modules/principal.php?p=home/index`;

        window.location.href = urlRedireccion;
      }
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

async function InsertPropietarios() {
  var NomPropietarios = $("#NomPropietarios").val();
  var IdentPropietarios = $("#IdentPropietarios").val();
  var TelPropietarios = $("#TelPropietarios").val();
  var DirPropietarios = $("#DirPropietarios").val();
  var EmailPropietarios = $("#EmailPropietarios").val();
  var UsuPropietarios = $("#UsuPropietarios").val();
  var PassPropietarios = $("#PassPropietarios").val();

  let formData = new FormData();
  formData.append("funcion", "InsertPropietarios");
  formData.append("NomPropietarios", NomPropietarios);
  formData.append("IdentPropietarios", IdentPropietarios);
  formData.append("TelPropietarios", TelPropietarios);
  formData.append("DirPropietarios", DirPropietarios);
  formData.append("EmailPropietarios", EmailPropietarios);
  formData.append("UsuPropietarios", UsuPropietarios);
  formData.append("PassPropietarios", PassPropietarios);
  formData.append("Rol", "2");

  try {
    let req2 = await fetch("/vetting/include/controller.php", {
      method: "POST",
      body: formData,
    });

    let res2 = await req2.json();
    console.log();
    if (res2 === true) {
      Swal.fire({
        icon: "success",
        text: "Propietario Agregado Correctamente...!",
      });
      $("#exampleModalRegistrase").modal("hide");
      // Limpiar campos del formulario
      $("#NomPropietarios").val("");
      $("#IdentPropietarios").val("");
      $("#TelPropietarios").val("");
      $("#DirPropietarios").val("");
      $("#EmailPropietarios").val("");
      $("#UsuPropietarios").val("");
      $("#PassPropietarios").val("");
    } else {
      Swal.fire({
        icon: "error",
        text: "Ya existe un Propietario con esta Identificación...!",
      });
    }
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}
async function ValidarEmpr() {
  var User = $("#UserEmp").val();
  var Pass = $("#PassEmp").val();
  var pack = $("#pack").val();
  var PreDict = $("#PreDict").val();

  let formData = new FormData();
  formData.append("funcion", "ValidarEmpr");
  formData.append("User", User);
  formData.append("Pass", Pass);
  formData.append("pack", pack);
  formData.append("PreDict", PreDict);

  try {
    let req2 = await fetch("/vetting/include/controller.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();

    if (res2.success === "ok") {
      Swal.fire({
        icon: "success",
        text: "Bienvenido.",
      });
      if (res2.idTbRoles === 3) {
        const urlRedireccion = `/vetting/modules/principal.php?p=DashEmp/index`;
        window.location.href = urlRedireccion;
      } else {
        const urlRedireccion = `/vetting/modules/principal.php?p=DashVet/index`;
        window.location.href = urlRedireccion;
      }
    } else {
      Swal.fire({
        icon: "error",
        text: "Error al ingresar",
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

