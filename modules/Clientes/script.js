listPropietarios();
async function listPropietarios() {
  var Emp = $("#Emp").val();

  let formData = new FormData();
  formData.append("funcion", "listPropietarios");
  formData.append("Emp", Emp);
  try {
    let req2 = await fetch(
      "/vetting/modules/Clientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

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

//funcion para ver la clave en el model de insertar Clientes
document
  .getElementById("togglePassword")
  .addEventListener("click", function () {
    const passwordInput = document.getElementById("PassPropietarios");

    // Verificar el tipo actual del input
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      this.textContent = "Ocultar"; // Cambiar el texto del botón
    } else {
      passwordInput.type = "password";
      this.textContent = "Mostrar"; // Cambiar el texto del botón
    }
  });

async function InsertPropietarios() {
  var NomPropietarios = $("#NomPropietarios").val();
  var IdentPropietarios = $("#IdentPropietarios").val();
  var TelPropietarios = $("#TelPropietarios").val();
  var DirPropietarios = $("#DirPropietarios").val();
  var EmailPropietarios = $("#EmailPropietarios").val();

  var SexPro = $("#SexPro").val();
  var Emp = $("#Emp").val();

  if (
    NomPropietarios === "" ||
    IdentPropietarios === "" ||
    TelPropietarios === "" ||
    DirPropietarios === "" ||
    SexPro === ""
  ) {
    // Mostrar un mensaje de error
    Swal.fire({
      icon: "info",
      text: "campos obligatorios.!",
    });
    return;
  }

  let formData = new FormData();
  formData.append("funcion", "InsertPropietarios");
  formData.append("NomPropietarios", NomPropietarios);
  formData.append("UsuSex", SexPro);
  formData.append("IdentPropietarios", IdentPropietarios);
  formData.append("TelPropietarios", TelPropietarios);
  formData.append("DirPropietarios", DirPropietarios);
  formData.append("EmailPropietarios", EmailPropietarios);
  formData.append("Emp", Emp);

  formData.append("Rol", "2");

  try {
    let req2 = await fetch(
      "/vetting/modules/Clientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();
    if (res2 === true) {
      Swal.fire({
        icon: "success",
        text: "Propietario Agregado Correctamente...!",
      });
      $("#insertPropietarios").modal("hide");
      listPropietarios();

      // Limpiar campos del formulario y desmarcar checkboxes
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
        text: "Problema del Servidor",
      });
    }
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}

async function GetDataPropietarios(idUsuario, idRol) {
  let formData = new FormData();
  formData.append("funcion", "GetDataPropietarios");
  formData.append("idUsuario", idUsuario);
  formData.append("idRol", idRol);

  try {
    let req2 = await fetch(
      "/vetting/modules/Clientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();

    let UptIdUsuario = document.getElementById("UptIdUsuario");
    UptIdUsuario.value = idUsuario;

    let UpIdtRol = document.getElementById("UpIdtRol");
    UpIdtRol.value = idRol;

    // Acceder al input por su ID y asignar el valor correctamente
    let NomPropietarios = document.getElementById("UptNomPropietarios");
    NomPropietarios.value = res2[0].UsuNom;

    let IdentPropietarios = document.getElementById("UptIdentPropietarios");
    IdentPropietarios.value = res2[0].UsuCC;

    let TelPropietarios = document.getElementById("UptTelPropietarios");
    TelPropietarios.value = res2[0].UsuCel;

    let DirPropietarios = document.getElementById("UptDirPropietarios");
    DirPropietarios.value = res2[0].UsuDirec;

    let EmailPropietarios = document.getElementById("UptEmailPropietarios");
    EmailPropietarios.value = res2[0].UsuEmail;

    let UsuPropietarios = document.getElementById("UptUsuPropietarios");
    UsuPropietarios.value = res2[0].UsuUser;

    let PassPropietarios = document.getElementById("UptPassPropietarios");
    PassPropietarios.value = res2[0].UsuCla;
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

//funcion para ver la clave en el model de Update Clientes
document
  .getElementById("togglePasswordUpt")
  .addEventListener("click", function () {
    const passwordInput = document.getElementById("UptPassPropietarios");

    // Verificar el tipo actual del input
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      this.textContent = "Ocultar"; // Cambiar el texto del botón
    } else {
      passwordInput.type = "password";
      this.textContent = "Mostrar"; // Cambiar el texto del botón
    }
  });

async function UpdatePropietarios() {
  var UptNomPropietarios = $("#UptNomPropietarios").val();
  var UptIdentPropietarios = $("#UptIdentPropietarios").val();
  var UptTelPropietarios = $("#UptTelPropietarios").val();
  var UptDirPropietarios = $("#UptDirPropietarios").val();
  var UptEmailPropietarios = $("#UptEmailPropietarios").val();
  var UptUsuPropietarios = $("#UptUsuPropietarios").val();
  var UptPassPropietarios = $("#UptPassPropietarios").val();
  var UptIdUsuario = $("#UptIdUsuario").val();
  var UpIdtRol = $("#UpIdtRol").val();

  let formData = new FormData();
  formData.append("funcion", "UpdatePropietarios");
  formData.append("UptNomPropietarios", UptNomPropietarios);
  formData.append("UptIdentPropietarios", UptIdentPropietarios);
  formData.append("UptTelPropietarios", UptTelPropietarios);
  formData.append("UptDirPropietarios", UptDirPropietarios);
  formData.append("UptEmailPropietarios", UptEmailPropietarios);
  formData.append("UptUsuPropietarios", UptUsuPropietarios);
  formData.append("UptPassPropietarios", UptPassPropietarios);
  formData.append("UptIdUsuario", UptIdUsuario);
  formData.append("UpIdtRol", UpIdtRol);

  try {
    let req2 = await fetch(
      "/vetting/modules/Clientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();
    if (res2 === true) {
      Swal.fire({
        icon: "success",
        text: "Propietario Actualizado Correctamente...!",
      });
      $("#ModalUpdatePropietarios").modal("hide");
      listPropietarios();

      // Limpiar campos del formulario y desmarcar checkboxes
      $("#UptNomPropietarios").val("");
      $("#UptIdentPropietarios").val("");
      $("#UptTelPropietarios").val("");
      $("#UptDirPropietarios").val("");
      $("#UptEmailPropietarios").val("");
      $("#UptUsuPropietarios").val("");
      $("#UptPassPropietarios").val("");
    } else {
      Swal.fire({
        icon: "error",
        text: "Problema del Servidor",
      });
    }
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}

async function DeletePropietarios(idUsuario) {
  // Mostrar el cuadro de confirmación
  const result = await Swal.fire({
    title: "ADVERTENCIA!",
    text: "¿Estás seguro de eliminar al Propietario?",
    icon: "warning",
    showCancelButton: true, // Mostrar botón de cancelar
    confirmButtonColor: "#d33", // Color del botón de confirmación
    cancelButtonColor: "#3085d6", // Color del botón de cancelar
    confirmButtonText: "Sí, eliminar!",
    cancelButtonText: "No, cancelar",
  });

  // Si el usuario confirma
  if (result.isConfirmed) {
    try {
      let formData = new FormData();
      formData.append("funcion", "DeletePropietarios");
      formData.append("idUsuario", idUsuario);

      let req = await fetch(
        "/vetting/modules/Clientes/controller/controller.php",
        {
          method: "POST",
          body: formData,
        }
      );

      let res = await req.json();
      console.log(res);
      if (res === true) {
        Swal.fire({
          icon: "success",
          title: "Eliminado!",
          text: "El Propietario ha sido eliminado exitosamente..!.",
        });
        // Actualiza la tabla principal de Clientes
        listPropietarios();
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Hubo un problema al intentar eliminar el Propietario.",
        });
      }
    } catch (error) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: `Hubo un problema con la solicitud: ${error.message}`,
      });
    }
  } else {
    Swal.fire({
      icon: "info",
      title: "Cancelado",
      text: "La eliminación del Propietario ha sido cancelada.",
    });
  }
}
