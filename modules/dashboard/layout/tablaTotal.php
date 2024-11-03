<table class="table table-hover table-bordered table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Data</th>
            <th scope="col">Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php $cont = 1;
        foreach ($data as $dt) { ?>
            <tr>
                <th scope="row"><?= $cont ?></th>
                <td><?= $dt['colum'] ?></td>
                <td><?= $dt['C'] ?></td>
            </tr>
        <?php $cont++;
        } ?>


    </tbody>
</table>