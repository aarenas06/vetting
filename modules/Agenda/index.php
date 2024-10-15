<style>
    .header {
        display: flex;
        justify-content: space-between;
    }
</style>
<h3 class="title">Modulo de Agenda:</h3>
<h5>Gestiona Tu calendario</h5>
<hr>
<div class="header">
    <div>
        <h4 class="title">Eventos Registrados:</h4>
    </div>
    <div>
        <button class="btn btn-primary btn-sm title" data-bs-toggle="modal" data-bs-target="#insertEmpresa"> <i class="fa-solid fa-plus"></i>Crear</button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-8">
        <div class="container">
            <div id='calendar'></div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Citas de Hoy
            </div>
            <div class="card-body">
                <div class="" style="max-height: 710px;overflow-y: auto;">
                    <?php for ($i = 0; $i < 4; $i++) {  ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Propietario:Alejandro Palencia</h5>
                                <p class="card-text">MascoTa:Chandoza</p>
                                <p class="card-text">Edad: 3 años </p>
                                <p class="card-text">Hora:2:00pm </p>
                                <p class="card-text">Sevicio:Cita Veterinarias</p>
                            </div>
                        </div>
                    <?php  } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es', // Cambia el idioma a español

        });
        calendar.render();
    });
</script>