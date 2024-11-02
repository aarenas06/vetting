ObtDataPerfil();
async function ObtDataPerfil() {
  let formData = new FormData();
  formData.append("funcion", "ObtDataPerfil");
  formData.append("UsuCod", $("#UsuCod").val());
  formData.append("User", $("#User").val());

  try {
    let req2 = await fetch(
      "/vetting/modules/perfilUser/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();

    let Nombre = document.getElementById("Nombre");
    Nombre.innerHTML = res2[0]["UsuNom"];

    let Rol = document.getElementById("Rol");
    Rol.innerHTML = res2[0]["RolNom"];

    let InputNombre = document.getElementById("InputNombre");
    InputNombre.value = res2[0]["UsuNom"];

    let InputIdentificacion = document.getElementById("InputIdentificacion");
    InputIdentificacion.value = res2[0]["UsuCC"];

    let InputDireccion = document.getElementById("InputDireccion");
    InputDireccion.value = res2[0]["UsuDirec"];

    let InputCelular = document.getElementById("InputCelular");
    InputCelular.value = res2[0]["UsuCel"];

    let InputEmail = document.getElementById("InputEmail");
    InputEmail.value = res2[0]["UsuEmail"];

    let InputContrasena = document.getElementById("InputContrasena");
    InputContrasena.value = res2[0]["UsuCla"];

    let FotoInput = document.getElementById("FotoPerfil");
    // Crea la imagen con base64 o URL predeterminada como src
    let img = document.createElement("img");
    img.src = res2[0]["UsuPic"]
      ? "data:image/jpeg;base64," + res2[0]["UsuPic"]
      : "/vetting/plantilla/assets/img/home/profile.jpg";
    img.alt = "Foto de Perfil";
    img.style.width = "100%";
    img.style.height = "100%";
    img.style.objectFit = "cover";
    FotoInput.appendChild(img);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

// Función para ocultar o visualizar la contraseña
function togglePassword() {
  const passwordField = document.getElementById("InputContrasena");
  const toggleIcon = document.getElementById("toggleIcon");

  // Verifica el tipo de input y alterna
  if (passwordField.type === "password") {
    passwordField.type = "text"; // Muestra la contraseña
    toggleIcon.classList.remove("fa-eye"); // Cambia el ícono
    toggleIcon.classList.add("fa-eye-slash"); // Cambia el ícono a "ocultar"
  } else {
    passwordField.type = "password"; // Oculta la contraseña
    toggleIcon.classList.remove("fa-eye-slash"); // Cambia el ícono
    toggleIcon.classList.add("fa-eye"); // Cambia el ícono a "mostrar"
  }
}

//FUNCION APRA QUE EL INPUT TOME EL NOMBRE DEL ARCHIVO CARGADO
function updateFileName() {
  const input = document.getElementById("FotoInput");
  const fileName = input.files.length > 0 ? input.files[0].name : "";
  document.getElementById("FotoNombre").value = fileName;
}

async function UpdateDataPerfil() {
  let formData = new FormData();
  formData.append("funcion", "UpdateDataPerfil");
  formData.append("Nombre", $("#InputNombre").val());
  formData.append("Identificacion", $("#InputIdentificacion").val());
  formData.append("Direccion", $("#InputDireccion").val());
  formData.append("Celular", $("#InputCelular").val());
  formData.append("Contrasena", $("#InputContrasena").val());
  formData.append("UsuCod", $("#UsuCod").val());
  formData.append("User", $("#User").val());
  formData.append("fotoPerfil", $("#FotoInput").get(0).files[0]);

  try {
    let req2 = await fetch(
      "/vetting/modules/perfilUser/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();
    ObtDataPerfil();
    if (res2 === true) {
      Swal.fire({
        icon: "success",
        title: "¡Éxito!",
        text: "Actualizado correctamente...",
      }).then(() => {
        location.reload(); // Recarga la página completamente
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Error!",
        text: `Problema al Actualizar...!`,
      });
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

ObtMascoPerfil();
async function ObtMascoPerfil() {
  let formData = new FormData();
  formData.append("funcion", "ObtMascoPerfil");
  formData.append("UsuCod", $("#UsuCod").val());

  try {
    let req2 = await fetch(
      "/vetting/modules/perfilUser/controller/controller.php",
      {
        method: "POST",
        body: formData,
      }
    );
    let res2 = await req2.json();
    console.log(res2);
    let cartaMasco = document.getElementById("cartaMasco");
    cartaMasco.innerHTML = ""; // Limpiar el contenedor

    res2.forEach((masco) => {
      let card = `
        <div class="card-item card-body p-4 d-flex align-items-center gap-3">
            <img src="data:image/png;base64,${masco.MascoPic}" alt="${masco.MascoNom}" class="rounded-circle" width="40" height="40">
            <div>
                <h5 class="fw-semibold mb-0">${masco.MascoNom}</h5>
                <span class="fs-2 d-flex align-items-center">
                    <i class="fa-solid fa-paw"></i> ${masco.Edad} 
                </span>
            </div>
        </div>
      `;
      cartaMasco.innerHTML += card; // Agregar cada carta al contenedor
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
