listMascotashome();
async function listMascotashome() {
  let formData = new FormData();
  formData.append("funcion", "listMascotashome");
  formData.append("UsuCod", $("#UsuCod").val());
  try {
    let req2 = await fetch("/vetting/modules/home/controller/controller.php", {
      method: "POST",
      body: formData,
    });

    let res2 = await req2.json();
    // console.log(res2[0]["Foto"]);

    // Limpia el contenedor antes de agregar las tarjetas
    let ContMascotas = document.getElementById("ContMascotas");
    ContMascotas.innerHTML = "";

    res2.forEach((item) => {
      // Si la imagen es válida, genera el formato base64 correcto
      let base64Image = `data:image/jpeg;base64,${item["Foto"].replace(
        /\s/g,
        ""
      )}`;

      // Inserta el HTML para cada mascota en el contenedor
      ContMascotas.innerHTML += `
          <br>
          <section class="row">
              <section class="col-md-4">
                  <div class="card custom-card">
                      <div class="circle-img">
                          <img src="${base64Image}" alt="Foto" class="img-fluid">
                      </div>
                      <div class="card-body">
                          <div class="text-center">
                              <h2 class="card-title" style="font-size:19px;"><b>${item["Nombre"]}</b></h2>
                          </div>
                          <div style="text-align:left;">
                              <p class="card-text" style="color:black;"><b>Fec_Nacimiento:</b> ${item["Fech_Naci"]}</p>
                              <p class="card-text" style="color:black;"><b>Edad:</b> ${item["EdadMasco"]}</p>
                              <p class="card-text" style="color:black;"><b>Raza:</b> ${item["Raza"]}</p>
                              <p class="card-text" style="color:black;"><b>Chip:</b> ${item["Chip"]}</p>
                          </div>
                      </div>
                  </div>
              </section>
          </section>
      `;
    });
  } catch (error) {
    // Muestra el error con Swal y lo imprime en consola
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}

maps();
async function maps() {
  let formData = new FormData();
  formData.append("funcion", "maps");
  try {
    let req2 = await fetch("/vetting/modules/home/controller/controller.php", {
      method: "POST",
      body: formData,
    });

    let res2 = await req2.json();
    console.log(res2);

    // Inicializa el mapa centrado en Neiva, Huila, Colombia
    var map = L.map("maps").setView([2.9386, -75.2715], 13);

    // Añade el mapa base desde OpenStreetMap
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    // Recorre la variable res2 para añadir los marcadores
    res2.forEach(function (item) {
      // Convertir las coordenadas de latitud y longitud en números
      var latitud = parseFloat(item.EmpreLatitud);
      var longitud = parseFloat(item.EmpreLongitud.split(",")[0]); // Ignora lo que está después de la coma si hay valores adicionales

      // Verifica que latitud y longitud son válidas antes de añadir el marcador
      if (!isNaN(latitud) && !isNaN(longitud)) {
        // Añade un marcador en cada ubicación
        L.marker([latitud, longitud])
          .addTo(map)
          .bindPopup(`Ubicación en latitud: ${latitud}, longitud: ${longitud}`)
          .openPopup();
      }
    });
  } catch (error) {
    // Muestra el error con Swal y lo imprime en consola
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
    console.log(error);
  }
}
