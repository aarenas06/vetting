<div class="table-responsive">
    <table class="table table-hover" id="tb2">
        <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Observacion Pre</th>
                <th scope="col">Personal</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">adjunto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) { ?>
                <tr>
                    <td><?= $dt['idTbHisClinica'] ?></td>
                    <td><?= $dt['HisFec'] ?></td>
                    <td><?= $dt['CitaObs'] ?></td>
                    <td><?= $dt['EmpNom'] ?></td>
                    <td><?= $dt['HisObserv'] ?></td>
                    <td>
                        <?php if ($dt['HisObserv'] != '') { ?>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#mdPdf" onclick="OpenPdf('<?= $dt['HisAdj'] ?>','<?= $dt['MascoCod'] ?>')"><i class="fa-solid fa-file-pdf"></i></button>
                        <?php } ?>
                    </td>
                </tr> <?php } ?>
        </tbody>
    </table>
</div>

