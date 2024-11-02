<div>
</div>
</div>



<script src="/vetting/plantilla/assets/dist/js/jquery.min.js"></script>
<script src="/vetting/plantilla/assets/dist/js/simplebar.min.js"></script>
<script src="/vetting/plantilla/assets/dist/js/bootstrap.bundle.min.js"></script>
<!--  core files -->
<script src="/vetting/plantilla/assets/dist/js/app.min.js"></script>
<script src="/vetting/plantilla/assets/dist/js/app.init.js"></script>
<script src="/vetting/plantilla/assets/dist/js/app-style-switcher.js"></script>
<script src="/vetting/plantilla/assets/dist/js/sidebarmenu.js"></script>
<script src="/vetting/plantilla/assets/dist/js/custom.js"></script>
<!--  current page js files -->
<script src="/vetting/plantilla/assets/dist/js/owl.carousel.min.js"></script>
<script src="/vetting/plantilla/assets/dist/js/dashboard.js"></script>
<script src="/vetting/plantilla/assets/js/script.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<script>
    function formatoConComas(input) {
        let valor = input.value.replace(/[^\d]/g, ""); // Eliminamos todos los caracteres no numéricos

        // Si hay un cero al principio, pero el número es mayor a cero, eliminamos el cero
        if (valor.length > 1 && valor[0] === "0") {
            valor = valor.slice(1);
        }

        // Insertamos comas cada tres dígitos desde el final de la cadena
        let valorFormateado = "";
        let startIndex = valor.length % 3 || 3;
        valorFormateado = valor.slice(0, startIndex);
        while (startIndex < valor.length) {
            valorFormateado += "," + valor.slice(startIndex, startIndex + 3);
            startIndex += 3;
        }
        input.value = valorFormateado;
    }
</script>
<script>
    // Capturamos el evento cuando el interruptor cambie
    // Capturamos el evento cuando el interruptor cambie
    document.getElementById('toggleSwitch').addEventListener('change', function() {

        // Determinamos el estado actual del switch
        var estadoActual = this.checked ? 1 : 0; // 1 = Activo, 0 = Inactivo

        // Personalizamos el mensaje según el nuevo estado
        var mensaje = estadoActual === 1 ?
            "Tu Ubicación aparecerá en el mapa interactivo." :
            "Tu Ubicación desaparecerá del mapa dinámico.";

        // Mostramos el cuadro de diálogo de confirmación con SweetAlert
        Swal.fire({
            icon: "info",
            text: "¿Enserio Quieres cambiar de estado? " + mensaje,
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(async (result) => {
            if (result.isConfirmed) {
                // Si el usuario confirmó, procedemos con el cambio de estado
                console.log('Nuevo estado: ' + estadoActual);
                var Emp = $("#Emp").val();

                // Aquí puedes realizar la solicitud para cambiar el estado, por ejemplo:
                let formData = new FormData();
                formData.append("funcion", "ChangeEstEmp");
                formData.append("estado", estadoActual); // Enviar el nuevo estado al servidor
                formData.append("Emp", Emp); // Enviar el nuevo estado al servidor
                try {
                    let req2 = await fetch(
                        "/vetting/modules/he_fo/controller/controller.php", {
                            method: "POST",
                            body: formData,
                        }
                    );
                    let res2 = await req2.text();
                    Swal.fire({
                        icon: "success",
                        text: `Estado Actualizado`,
                    });
                } catch (error) {
                    Swal.fire({
                        icon: "error",
                        text: `Problema del Servidor: ${error.message}`,
                    });
                    console.log(error);
                }
            } else {
                // Si el usuario cancela, revertimos el cambio del switch
                this.checked = !estadoActual;
            }
        });

    });
</script>
</body>

</html>