<?php foreach ($datos as $dt) { ?>
    <div class="card" style="box-shadow: 4px 4px 4px 4px gray;">
        <div class="card-body">
            <div class="header">
                <div>
                    <h5 class="card-title">Nombre Veterinaria: <?= $dt['EmpreNom'] ?></h5>
                </div>
                <div>
                    <button class="btn btn-sm btn-primary" onclick="abrirGoogleMaps(<?= $dt['EmpreLatitud'] ?>, <?= $dt['EmpreLongitud'] ?>)"> Maps <span><i class="fa-solid fa-location-dot"></i></span></button>

                </div>
            </div>
            <p class="card-text">Dirección: <?= $dt['EmpreDir'] ?> <br>
                Tetelofono: <?= $dt['EmpreRepreTel'] ?> <br>
                Estado: <span class="badge  rounded-pill text-bg-success ">Activa</span>
            </p>
        </div>
    </div>
<?php } ?>