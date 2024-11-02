ObtFotoPerfil();
async function ObtFotoPerfil() {
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
