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
    $("#tb1").DataTable();
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
async function listPlanes() {
  let formData = new FormData();
  formData.append("funcion", "listPlanes");
  try {
    let req2 = await fetch(
      "/vetting/modules/Planes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.text();
    $("#listPlanes").html(res2);
    $("#tb1").DataTable();
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

  var EmpreContr = document.getElementById("EmpreContr");
  var EmpreAdj = document.getElementById("EmpreAdj");

  if (
    EmpreNom === "" ||
    EmpreNit === "" ||
    EmpreDir === "" ||
    EmpreRepre === "" ||
    EmpreRepreCC === "" ||
    EmpreRepreTel === "" ||
    PlanSelect === ""
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
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}
