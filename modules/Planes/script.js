listPlanes();

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

async function InsertPlan() {
  var PlanNom = $("#PlanNom").val();
  var PlanVigenciaDia = $("#PlanVigenciaDia").val();
  var PlanCosto = $("#PlanCosto").val();
  var PlanVigenciaMes = $("#PlanVigenciaMes").val();
  PlanCosto = PlanCosto.replace(/[,\.]/g, ""); // Eliminar comas y puntos
  // Capturar los IDs de los checkboxes seleccionados
  var selectedServices = [];
  $("input[type=checkbox]:checked").each(function () {
    selectedServices.push($(this).attr("id"));
  });
  let formData = new FormData();
  formData.append("funcion", "InsertPlan");
  formData.append("PlanNom", PlanNom);
  formData.append("PlanVigenciaDia", PlanVigenciaDia);
  formData.append("PlanCosto", PlanCosto);
  formData.append("PlanVigenciaMes", PlanVigenciaMes);
  formData.append("selectedServices", JSON.stringify(selectedServices)); // Añadir el array de IDs como JSON

  try {
    let req2 = await fetch(
      "/vetting/modules/Planes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.json();
    if (res2 === true) {
      Swal.fire({
        icon: "success",
        text: "Plan Agregado",
      });
      $("#insertPlanModal").modal("hide");
      listPlanes();

      // Limpiar campos del formulario y desmarcar checkboxes
      $("#PlanNom").val("");
      $("#PlanVigenciaDia").val("");
      $("#PlanCosto").val("");
      $("#PlanVigenciaMes").val("");
      $("input[type=checkbox]").prop("checked", false);
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

async function TbDetalle(idPlan) {
  let formData = new FormData();
  formData.append("funcion", "TbDetalle");
  formData.append("idPlan", idPlan);

  try {
    let req2 = await fetch(
      "/vetting/modules/Planes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.text();
    $("#tbDetalle").html(res2);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
async function ChangeEstPlan(idPlan, Est) {
  Swal.fire({
    icon: "info",
    text: "¿Enserio Quieres cambiar de estado?",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
  }).then(async (result) => {
    if (result.isConfirmed) {
      let formData = new FormData();
      formData.append("funcion", "ChangeEstPlan");
      formData.append("idPlan", idPlan);
      formData.append("Est", Est);

      try {
        let req2 = await fetch(
          "/vetting/modules/Planes/controller/controller.php",
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

async function ChangeEst(idServicio, idPlan, Est) {
  Swal.fire({
    text: "¿Enserio Quieres cambiar de estado?",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
  }).then(async (result) => {
    if (result.isConfirmed) {
      let formData = new FormData();
      formData.append("funcion", "ChangeEst");
      formData.append("idPlan", idPlan);
      formData.append("idServicio", idServicio);
      formData.append("Est", Est);

      try {
        let req2 = await fetch(
          "/vetting/modules/Planes/controller/controller.php",
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
        TbDetalle(idPlan);
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
async function listData(idPlan) {
  let formData = new FormData();
  formData.append("funcion", "ListData");
  formData.append("idPlan", idPlan);

  try {
    let req2 = await fetch(
      "/vetting/modules/Planes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.text();
    $("#ListData").html(res2);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
async function UpdatePlan(idPlan) {
  var PlanNom = $("#PlanNomUp").val();
  var PlanVigenciaDia = $("#PlanVigenciaDiaUp").val();
  var PlanCosto = $("#PlanCostoUp").val();
  var PlanVigenciaMes = $("#PlanVigenciaMesUp").val();
  PlanCosto = PlanCosto.replace(/[,\.]/g, ""); // Eliminar comas y puntos

  let formData = new FormData();
  formData.append("funcion", "UpdatePlan");
  formData.append("idPlan", idPlan);
  formData.append("PlanNom", PlanNom);
  formData.append("PlanVigenciaDia", PlanVigenciaDia);
  formData.append("PlanCosto", PlanCosto);
  formData.append("PlanVigenciaMes", PlanVigenciaMes);

  try {
    let req2 = await fetch(
      "/vetting/modules/Planes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.text();
    Swal.fire({
      icon: "success",
      text: `información Actualizada`,
    });
    $("#ModalData").modal("hide");
    listPlanes();
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
contPlan();
async function contPlan() {
  let formData = new FormData();
  formData.append("funcion", "contPlan");

  try {
    let req2 = await fetch(
      "/vetting/modules/Planes/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );

    let res2 = await req2.text();
    $("#contPlan").html(res2);
    $("#tbCost").DataTable();
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
