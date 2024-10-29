<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Mascotas/controller/controller.php');
$control = new Controller;
$Modulos = $control->GetModulos();
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<style>
    #ContMascotasWrapper {
        max-width: 100%;
        overflow-x: auto;
        white-space: nowrap;
    }

    .custom-card {
        position: relative;
        padding-top: 35px;
        display: inline-block;
        margin-right: 10px;
        width: auto;
    }

    .circle-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px #000;
        position: absolute;
        top: -50px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #000;
    }

    .circle-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card {
        border-radius: 15px;
        border: 2px #000;
        background-color: #EAEDED;
        margin-top: 60px;
    }

    .card-body {
        padding: 20px;
    }

    .circle-img img {
        border-radius: 50%;
    }


    #maps {
        border-radius: 12px;
        border: 2px #000;
        z-index: 3;
    }

    .header {
        display: flex;
        justify-content: space-between;
    }
</style>

<input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod'] ?>">
<h4>Bienvenido <?= $_SESSION['Nombre']; ?> </h4>
<hr>


<section class="row">
    <section id="ContMascotasWrapper" class="col-md-12">
        <div id="ContMascotas" class="d-flex flex-row overflow-auto">
        </div>
    </section>
</section>
<section class="row">
    <section class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Mapa Interactivo
            </div>
            <div class="card-body bg-white">
                <div id="maps" style="height: 350px; width: 100%;"></div>

            </div>
        </div>
    </section>
    <section class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Veterinarias Activas
            </div>
            <div class="card-body bg-white">
                <div class="ForVet" id="ForVet"></div>
            </div>
        </div>
    </section>
</section>
<br>



<script type="text/javascript" src="/vetting/modules/home/script.js"></script>