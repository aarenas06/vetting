async function InsertEmpl(button) {
  var originalContent = button.innerHTML;
  // Cambiar el texto del botón a "Generando..."
  button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

  var EmplNom = $("#EmplNom").val();
  var EmplApel = $("#EmplApel").val();
  var EmplCc = $("#EmplCc").val();
  var EmplEmail = $("#EmplEmail").val();
  var EmplRol = $("#EmplRol").val();
  var EmplCelu = $("#EmplCelu").val();
  var Emp = $("#Emp").val();
  var UsuCod = $("#UsuCod").val();

  var EmpSex = $("#EmpSex").val();
  var EmplAdjCel = document.getElementById("EmplAdjCel");

  if (
    EmplNom === "" ||
    EmplApel === "" ||
    EmplCc === "" ||
    EmplEmail === "" ||
    EmplRol === "" ||
    EmplCelu === "" ||
    Emp === "" ||
    EmpSex === ""
  ) {
    Swal.fire({
      icon: "error",
      title: "Campos Vacíos",
      text: "Todos los campos deben ser llenados.",
    });
    button.innerHTML = originalContent;

    return;
  }

  if (EmplAdjCel.files.length === 0) {
    Swal.fire({
      icon: "info",
      title: "Ten en cuenta",
      text: "Debes seleccionar un Archivo pdf",
    });
    button.innerHTML = originalContent;

    return;
  }

  let formData = new FormData();
  formData.append("funcion", "InsertEmpl");
  formData.append("EmplNom", EmplNom);
  formData.append("EmplApel", EmplApel);
  formData.append("EmplAdjCel", EmplAdjCel.files[0]);
  formData.append("EmplCc", EmplCc);
  formData.append("EmplEmail", EmplEmail);
  formData.append("EmplRol", EmplRol);
  formData.append("EmplCelu", EmplCelu);
  formData.append("Emp", Emp);
  formData.append("EmpSex", EmpSex);
  formData.append("UsuCod", UsuCod);

  try {
    let req2 = await fetch(
      "/vetting/modules/Empleados/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    Swal.fire({
      icon: "success",
      text: "Personal Registrado",
    });
    $("#insertEmp").modal("hide");
    button.innerHTML = originalContent;
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
    button.innerHTML = originalContent;
  }
}
ListEmp();
async function ListEmp() {
  var Emp = $("#Emp").val();

  let formData = new FormData();
  formData.append("funcion", "ListEmp");
  formData.append("Emp", Emp);

  try {
    let req2 = await fetch(
      "/vetting/modules/Empleados/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();

    $("#ListEmp").html(res2);
    $("#tb1").DataTable();
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
    button.innerHTML = originalContent;
  }
}
async function ChangeEstEmpl(IdEmp, Est) {
  Swal.fire({
    icon: "info",
    text: "¿Enserio Quieres cambiar de estado?",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
  }).then(async (result) => {
    if (result.isConfirmed) {
      let formData = new FormData();
      formData.append("funcion", "ChangeEstEmpl");
      formData.append("IdEmp", IdEmp);
      formData.append("Est", Est);

      try {
        let req2 = await fetch(
          "/vetting/modules/Empleados/controller/controller.php",
          {
            method: "POST",
            body: formData,
          }
        );
        let res2 = await req2.text();
        Swal.fire({
          icon: "success",
          text: `Estado Actualizado`,
        });
        ListEmp();
      } catch (error) {
        Swal.fire({
          icon: "error",
          text: `Problema del Servidor: ${error.message}`,
        });
        console.log(error);
      }
    } else if (result.isDenied) {
    }
  });
}
