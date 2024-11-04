let map; // Definimos la variable del mapa globalmente
let markers = []; // Marcadores globales
listMascotashome();
ListVetActive();
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
                  <div class="card custom-card" style="margin-top: 60px;" id="mascoCard">
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
                              <p class="card-text" style="color:black;"><b>Ide:</b> ${
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

    // Inicializa el mapa solo si no está inicializado
    if (!map) {
      // Inicializa el mapa centrado en Neiva, Huila, Colombia
      map = L.map("maps").setView([2.9386, -75.2715], 13);

      // Añade el mapa base desde OpenStreetMap
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);
    } else {
      // Si el mapa ya existe, limpiamos los marcadores existentes
      markers.forEach((marker) => map.removeLayer(marker));
      markers = []; // Reiniciar el array de marcadores
    }

    // Intentar obtener la ubicación del usuario con alta precisión
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          // Latitud y longitud manual
          let userLat = 2.965877; // Cambiar a position.coords.latitude para usar la ubicación real
          let userLng = -75.269072; // Cambiar a position.coords.longitude para usar la ubicación real

          console.log("Latitud del usuario: " + userLat);
          console.log("Longitud del usuario: " + userLng);

          // Añade un marcador para la ubicación actual del usuario
          let userMarker = L.marker([userLat, userLng])
            .addTo(map)
            .bindPopup("Tu ubicación actual")
            .openPopup();

          // Dibujar un círculo con un radio de 500 metros alrededor del usuario
          let userCircle = L.circle([userLat, userLng], {
            color: "blue", // Color del borde del círculo
            fillColor: "#add8e6", // Color de relleno del círculo
            fillOpacity: 0.3, // Opacidad del relleno
            radius: 500, // Radio en metros
          }).addTo(map);

          markers.push(userMarker); // Agregar el marcador del usuario al array de marcadores

          // Añadir marcadores de las veterinarias desde la respuesta del servidor
          res2.forEach(function (item) {
            let latitud = parseFloat(item.EmpreLatitud);
            let longitud = parseFloat(item.EmpreLongitud.split(",")[0]);

            if (!isNaN(latitud) && !isNaN(longitud)) {
              let marker = L.marker([latitud, longitud])
                .addTo(map)
                .bindPopup(
                  `Ubicación de veterinaria en latitud: ${latitud}, longitud: ${longitud}`
                );

              markers.push(marker); // Agregar el marcador de la veterinaria al array de marcadores
            }
          });

          // Ajusta la vista del mapa para mostrar todos los marcadores
          if (markers.length > 0) {
            let bounds = L.latLngBounds(
              markers.map((marker) => marker.getLatLng())
            );
            map.fitBounds(bounds);
          }
        },
        showError,
        { enableHighAccuracy: true, timeout: 5000, maximumAge: 0 }
      );
    } else {
      console.log("La geolocalización no es compatible con este navegador.");
    }

    function showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          console.log("El usuario negó el acceso a la geolocalización.");
          break;
        case error.POSITION_UNAVAILABLE:
          console.log("La información de ubicación no está disponible.");
          break;
        case error.TIMEOUT:
          console.log("La solicitud de ubicación ha expirado.");
          break;
        default:
          console.log("Ocurrió un error desconocido al obtener la ubicación.");
          break;
      }
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

async function ListVetActive() {
  let formData = new FormData();
  formData.append("funcion", "ListVetActive");

  try {
    let req2 = await fetch("/vetting/modules/Home/controller/controller.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();
    $("#ForVet").html(res2);
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: `Problema del Servidor: ${error.message}`,
    });
  }
}
function abrirGoogleMaps(latitud, longitud) {
  const url = `https://www.google.com/maps/search/?api=1&query=${latitud},${longitud}`;
  // Abre Google Maps en una nueva pestaña
  window.open(url, "_blank");
}

// Llama a ListVetActive cada 8 segundos
setInterval(ListVetActive, 15000);

// Llama a maps cada 8 segundos
setInterval(maps, 15000);
