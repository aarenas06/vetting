<style>
    /* Contenedor del canvas centrado */
    .chart-container {
        width: 600px;
        /* Ancho deseado */
        height: 300px;
        /* Altura deseada */
        position: relative;
        margin: 0 auto;
        /* Centrar horizontalmente */
        display: flex;
        justify-content: center;
        /* Centrar horizontalmente el contenido dentro del contenedor */
        align-items: center;
        /* Centrar verticalmente el contenido dentro del contenedor */
    }

    @media (min-width: 992px) {

        /* Pantallas grandes (PC) */
        #CardCitahoy {
            min-height: 800px;
        }
    }
</style>
<h3 class="title">Bienvenido a Vetconnect</h3>
<h5>Un Servicio integrado de salud, hecho para ti !</h5>
<hr>

<div class="row">
    <div class="col-lg-3">
        <label for="" class="label-control">Fecha Inicial:</label>
        <input type="date" class="form-control form-control-sm" value="<?= date('Y-m-d', strtotime('-2 months')) ?>" id="FechIni">
    </div>
    <div class="col-lg-3">
        <label for="" class="label-control">Fecha Fin: </label>
        <div class="input-group mb-3">
            <input type="date" class="form-control form-control-sm" value="<?= date('Y-m-d', strtotime('+1 day')) ?>" id="FechFin">
            <button class="btn btn-sm btn-primary" onclick="Grafic1(),Grafic2(),Grafic3(),Grafic4()"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header title bg-primary text-white">
                Registros Anual <?= date('Y') ?>
            </div>
            <div class="card-body">
                <div class="container" style=" height: 300px;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header title bg-primary text-white">
                Ingresos
            </div>
            <div class="card-body">
                <div style=" height: 300px;">
                    <div class="informeTb" id="informeTb"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header title bg-primary text-white">
                Conteo de Ingresos
            </div>
            <div class="card-body">
                <div class="container" style=" height: 300px;">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header title bg-primary text-white">
                Servicios Utilizados
            </div>
            <div class="card-body">
                <div class="container" style=" height: 300px;">
                    <canvas id="myChart4"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header title bg-primary text-white">
                Citas de Hoy
            </div>
            <div class="card-body" id="CardCitahoy">
                <div class="" style="max-height: 710px;overflow-y: auto;">
                    <div class="citasHoyFor" id="citasHoyFor"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<input type="hidden" id="View" value="1">

<input type="hidden" id="Emp" value="<?= $_SESSION['Emp'] ?>">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="/vetting/modules/dashboard/script.js"></script>