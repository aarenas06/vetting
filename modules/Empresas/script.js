listEmpresa();
async function listEmpresa() {
  let formData = new FormData();
  formData.append("funcion", "listEmpresa");
  try {
    let req2 = await fetch(
      "/vetting/modules/Empresas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.text();
    $("#listEmpresa").html(res2);
    $("#tb2").DataTable();
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

async function InsertEmp() {
  var EmpreNom = $("#EmpreNom").val();
  var EmpreNit = $("#EmpreNit").val();
  var EmpreDir = $("#EmpreDir").val();
  var EmpreRepre = $("#EmpreRepre").val();
  var EmpreRepreCC = $("#EmpreRepreCC").val();
  var EmpreRepreTel = $("#EmpreRepreTel").val();
  var PlanSelect = $("#PlanSelect").val();
  var UsuCod = $("#UsuCod").val();
  var EmpreEmail = $("#EmpreEmail").val();

  var EmpreContr = document.getElementById("EmpreContr");
  var EmpreAdj = document.getElementById("EmpreAdj");

  if (
    EmpreNom === "" ||
    EmpreNit === "" ||
    EmpreDir === "" ||
    EmpreRepre === "" ||
    EmpreRepreCC === "" ||
    EmpreRepreTel === "" ||
    PlanSelect === "" ||
    EmpreEmail === ""
  ) {
    Swal.fire({
      icon: "error",
      title: "Campos Vacíos",
      text: "Todos los campos deben ser llenados.",
    });
    return;
  }

  if (EmpreContr.files.length === 0 || EmpreAdj.files.length === 0) {
    Swal.fire({
      icon: "info",
      title: "Ten en cuenta",
      text: "Debes seleccionar un Archivo pdf",
    });
    return;
  }

  let formData = new FormData();
  formData.append("funcion", "InsertEmp");
  formData.append("EmpreNom", EmpreNom);
  formData.append("EmpreNit", EmpreNit);
  formData.append("EmpreAdj", EmpreAdj.files[0]);
  formData.append("EmpreDir", EmpreDir);
  formData.append("EmpreRepre", EmpreRepre);
  formData.append("EmpreRepreCC", EmpreRepreCC);
  formData.append("EmpreRepreTel", EmpreRepreTel);
  formData.append("EmpreContr", EmpreContr.files[0]);
  formData.append("PlanSelect", PlanSelect);
  formData.append("UsuCod", UsuCod);
  formData.append("EmpreEmail", EmpreEmail);

  try {
    let req2 = await fetch(
      "/vetting/modules/Empresas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    Swal.fire({
      icon: "success",
      text: "Empresa Registrada",
    });
    $("#insertEmpresa").modal("hide");
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}
async function ChangeEstEmp(IdEmp, Est) {
  Swal.fire({
    icon: "info",
    text: "¿Enserio Quieres cambiar de estado?",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
  }).then(async (result) => {
    if (result.isConfirmed) {
      let formData = new FormData();
      formData.append("funcion", "ChangeEstEmp");
      formData.append("IdEmp", IdEmp);
      formData.append("Est", Est);

      try {
        let req2 = await fetch(
          "/vetting/modules/Empresas/controller/controller.php",
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
        listPlanes();
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
