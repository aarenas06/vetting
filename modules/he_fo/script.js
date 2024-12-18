var TipPerfil = $("#TipPerfil").val();

if (TipPerfil == 2) {
  console.log("Es usuario");
  ObtFotoPerfil();
} else {
  console.log("Es admin o emp");

  //foto del header
  let FotoInput = document.getElementById("HeadFotoPerfil");
  let img = document.createElement("img");
  img.src = "/vetting/plantilla/assets/img/home/profile.jpg";
  img.alt = "Foto de Perfil";
  img.classList.add("rounded-circle");
  img.style.width = "35px";
  img.style.height = "35px";
  img.style.objectFit = "cover";
  FotoInput.appendChild(img);

  //Foto al precionar click en la imagen del header
  let imgPerfil = document.getElementById("FotoPerfilPerfil");
  imgPerfil.src = "/vetting/plantilla/assets/img/home/profile.jpg";
  imgPerfil.alt = "Foto de Perfil";
}
async function ObtFotoPerfil() {
  var TipPerfil = $("#TipPerfil").val();
  console.log("este es el tipo de user " + TipPerfil);

  let formData = new FormData();
  formData.append("funcion", "ObtFotoPerfil");
  formData.append("UsuCod", $("#UsuCod").val());

  try {
    let req2 = await fetch("/vetting/include/controller.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();
    console.log(res2);

    //foto del header
    let FotoInput = document.getElementById("HeadFotoPerfil");
    let img = document.createElement("img");
    img.src = res2[0]["UsuPic"]
      ? "data:image/jpeg;base64," + res2[0]["UsuPic"]
      : "/vetting/plantilla/assets/img/home/profile.jpg";
    img.alt = "Foto de Perfil";
    img.classList.add("rounded-circle");
    img.style.width = "35px";
    img.style.height = "35px";
    img.style.objectFit = "cover";
    FotoInput.appendChild(img);

    //Foto al precionar click en la imagen del header
    let imgPerfil = document.getElementById("FotoPerfilPerfil");
    imgPerfil.src = res2[0]["UsuPic"]
      ? "data:image/jpeg;base64," + res2[0]["UsuPic"]
      : "/vetting/plantilla/assets/img/home/profile.jpg";
    imgPerfil.alt = "Foto de Perfil";
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

NotifiCitas();
async function NotifiCitas() {
  let formData = new FormData();
  formData.append("funcion", "NotifiCitas");
  formData.append("UsuCod", $("#UsuCod").val());

  try {
    let req2 = await fetch("/vetting/include/controller.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.json();

    // Contenedor de notificaciones
    let contenNotifi = document.getElementById("contenNotifi");
    contenNotifi.innerHTML = ""; // Limpiar notificaciones previas

    // Fecha actual
    let fechaActual = new Date();
    let notificaciones = 0;

    // Iterar sobre cada cita
    res2.forEach((cita) => {
      let fechaCita = new Date(cita["FechCita"]);
      let diferenciaDias = (fechaCita - fechaActual) / (1000 * 60 * 60 * 24);

      // Verificar si la cita es en los próximos 5 días
      if (diferenciaDias <= 5 && diferenciaDias >= 0) {
        notificaciones++;

        // Crear elemento de notificación
        let notificacion = document.createElement("a");
        notificacion.href = "#";
        notificacion.classList.add("list-group-item", "list-group-item-action");
        notificacion.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="ti ti-alert-circle text-warning me-3"></i>
                        <div>
                            <span class="fw-bold">${cita["MotiCita"]}</span>
                            <p>${cita["FechCita"]}</p>
                            <p>${cita["MascoNom"]}</p>
                            <small class="d-block text-muted">${cita["Doctor"]}</small>
                        </div>
                    </div>
                `;
        contenNotifi.appendChild(notificacion);
      }
    });

    // Actualizar el contador de notificaciones
    let notificationCount = document.getElementById("notificationCount");
    notificationCount.textContent = notificaciones > 0 ? notificaciones : "";
    notificationCount.style.display = notificaciones > 0 ? "inline" : "none";
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
