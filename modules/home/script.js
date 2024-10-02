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
    // console.log(res2[0]);

    res2.forEach((item) => {
      let ContMascotas = document.getElementById("ContMascotas");
      ContMascotas.innerHTML += `
      <br>
        <section class="row">
          <section class="col-md-4">
            <div class="card custom-card">
              <div class="circle-img">
                <img src="data:image/jpeg;base64,${item["Foto"]}" alt="Foto" class="img-fluid">
              </div>
    
              <div class="card-body">
                <div class="text-center">
                  <h2 class="card-title" style="font-size:19px;"><b>${item["Nombre"]}</b></h2>
                </div>
                <div style="text-aling:left;">
                  <p class="card-text" style="text-aling:left; color:black;"><b>Fec_Nacimiento:</b> ${item["Fech_Naci"]}</p>
                  <p class="card-text" style="text-aling:left; color:black;"><b>Edad:</b> ${item["EdadMasco"]}</p>
                  <p class="card-text" style="text-aling:left; color:black;"><b>Raza:</b> ${item["Raza"]}</p>
                  <p class="card-text" style="text-aling:left; color:black;"><b>Chip:</b> ${item["Chip"]}</p>
                </div>
              </div>
            </div>
          </section>
        </section>
      `;
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

maps();
function maps() {
  // Inicializa el mapa centrado en Neiva, Huila, Colombia
  var map = L.map("maps").setView([2.9386, -75.2715], 13);

  // Añade el mapa base desde OpenStreetMap
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  // Añade un marcador en la ubicación de Neiva
  L.marker([2.9386, -75.2715])
    .addTo(map)
    .bindPopup("Ubicación en Neiva, Huila, Colombia.")
    .openPopup();
}


