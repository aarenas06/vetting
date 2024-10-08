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

listMascotas();

async function listMascotas() {
  let formData = new FormData();
  formData.append("funcion", "listMascotas");
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
  var MascoChip = $("#MascoChip").val();
  var Mascoagresividad = $("#Mascoagresividad").val();
  var MascoPatologia = $("#MascoPatologia").val();
  var MascoFoto = $("#MascoFotoInput").get(0).files[0];
  var UsuCod = $("#UsuCod").val();

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
  formData.append("MascoChip", MascoChip);
  formData.append("Mascoagresividad", Mascoagresividad);
  formData.append("MascoPatologia", MascoPatologia);
  formData.append("MascoFoto", MascoFoto);
  formData.append("UsuCod", UsuCod);

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
      Swal.fire({
        icon: "success",
        text: "Mascota Agregada Correctamente...!",
      });
      $("#insertMascota").modal("hide");
      // listPropietarios();

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

    // Iterar sobre la respuesta para mostrar los nuevos datos
    res2.forEach((item) => {
      ContMascotas.innerHTML += `
      <br>
        <section class="row">
          <section class="col-md-12">
            <div class="card custom-card">
              <div class="card-header">
                <p class="card-text" style="text-align:left; color:black; margin: 0;">${item["OptNombre"]}</p>
                <p class="card-text" style="text-align:left; color:black; margin: 0;">${item["CitaDate"]}</p>
              </div>

              <div class="card-body">
                <div style="text-align:left;">
                  <p class="card-text" style="text-align:left; color:black;">
                    <b>Observaciones:</b> <br> ${item["CitaObs"]}
                  </p>
                </div>
              </div>
            </div>
          </section>
        </section>
      `;
    });
  } catch (error) {
    Swal.fire({
      icon: "info",
      title: "Upss!!",
      text: `No hay Historial para esta mascota`,
    });
    console.log(error);
  }
}
