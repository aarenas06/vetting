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
        listEmpresa();
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

async function ModalPdf(Archivo, Emp) {
  var Url = `/vetting/asset/documentacion/${Emp}/contratos/${Archivo}`;
  console.log(Url);
  document.getElementById(
    "viewPdf"
  ).innerHTML = `<iframe src="${Url}" style="width: 100%; height: 500px;" frameborder="0"></iframe>`;
}

function OpenNewPla(IdEmp, NameEmpreNew) {
  $("#IdEmpreNew").val(IdEmp);
  $("#NameEmpreNew").val(NameEmpreNew);
}

async function BuyNewPlan() {
  var PlanSelectNew = $("#PlanSelectNew").val();
  var IdEmpreNew = $("#IdEmpreNew").val();
  var NomEmpre = $("#NameEmpreNew").val();
  var UsuCod = $("#UsuCod").val();

  var EmpreContr = document.getElementById("EmpreContrNew");
  // Validar que los campos no estén vacíos
  if (!PlanSelectNew || !IdEmpreNew) {
    Swal.fire({
      icon: "info",
      text: "Todos los campos deben estar llenos.",
    });
    return;
  }

  // Validar que el archivo esté adjunto y sea un PDF
  if (EmpreContr.files.length === 0) {
    Swal.fire({
      icon: "info",
      text: "Sebe adjuntar un archivo.",
    });
    return;
  } else {
    var file = EmpreContr.files[0]; // Obtener el archivo adjunto
    var fileType = file.type; // Obtener el tipo MIME del archivo

    if (fileType !== "application/pdf") {
      Swal.fire({
        icon: "info",
        text: "Solo se permiten archivos PDF.",
      });
      return;
    }
  }

  let formData = new FormData();
  formData.append("funcion", "BuyNewPlan");
  formData.append("PlanSelectNew", PlanSelectNew);
  formData.append("IdEmpreNew", IdEmpreNew);
  formData.append("EmpreContr", EmpreContr.files[0]);
  formData.append("NomEmpre", NomEmpre);
  formData.append("UsuCod", UsuCod);

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
      text: "Plan Actualizado",
    });
    listEmpresa();
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}
