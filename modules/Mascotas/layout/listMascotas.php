<div class="table-responsive">
    <table class="table table-hover" id="tbMascotas">
        <thead>
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Chip</th>
                <th scope="col">Nombre</th>
                <th scope="col">Raza</th>
                <th scope="col">F. Nacimiento</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Peso</th>
                <th scope="col">Patologia</th>
                <th scope="col">Agresión</th>
                <th scope="col">Opt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $dt) { ?>
                <tr>
                    <th scope="row"><?= $dt['Cod'] ?></th>
                    <td><?= $dt['Chip'] ?></td>
                    <td><?= $dt['Nombre'] ?></td>
                    <td><?= $dt['Raza'] ?></td>
                    <td><?= $dt['FechNaci'] ?></td>
                    <td><?= $dt['EdadMascota'] ?></td>
                    <td><?= $dt['Sexo'] ?></td>
                    <td><?= $dt['Peso'] ?></td>
                    <td><?= $dt['Patologia'] ?></td>
                    <td><?= $dt['Agresion'] ?></td>
                    <td>
                        <!-- <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-danger btn-sm" onclick="DeletePropietarios(<?= $Propietarios['idTbUsuarios'] ?>)" data-bs-toggle="modal"><i class="fa-solid fa-trash-can"></i></button>
                        </div> -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>