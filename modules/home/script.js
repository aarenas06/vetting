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
                              <h2 class="card-title" style="font-size:19px;"><b>${
                                item["Nombre"]
                              }</b></h2>
                          </div>
                          <div style="text-align:left;">
                              <p class="card-text" style="color:black;"><b>Fec_Nacimiento:</b> ${
                                item["Fech_Naci"]
                              }</p>
                              <p class="card-text" style="color:black;"><b>Edad:</b> ${calculateAge(
                                item["Fech_Naci"]
                              )}</p>
                              <p class="card-text" style="color:black;"><b>Raza:</b> ${
                                item["Raza"]
                              }</p>
                              <p class="card-text" style="color:black;"><b>Chip:</b> ${
                                item["Chip"]
                              }</p>
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

// Función para calcular la edad (puedes dejarla como está)
function calculateAge(fechaNacimiento) {
  let today = new Date();
  let nacimiento = new Date(fechaNacimiento);
  let edadAnios = today.getFullYear() - nacimiento.getFullYear();
  let edadMeses = today.getMonth() - nacimiento.getMonth();

  if (edadMeses < 0) {
    edadAnios--;
    edadMeses += 12;
  }

  return `${edadAnios} Años - ${edadMeses} Meses`;
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

    let markers = [];

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        let userLat = position.coords.latitude;
        let userLng = position.coords.longitude;

        console.log("User Latitude: " + userLat);
        console.log("User Longitude: " + userLng);
        // Definir un nuevo ícono con color verde
        let greenIcon = L.icon({
          iconUrl:
            "https://cdn-icons-png.freepik.com/256/6645/6645221.png?semt=ais_hybrid", // URL de tu icono personalizado
          shadowUrl:
            "https://leafletjs.com/examples/custom-icons/leaf-shadow.png", // URL de la sombra del icono

          iconSize: [28, 65], // tamaño del icono
          shadowSize: [50, 64], // tamaño de la sombra
          iconAnchor: [22, 94], // punto del icono que se ancla al mapa
          shadowAnchor: [4, 62], // punto de la sombra que se ancla al mapa
          popupAnchor: [-3, -76], // posición del popup relativa al icono
        });

        // Añadir un marcador para la ubicación actual del usuario con el ícono verde
        let userMarker = L.marker([userLat, userLng], { icon: greenIcon })
          .addTo(map)
          .bindPopup("Tu ubicación actual")
          .openPopup();

        markers.push(userMarker.getLatLng());

        // Añadir marcadores de las veterinarias
        res2.forEach(function (item) {
          let latitud = parseFloat(item.EmpreLatitud);
          let longitud = parseFloat(item.EmpreLongitud.split(",")[0]); // Ignora lo que está después de la coma

          if (!isNaN(latitud) && !isNaN(longitud)) {
            let marker = L.marker([latitud, longitud])
              .addTo(map)
              .bindPopup(
                `Ubicación de veterinaria en latitud: ${latitud}, longitud: ${longitud}`
              );

            markers.push(marker.getLatLng());
          }
        });

        // Ajustar la vista del mapa para mostrar todos los marcadores
        if (markers.length > 0) {
          let bounds = L.latLngBounds(markers);
          map.fitBounds(bounds);
        }
      }, showError);
    } else {
      console.log("Geolocation is not supported by this browser.");
    }

    function showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          console.log("User denied the request for Geolocation.");
          break;
        case error.POSITION_UNAVAILABLE:
          console.log("Location information is unavailable.");
          break;
        case error.TIMEOUT:
          console.log("The request to get user location timed out.");
          break;
        case error.UNKNOWN_ERROR:
          console.log("An unknown error occurred.");
          break;
      }
    }
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
