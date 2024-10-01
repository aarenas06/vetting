<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Vetting/modules/Mascotas/controller/controller.php');
$control = new Controller;
$Modulos = $control->GetModulos();
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<style>
    .custom-card {
        position: relative;
        padding-top: 50px;
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
    }

    .card-body {
        padding: 20px;
    }

    #maps {
        border-radius: 12px;
        border: 2px #000;
    }
</style>

<input type="hidden" id="UsuCod" value="<?= $_SESSION['UsuCod'] ?>">
<h4>Bienvenido <?= $_SESSION['Nombre']; ?> </h4>
<hr>

<div class="container">
    <section class="row" style="margin-top:5%;">
        <div id="ContMascotas"></div>
    </section>
    <br>
    <section class="row">
        <section class="col-md-12">
            <div id="maps" style="height: 350px; width: 100%;"></div>
        </section>
    </section>
    <br>
</div>

<script type="text/javascript" src="/vetting/modules/home/script.js"></script>