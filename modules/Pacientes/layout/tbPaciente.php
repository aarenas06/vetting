<div class="table-responsive">
    <table class="table table-hover" id="tb1">
        <thead>
            <tr>
                <th scope="col" class="table-primary text-center" colspan="9">Paciente</th>
                <th scope="col" class="table-success text-center" colspan="2">Propietario</th>
            </tr>
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Nombre</th>
                <th scope="col">Raza</th>
                <th scope="col">Especie</th>
                <th scope="col">F. Nacimiento</th>
                <th scope="col">Sexo</th>
                <th scope="col">Peso</th>
                <th scope="col">Agresión</th>
                <th scope="col">Historial</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) { ?>
                <tr>
                    <td><?= $dt['MascoCod'] ?></td>
                    <td><?= $dt['MascoNom'] ?></td>
                    <td><?= $dt['RazNom'] ?></td>
                    <td><?= $dt['EspeNom'] ?></td>
                    <td><?= $dt['MascoFechNac'] ?></td>
                    <td><?= $dt['MascoSex'] ?></td>
                    <td><?= $dt['MascoPeso'] ?></td>
                    <td><?= $dt['MascoAgresion'] ?>%</td>
                    <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#MdHisto" onclick="HistoricoMd(<?= $dt['idtbMascotas'] ?>)"><i class="fa-solid fa-list"></i></button></td>
                    <td><?= $dt['UsuNom'] ?></td>
                    <td><?= $dt['UsuCel'] ?></td>

                </tr> <?php } ?>
        </tbody>
    </table>
</div>
