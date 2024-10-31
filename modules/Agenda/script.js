async function GetMasco(btn) {
  var originalContent = btn.innerHTML;
  // Cambiar el texto del botón a "Generando..."
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

  var MacoCod = $("#MacoCod").val();
  let formData = new FormData();
  formData.append("funcion", "GetMasco");
  formData.append("MacoCod", MacoCod);
  try {
    let req2 = await fetch(
      "/vetting/modules/Agenda/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();
    if (res2.cod === 1) {
      var fechaNaci = res2.data.MascoFechNac;
      var MascoEdad = calcularEdad(fechaNaci);
      var MascoAgresion = res2.data.MascoAgresion;
      console.log(MascoEdad);
      $("#idtbMascotas").val(res2.data.idtbMascotas);
      $("#MascoNom").val(res2.data.MascoNom);
      $("#MascoFechNac").val(res2.data.MascoFechNac);
      $("#EspeNom").val(res2.data.EspeNom);
      $("#MascoEdad").val(MascoEdad);
      $("#RazNom").val(res2.data.RazNom);
      $("#MascoPelaje").val(res2.data.MascoPelaje);

      // Selecciona la barra de progreso
      var barra = document.getElementById("barraAgresion");
      // Actualiza el estilo de la barra para reflejar el porcentaje
      barra.style.width = MascoAgresion + "%";
      // Actualiza el valor aria-valuenow para accesibilidad
      barra.setAttribute("aria-valuenow", MascoAgresion);

      //datos Propietario
      $("#UsuNom").val(res2.data.UsuNom);
      $("#UsuCC").val(res2.data.UsuCC);
      $("#UsuCel").val(res2.data.UsuCel);
      $("#UsuDirec").val(res2.data.UsuDirec);
      btn.innerHTML = originalContent;
    } else {
      Swal.fire({
        icon: "info",
        text: `No se Encuentra ese Documento en el sistema`,
      });
      btn.innerHTML = originalContent;
    }
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

function calcularEdad(fechaNaciStr) {
  var fechaNaci = new Date(fechaNaciStr); // Convierte la cadena de fecha a un objeto Date
  var fechaActual = new Date(); // Obtiene la fecha actual

  // Calcula la diferencia en años
  var years = fechaActual.getFullYear() - fechaNaci.getFullYear();

  // Calcula la diferencia en meses
  var months = fechaActual.getMonth() - fechaNaci.getMonth();

  // Si el mes actual es menor que el mes de nacimiento, resta 1 año y ajusta los meses
  if (months < 0) {
    years--;
    months = 12 + months; // Corrige la diferencia de meses
  }

  // Verifica si los días hacen que debamos ajustar los meses
  var days = fechaActual.getDate() - fechaNaci.getDate();
  if (days < 0) {
    months--;
    if (months < 0) {
      months = 11;
      years--;
    }
  }

  // Retorna el resultado en el formato "X años - Y meses"
  return `${years} años - ${months} meses`;
}

async function CalculeFin() {
  // Capturar la fecha con hora de CitaDate
  var CitaDate = $("#CitaDate").val();

  // Convertir la fecha en un objeto Date
  var fechaInicio = new Date(CitaDate);

  // Verificar si la fecha es válida
  if (!isNaN(fechaInicio.getTime())) {
    // Aumentar 30 minutos
    fechaInicio.setMinutes(fechaInicio.getMinutes() + 30);

    // Formatear la fecha para que coincida con el formato de la entrada de fecha
    var year = fechaInicio.getFullYear();
    var month = ("0" + (fechaInicio.getMonth() + 1)).slice(-2); // Mes en formato 2 dígitos
    var day = ("0" + fechaInicio.getDate()).slice(-2); // Día en formato 2 dígitos
    var hours = ("0" + fechaInicio.getHours()).slice(-2); // Horas en formato 2 dígitos
    var minutes = ("0" + fechaInicio.getMinutes()).slice(-2); // Minutos en formato 2 dígitos

    // Crear una cadena con el formato correcto
    var fechaFin = `${year}-${month}-${day}T${hours}:${minutes}`;

    // Asignar el nuevo valor al campo CitaDateFin
    $("#CitaDateFin").val(fechaFin);
  } else {
    console.log("Fecha inválida");
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
  });
  calendar.render();
}
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
async function InsertAgen() {
  var idtbMascotas = $("#idtbMascotas").val();
  var CitaNom = $("#CitaNom").val();
  var CitaDate = $("#CitaDate ").val();
  var CitaDateFin = $("#CitaDateFin").val();
  var CitaObs = $("#CitaObs").val();
  var Emp = $("#Emp").val();
  var UsuCod = $("#UsuCod").val();
  var idTbServicios = $("#idTbServicios").val();
  var citaPre = $("#citaPre").val();

  let formData = new FormData();
  formData.append("funcion", "InsertAgen");
  formData.append("idtbMascotas", idtbMascotas);
  formData.append("CitaNom", CitaNom);
  formData.append("CitaDate", CitaDate);
  formData.append("CitaDateFin", CitaDateFin);
  formData.append("CitaObs", CitaObs);
  formData.append("Emp", Emp);
  formData.append("UsuCod", UsuCod);
  formData.append("idTbServicios", idTbServicios);
  formData.append("citaPre", citaPre);

  try {
    let req2 = await fetch(
      "/vetting/modules/Agenda/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();
    if (res2.cod === 1) {
      var icon = "success";
    } else {
      var icon = "info";
    }
    Swal.fire({
      icon: icon,
      text: res2.msm,
    });
    if (res2.cod === 1) {
      $("#CrearAgenda").modal("hide");
      citasHoy();
      PintarCalen();
    }
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
