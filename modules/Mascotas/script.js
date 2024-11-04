function updatePorcentaje(slider) {
  let porcentaje = slider.value;
  document.getElementById("porcentaje").textContent = porcentaje + "%";
  slider.style.backgroundSize = porcentaje + "% 100%";
}

window.onload = function () {
  let slider = document.getElementById("agresividad");
  updatePorcentaje(slider);
};

function updateFileName() {
  const input = document.getElementById("MascoFotoInput");
  const fileName = input.files.length > 0 ? input.files[0].name : "";
  document.getElementById("MascoFotoNombre").value = fileName;
}

function ModalInsertMascota() {
  $("#insertMascota").modal("show");
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

generarMascoIdChip();
async function generarMascoIdChip() {
  let formData = new FormData();
  formData.append("funcion", "generarMascoIdChip");
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

listMascotas();

async function listMascotas() {
  let formData = new FormData();
  formData.append("funcion", "listMascotas");
  formData.append("UsuCod", $("#UsuCod").val());

  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.text();
    $("#listMascotas").html(res2);
    $("#tbMascotas").DataTable();
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

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
  var UsuCod = $("#UsuCod").val();
  var Estado = "1"; //Activo

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
      icon: "error",
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

  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
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
      listMascotas();

      // Limpiar campos del formulario y desmarcar checkboxes
      // $("#NomPropietarios").val("");
      // $("#IdentPropietarios").val("");
      // $("#TelPropietarios").val("");
      // $("#DirPropietarios").val("");
      // $("#EmailPropietarios").val("");
      // $("#UsuPropietarios").val("");
      // $("#PassPropietarios").val("");
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

async function ChangeEstMasco(idMasco, chip, Est) {
  Swal.fire({
    icon: "info",
    text: "¿Quieres cambiar de estado?",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
  }).then(async (result) => {
    if (result.isConfirmed) {
      let formData = new FormData();
      formData.append("funcion", "ChangeEstMasco");
      formData.append("idMasco", idMasco);
      formData.append("chip", chip);
      formData.append("Est", Est);

      try {
        let req2 = await fetch(
          "/vetting/modules/Mascotas/controller/controller.php",
          {
            method: "POST",
            body: formData,
          }
        );
        let res2 = await req2.text();
        Swal.fire({
          icon: "success",
          text: `Estado Actualizado...!`,
        });
        listMascotas();
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

async function HistorialMasco(IdMasco) {
  $("#HistorialMasco").modal("show");
  let formData = new FormData();
  formData.append("funcion", "HistorialMasco");
  formData.append("IdMasco", IdMasco);
  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();

    // Limpiar el contenido del modal antes de agregar los nuevos datos
    let ContMascotas = document.getElementById("InfoHistorial");
    ContMascotas.innerHTML = ""; // Limpia el contenido previo

    let hc = document.getElementById("Hc");
    hc.innerHTML = "Historial Clínico" + " - " + res2[0]["MascoNom"];

    // Verificar si hay más de 3 registros para agregar scroll
    if (res2.length > 3) {
      ContMascotas.style.maxHeight = "400px"; // Ajusta el tamaño máximo del contenedor
      ContMascotas.style.overflowY = "auto"; // Activa el scroll vertical
    } else {
      ContMascotas.style.maxHeight = "none"; // Si hay 3 o menos, sin límite
      ContMascotas.style.overflowY = "visible"; // Sin scroll
    }

    // Iterar sobre la respuesta para mostrar los nuevos datos
    res2.forEach((item) => {
      ContMascotas.innerHTML += `
        <section class="row">
          <section class="col-md-12">
            <div class="card custom-card">
              <div class="card-header">
              <div class="header">
                <div>
                  <p class="card-text" style="text-align:left; color:black; margin: 0;">${
                    item["OptNombre"]
                  } - <b>Dr. ${item["Doctor"]}</b></p>
                  <p class="card-text" style="text-align:left; color:black; margin: 0;">${
                    item["CitaDate"]
                  }</p>              
                </div>
          ${
            item["HisAdj"]
              ? `
              <div>
                <button class="btn btn-danger btn-sm title" onclick="OpenDiag('${item["MascoCod"]}','${item["HisAdj"]}')">
                  <i class="fa-solid fa-file-pdf"></i>
                </button>
              </div>`
              : ""
          }
            </div>
               
              </div>

              <div class="card-body">
                <div style="text-align:left;">
                  <p class="card-text" style="text-align:left; color:black;">
                    <b>Observaciones:</b> <br> ${item["HisObserv"]}
                  </p>
                </div>
              </div>
            </div>
          </section>
        </section>
      `;
    });
  } catch (error) {
    $("#HistorialMasco").modal("hide");
    Swal.fire({
      icon: "info",
      title: "Upss!!",
      text: `No hay Historial para esta mascota`,
    });
    console.log(error);
  }
}

//FUNCIONES PARA EDITAR MASCOTA
function EditMascoFecNaci() {
  let EditMascoFecNaci = document.getElementById("EditMascoFecNaci").value;
  let birthDate = new Date(EditMascoFecNaci);
  let currentDate = new Date();
  let years = currentDate.getFullYear() - birthDate.getFullYear();
  let months = currentDate.getMonth() - birthDate.getMonth();

  if (months < 0) {
    years--;
    months += 12;
  }

  document.getElementById(
    "EditMascoEdad"
  ).value = `${years} años y ${months} meses`;
}

function EditUpdateFileName() {
  const Editinput = document.getElementById("EditMascoFotoInput");
  const EditfileName =
    Editinput.files.length > 0 ? Editinput.files[0].name : "";
  document.getElementById("EditMascoFotoNombre").value = EditfileName;
}

// Escuchar el evento cuando se oculta el modal, para vaciar el Form
const EditMascoModal = document.getElementById("EditMasco");
EditMascoModal.addEventListener("hidden.bs.modal", function () {
  document.getElementById("EditMascoNom").value = "";
  document.getElementById("EditMascoFecNaci").value = "";
  document.getElementById("EditMascoEdad").value = "";
  document.getElementById("EditMascoFotoNombre").value = "";
  document.getElementById("EditMascoFotoInput").value = ""; // Limpiar el input file
});

async function EditDataMasco(IdMasco) {
  $("#EditMasco").modal("show");
  let formData = new FormData();
  formData.append("funcion", "EditDataMasco");
  formData.append("IdMasco", IdMasco);

  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();
    let IdMasco = document.getElementById("IdMascoEdit");
    IdMasco.value = res2[0]["idtbMascotas"];
    let nomMasco = document.getElementById("EditMascoNom");
    nomMasco.value = res2[0]["MascoNom"];
    let FechNaciMasco = document.getElementById("EditMascoFecNaci");
    FechNaciMasco.value = res2[0]["MascoFechNac"];
    let EdadMasco = document.getElementById("EditMascoEdad");
    EdadMasco.value = res2[0]["Edad"];
  } catch {
    Swal.fire({
      icon: "error",
      text: "Problema del Servidor",
    });
  }
}

async function SaveEditMasco() {
  //Separamos el año y el mes de la edad
  var MascoEdad = $("#EditMascoEdad").val();
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
  var IdMascoEdit = $("#IdMascoEdit").val();
  var EditMascoNom = $("#EditMascoNom").val();
  var EditMascoFecNaci = $("#EditMascoFecNaci").val();
  var EditMascoFoto = $("#EditMascoFotoInput").get(0).files[0];
  var UsuCod = $("#UsuCod").val();

  let formData = new FormData();
  formData.append("funcion", "SaveEditMasco");
  formData.append("IdMascoEdit", IdMascoEdit);
  formData.append("EditMascoNom", EditMascoNom);
  formData.append("EditMascoFecNaci", EditMascoFecNaci);
  formData.append("EditMascoYear", MascoYear);
  formData.append("EditMascoMes", MascoMes);
  formData.append("EditMascoFoto", EditMascoFoto);
  // formData.append("UsuCod", UsuCod);

  try {
    let req2 = await fetch(
      "/vetting/modules/Mascotas/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();
    $("#EditMasco").modal("hide");
    if (res2 === true) {
      Swal.fire({
        icon: "success",
        text: "Mascota Actualizada Correctamente...!",
      });
      listMascotas();
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
function OpenDiag(UsuCod, adj) {
  window.open(
    "/vetting/asset/documentacion/empresa/historiasClinicas/" + UsuCod + "/" + adj,
    "ventana1",
    "w idth=600,height=500,scrollbars=NO"
  );
}
