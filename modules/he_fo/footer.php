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
</body>

</html>