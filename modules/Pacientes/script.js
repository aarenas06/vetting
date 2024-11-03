async function SearchPropi() {
  var CC = $("#CC").val();
  let formData = new FormData();
  formData.append("funcion", "SearchPropi");
  formData.append("CC", CC);
  try {
    let req2 = await fetch(
      "/vetting/modules/Pacientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();
    if (res2.cod === 1) {
      $("#resUser").text(res2.data.UsuNom);
      $("#IdPropietario").val(res2.data.idTbUsuarios);
    } else {
      $("#resUser").text("");
      $("#IdPropietario").val("");
      Swal.fire({
        icon: "info",
        text: "No se encuentra Usuario",
      });
    }
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}
function ModalInsertMascota() {
  $("#insertMascota").modal("show");
}

async function InsertMascota() {
  //Separamos el año y el mes de la edad
  var MascoEdad = $("#MascoEdad").val();
  var regex = /(\d+)\s*años\s*y\s*(\d+)\s*meses/;
  var match = MascoEdad.match(regex);

  if (match) {
    var anos = match[1];
    var meses = match[2];

    var MascoYear = anos;
    var MascoMes = meses;
  } else {
    console.log("Formato no válido");
  }

  var MascoFecNaci = $("#MascoFecNaci").val();
  var MascoNom = $("#MascoNom").val();
  var MascoSexo = $("#MascoSexo").val();
  var MascoPelaje = $("#MascoPelaje").val();
  var MascoComida = $("#MascoComida").val();
  var MascoCelo = $("#MascoCelo").val();
  var MascoAdopcion = $("#MascoAdopcion").val();
  var MascoEspecie = $("#MascoEspecie").val();
  var MascoRaza = $("#MascoRaza").val();
  var MascoPeso = $("#MascoPeso").val();
  var MascoVivienda = $("#MascoVivienda").val();
  var MascoCod = $("#MascoCod").val();
  var MascoChip = $("#MascoChip").val();
  var Mascoagresividad = $("#Mascoagresividad").val();
  var MascoPatologia = $("#MascoPatologia").val();
  var MascoFoto = $("#MascoFotoInput").get(0).files[0];
  var UsuCod = $("#IdPropietario").val();
  var Estado = "1"; //Activo
  var Emp = $("#Emp").val();

  if (UsuCod === "") {
    Swal.fire({
      icon: "info",
      text: "Diligencie un usuario Valido",
    });
  }

  //Validación si los hay campos vacios
  if (
    MascoFecNaci == "" ||
    MascoNom == "" ||
    MascoSexo == "" ||
    MascoEspecie == "" ||
    MascoRaza == "" ||
    Mascoagresividad == "" ||
    MascoFoto == ""
  ) {
    Swal.fire({
      icon: "info",
      text: "Todos los campos deben ser diligenciados...!",
    });
    return;
  }

  let formData = new FormData();
  formData.append("funcion", "InsertMascota");
  formData.append("MascoNom", MascoNom);
  formData.append("MascoFecNaci", MascoFecNaci);
  formData.append("MascoYear", MascoYear);
  formData.append("MascoMes", MascoMes);
  formData.append("MascoSexo", MascoSexo);
  formData.append("MascoPelaje", MascoPelaje);
  formData.append("MascoComida", MascoComida);
  formData.append("MascoCelo", MascoCelo);
  formData.append("MascoAdopcion", MascoAdopcion);
  formData.append("MascoEspecie", MascoEspecie);
  formData.append("MascoRaza", MascoRaza);
  formData.append("MascoPeso", MascoPeso);
  formData.append("MascoVivienda", MascoVivienda);
  formData.append("MascoCod", MascoCod);
  formData.append("MascoChip", MascoChip);
  formData.append("Mascoagresividad", Mascoagresividad);
  formData.append("MascoPatologia", MascoPatologia);
  formData.append("MascoFoto", MascoFoto);
  formData.append("UsuCod", UsuCod);
  formData.append("Estado", Estado);
  formData.append("Emp", Emp);

  try {
    let req2 = await fetch(
      "/vetting/modules/Pacientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();
    if (res2 === true) {
      $("#insertMascota").modal("hide");
      Swal.fire({
        icon: "success",
        text: "Mascota Agregada Correctamente...!",
      });
      ListPaciente();
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

//CALCULAMOS LA EDAD DE LA MASCOTA EN EL MODAL
function MascoFecNaci() {
  let MascoFecNaci = document.getElementById("MascoFecNaci").value;
  let birthDate = new Date(MascoFecNaci);
  let currentDate = new Date();
  let years = currentDate.getFullYear() - birthDate.getFullYear();
  let months = currentDate.getMonth() - birthDate.getMonth();

  if (months < 0) {
    years--;
    months += 12;
  }

  document.getElementById(
    "MascoEdad"
  ).value = `${years} años y ${months} meses`;
}

function updateFileName() {
  const input = document.getElementById("MascoFotoInput");
  const fileName = input.files.length > 0 ? input.files[0].name : "";
  document.getElementById("MascoFotoNombre").value = fileName;
}
function updatePorcentaje(slider) {
  let porcentaje = slider.value;
  document.getElementById("porcentaje").textContent = porcentaje + "%";
  slider.style.backgroundSize = porcentaje + "% 100%";
}

window.onload = function () {
  let slider = document.getElementById("agresividad");
  updatePorcentaje(slider);
};
async function selectRaza() {
  let formData = new FormData();
  formData.append("funcion", "selectRaza");
  formData.append("MascoEpecie", $("#MascoEpecie").val());

  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();

    let selectElement = document.getElementById("MascoRaza");
    selectElement.innerHTML = "";

    let defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.textContent = "Seleccione...";
    defaultOption.disabled = true;
    defaultOption.selected = true;
    selectElement.appendChild(defaultOption);

    // Recorrer res2 y agregar cada opción al select
    res2.forEach((item) => {
      let option = document.createElement("option");
      option.value = item.idTbRazas; // Establece el valor de la opción
      option.textContent = item.RazNom; // Texto visible de la opción

      selectElement.appendChild(option);
    });
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
generarMascoCod();
async function generarMascoCod() {
  let formData = new FormData();
  formData.append("funcion", "generarMascoCod");
  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();
    let codigo = document.getElementById("MascoCod");
    codigo.value = res2["codigo"];
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
async function generarMascoCod() {
  let formData = new FormData();
  formData.append("funcion", "generarMascoCod");
  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();
    let codigo = document.getElementById("MascoChip");
    codigo.value = res2["codigo"];
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
ListPaciente();
async function ListPaciente() {
  var Emp = $("#Emp").val();
  let formData = new FormData();
  formData.append("funcion", "ListPaciente");
  formData.append("Emp", Emp);
  try {
    let req2 = await fetch(
      "/vetting/modules/Pacientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    $("#tbPaciente").html(res2);
    $("#tb1").DataTable();
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}
async function HistoricoMd(idMasco) {
  var Emp = $("#Emp").val();
  let formData = new FormData();
  formData.append("funcion", "HistoricoMd");
  formData.append("Emp", Emp);
  formData.append("idMasco", idMasco);
  try {
    let req2 = await fetch(
      "/vetting/modules/Pacientes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    $("#tbHistoria").html(res2);
    $("#tb2").DataTable();
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}
function OpenPdf(Adj, Mascod) {
  var Ruta = `/vetting/asset/documentacion/empresa/historiasClinicas/${Mascod}/${Adj}`;
  var pdfEmbed = `<embed src="${Ruta}" type="application/pdf" width="100%" height="600px" />`;
  $("#viewPdf").html(pdfEmbed);
}
