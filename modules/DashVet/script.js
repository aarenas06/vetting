citasHoy();
async function citasHoy() {
  var Emp = $("#Emp").val();
  var View = $("#View").val();
  var Usucod = $("#UsuCod").val();

  let formData = new FormData();
  formData.append("funcion", "citasHoy");
  formData.append("Emp", Emp);
  formData.append("View", View);
  formData.append("UsuCod", Usucod);

  try {
    let req2 = await fetch(
      "/vetting/modules/Agenda/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    $("#citasHoyFor").html(res2);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
async function PintarCalen() {
  var Emp = $("#Emp").val();
  var UsuCod = $("#UsuCod").val();
  var View = $("#View").val();

  ///1 significa vista de general ----- 2 es dashboard individual

  var calendarEl = document.getElementById("calendar");

  // Crear el formulario y agregar datos
  let formData = new FormData();
  formData.append("funcion", "PintarCalen");
  formData.append("Emp", Emp); // Ejemplo de valor
  formData.append("UsuCod", UsuCod);
  formData.append("View", View);

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    locale: "es",
    headerToolbar: {
      left: "prev,next today", // Botones de navegación
      center: "title", // Título del calendario
      right: "dayGridMonth,timeGridWeek,timeGridDay", // Vistas
    },
    views: {
      timeGridWeek: {
        // Vistas de semana
        titleFormat: {
          year: "numeric",
          month: "short",
          day: "numeric",
        },
      },
      timeGridDay: {
        // Vista de día
        titleFormat: {
          year: "numeric",
          month: "short",
          day: "numeric",
        },
      },
    },
    navLinks: true, // Permite hacer clic en los días o semanas para cambiar la vista
    businessHours: true, // Horas laborales destacadas
    nowIndicator: true, // Indicador de la hora actual
    events: function (fetchInfo, successCallback, failureCallback) {
      // Fetch de eventos como lo tienes ahora
      fetch("/vetting/modules/Agenda/controller/controller.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Error en la respuesta");
          }
          return response.json(); // Obtener la respuesta en JSON
        })
        .then((data) => {
          successCallback(data); // Pasar los eventos a FullCalendar
        })
        .catch((error) => {
          console.error("Error:", error);
          failureCallback(error);
        });
    },
    eventClick: function (info) {
      // Llamamos a la función DataCita pasando el ID del evento
      DataCita(info.event.id);
    },
  });
  calendar.render();
}

async function DataCita(id) {
  let formData = new FormData();
  formData.append("funcion", "DataCita");
  formData.append("id", id);
  $("#MdDesarrollo").modal("show");

  try {
    let req2 = await fetch(
      "/vetting/modules/DashVet/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    $("#DesarrolloCita").html(res2);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    btn.innerHTML = originalContent;
    console.log(error);
  }
}
async function InsertHisto() {
  var HisObserv = $("#HisObserv").val();
  var idTbCitas = $("#idTbCitas").val();
  var UsuCod = $("#UsuCod").val();
  var HisEst = $("#HisEst").val();
  var MascoCod = $("#MacoCod").val();
  var HisAdj = $("#HisAdj")[0].files[0];

  if (HisEst === "" || HisObserv === "") {
    Swal.fire({
      icon: "info",
      text: `Campos con * son obligatorios`,
    });
    return;
  }

  if (HisAdj && HisAdj.type !== "application/pdf") {
    Swal.fire({
      icon: "info",
      text: `Solo Archivos Pdf`,
    });
    return;
  }

  let formData = new FormData();
  formData.append("funcion", "InsertHisto");
  formData.append("idTbCitas", idTbCitas);
  formData.append("HisObserv", HisObserv);
  formData.append("HisAdj", HisAdj);
  formData.append("UsuCod", UsuCod);
  formData.append("MascoCod", MascoCod);
  formData.append("HisEst", HisEst);

  try {
    let req2 = await fetch(
      "/vetting/modules/DashVet/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    Swal.fire({
      icon: "success",
      text: `Agenda Gestionada`,
    });
    $("#MdDesarrollo").modal("hide");
    citasHoy();
    PintarCalen();
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
