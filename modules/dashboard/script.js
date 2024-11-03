let myChart; // Variable global para almacenar el gráfico
let myChart2; // Variable global para almacenar el gráfico 2
let myChart4; // Variable global para almacenar el gráfico 2
const labels = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre",
]; // Etiquetas de los meses

Grafic1();
Grafic2();
Grafic3();
Grafic4();
async function Grafic1() {
  var Emp = $("#Emp").val();
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  let formData = new FormData();
  formData.append("funcion", "Grafic1");
  formData.append("Emp", Emp);
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch(
      "/vetting/modules/dashboard/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json(); // Obtener la respuesta en JSON
    console.log(res2);

    // Procesar los datos para los datasets
    const labels = [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ];

    // Crear arrays con los valores inicializados en 0 para cada mes
    const citasAgendadas = new Array(12).fill(0);
    const citasEjecutadas = new Array(12).fill(0);
    const citasRechazadas = new Array(12).fill(0);

    // Actualizar los valores de 'Citas Agendadas' y 'Citas Ejecutadas' basados en la respuesta del servidor
    res2.Agen.forEach((item) => {
      const mesIndex = labels.findIndex((mes) => mes.startsWith(item.Mes)); // Encontrar el índice del mes
      if (mesIndex !== -1) {
        citasAgendadas[mesIndex] = item.C; // Asignar el valor correspondiente
      }
    });

    res2.Eje.forEach((item) => {
      const mesIndex = labels.findIndex((mes) => mes.startsWith(item.Mes)); // Encontrar el índice del mes
      if (mesIndex !== -1) {
        citasEjecutadas[mesIndex] = item.C; // Asignar el valor correspondiente
      }
    });

    // Para 'citasRechazadas' si hay datos
    res2.Recha.forEach((item) => {
      const mesIndex = labels.findIndex((mes) => mes.startsWith(item.Mes)); // Encontrar el índice del mes
      if (mesIndex !== -1) {
        citasRechazadas[mesIndex] = item.C; // Asignar el valor correspondiente
      }
    });

    // Destruir el gráfico anterior si existe
    if (myChart) {
      myChart.destroy();
    }

    // Ahora crear el gráfico con los nuevos datos
    const ctx = document.getElementById("myChart").getContext("2d");

    myChart = new Chart(ctx, {
      type: "line", // Gráfico de líneas
      data: {
        labels: labels, // Etiquetas de los meses
        datasets: [
          {
            label: "Citas Agendadas",
            data: citasAgendadas, // Datos dinámicos de Citas Agendadas
            borderColor: "rgba(75, 192, 192, 1)", // Color de la línea
            borderWidth: 2,
            fill: false, // No rellenar el área debajo de la línea
          },
          {
            label: "Citas Ejecutadas",
            data: citasEjecutadas, // Datos dinámicos de Citas Ejecutadas
            borderColor: "rgba(153, 102, 255, 1)", // Color de la línea
            borderWidth: 2,
            fill: false, // No rellenar el área debajo de la línea
          },
          {
            label: "Citas Rechazadas",
            data: citasRechazadas, // Datos dinámicos de Citas Rechazadas
            borderColor: "red", // Color de la línea
            borderWidth: 2,
            fill: false, // No rellenar el área debajo de la línea
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true, // Asegurar que el eje Y comience en cero
          },
        },
      },
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

async function Grafic2() {
  var Emp = $("#Emp").val();
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  let formData = new FormData();
  formData.append("funcion", "Grafic2");
  formData.append("Emp", Emp);
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch(
      "/vetting/modules/dashboard/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json(); // Obtener la respuesta en JSON
    console.log(res2);

    // Crear un objeto para almacenar las citas de cada empleado
    const citasPorEmpleadoReg = {};
    const citasPorEmpleadoEje = {};

    // Agrupar los datos por mes para 'Reg' (Citas Registradas)
    res2.Reg.forEach((item) => {
      const mesIndex = labels.findIndex((mes) => mes.startsWith(item.Mes)); // Encontrar el índice del mes
      if (mesIndex !== -1) {
        // Si no existe el empleado en el objeto, lo inicializamos
        if (!citasPorEmpleadoReg[item.EmpUsu]) {
          citasPorEmpleadoReg[item.EmpUsu] = new Array(12).fill(0);
        }
        citasPorEmpleadoReg[item.EmpUsu][mesIndex] += item.C; // Sumar el valor de las citas registradas por mes
      }
    });

    // Agrupar los datos por mes para 'Eje' (Citas Ejecutadas)
    res2.Eje.forEach((item) => {
      const mesIndex = labels.findIndex((mes) => mes.startsWith(item.Mes)); // Encontrar el índice del mes
      if (mesIndex !== -1) {
        // Si no existe el empleado en el objeto, lo inicializamos
        if (!citasPorEmpleadoEje[item.EmpUsu]) {
          citasPorEmpleadoEje[item.EmpUsu] = new Array(12).fill(0);
        }
        citasPorEmpleadoEje[item.EmpUsu][mesIndex] += item.C; // Sumar el valor de las citas ejecutadas por mes
      }
    });

    // Destruir el gráfico anterior si existe
    if (myChart2) {
      myChart2.destroy();
    }

    // Crear datasets para cada empleado
    const datasets = [];
    const colorPalette = [
      "rgba(255, 99, 132, 1)",
      "rgba(54, 162, 235, 1)",
      "rgba(255, 206, 86, 1)",
      "rgba(75, 192, 192, 1)",
      "rgba(153, 102, 255, 1)",
      "rgba(255, 159, 64, 1)",
    ];

    // Añadir datos de Citas Registradas
    for (const emp in citasPorEmpleadoReg) {
      const empleadoIndex = Object.keys(citasPorEmpleadoReg).indexOf(emp);
      datasets.push({
        label: `Citas Registradas - ${emp}`,
        data: citasPorEmpleadoReg[emp],
        borderColor: colorPalette[empleadoIndex % colorPalette.length],
        borderWidth: 2,
        fill: false,
      });
    }

    // Añadir datos de Citas Ejecutadas
    for (const emp in citasPorEmpleadoEje) {
      const empleadoIndex = Object.keys(citasPorEmpleadoEje).indexOf(emp);
      datasets.push({
        label: `Citas Ejecutadas - ${emp}`,
        data: citasPorEmpleadoEje[emp],
        borderColor: colorPalette[empleadoIndex % colorPalette.length],
        borderWidth: 2,
        fill: false,
      });
    }

    // Crear el gráfico
    const ctx2 = document.getElementById("myChart2").getContext("2d");

    myChart2 = new Chart(ctx2, {
      type: "line", // Gráfico de líneas
      data: {
        labels: labels, // Usar las etiquetas definidas globalmente
        datasets: datasets, // Usar los datasets creados
      },
      options: {
        maintainAspectRatio: false, // Permite que el gráfico ocupe todo el espacio disponible
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true, // Asegurar que el eje Y comience en cero
          },
        },
      },
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

async function Grafic3() {
  var Emp = $("#Emp").val();
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  let formData = new FormData();
  formData.append("funcion", "Grafic3");
  formData.append("Emp", Emp);
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch(
      "/vetting/modules/Dashboard/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.text();
    $("#informeTb").html(res2);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

async function Grafic4() {
  var Emp = $("#Emp").val();
  var FechIni = $("#FechIni").val();
  var FechFin = $("#FechFin").val();

  let formData = new FormData();
  formData.append("funcion", "Grafico4");
  formData.append("Emp", Emp);
  formData.append("FechIni", FechIni);
  formData.append("FechFin", FechFin);

  try {
    let req2 = await fetch(
      "/vetting/modules/Dashboard/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json(); // Suponiendo que la respuesta es un array de objetos
    console.log(res2);

    // Extraer los datos para el gráfico
    const labels = res2.map((item) => item.Servicio); // Obtener los nombres de los servicios
    const dataCounts = res2.map((item) => item.C); // Obtener las cantidades

    if (myChart4) {
      myChart4.destroy();
    }
    // Crear el gráfico de barras
    const ctx4 = document.getElementById("myChart4").getContext("2d");

    // Inicializar el gráfico y asignarlo a la variable global
    myChart4 = new Chart(ctx4, {
      type: "bar", // Tipo de gráfico de barras
      data: {
        labels: labels, // Etiquetas con los nombres de los servicios
        datasets: [
          {
            label: "Cantidad de Servicios",
            data: dataCounts, // Cantidades correspondientes a cada servicio
            backgroundColor: "rgba(75, 192, 192, 0.2)", // Color de fondo de las barras
            borderColor: "rgba(75, 192, 192, 1)", // Color del borde de las barras
            borderWidth: 1, // Ancho del borde
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true, // Asegurar que el eje Y comience en cero
          },
        },
      },
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
