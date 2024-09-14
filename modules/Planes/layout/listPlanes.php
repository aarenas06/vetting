<div class="table-responsive">
    <table class="table table-hover" id="tb1">
        <thead>
            <tr>
                <th scope="col">Nombre Plan</th>
                <th scope="col">Vigencia Dia</th>
                <th scope="col">Vigencia Mes</th>
                <th scope="col">Costo</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col"># servicios</th>
                <th scope="col">Estado</th>
                <th scope="col">Opt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) {
                if ($dt['PlanEst'] == 1) {
                    $back = 'success';
                    $text = 'Activo';
                } else {
                    $back = 'danger';
                    $text = 'Innactivo';
                }
            ?>
                <tr>
                    <th scope="row"><?= $dt['PlanNom'] ?></th>
                    <td><?= $dt['PlanVigenciaDia'] ?></td>
                    <td><?= $dt['PlanVigenciaMes'] ?></td>
                    <td>$<?= number_format($dt['PlanCosto'], 00) ?></td>
                    <td><?= $dt['PlanFechCrea'] ?></td>
                    <td><?= number_format($dt['C'], 00) ?></td>
                    <td class="text-center"> <button onclick="ChangeEstPlan(<?= $dt['idTbPlanes'] ?>,<?= $dt['PlanEst'] ?>)" class="btn btn-sm btn-<?= $back ?>"><?= $text ?></button></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm" onclick="TbDetalle(<?= $dt['idTbPlanes'] ?>)" data-bs-toggle="modal" data-bs-target="#ModalDetalle"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="listData(<?= $dt['idTbPlanes'] ?>)" data-bs-toggle="modal" data-bs-target="#ModalData"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </td>
                </tr>
            <?php    } ?>
        </tbody>
    </table>
</div>