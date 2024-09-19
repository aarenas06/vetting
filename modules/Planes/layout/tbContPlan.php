<table class="table table-sm table-hover" id="tbCost">
    <thead>
        <tr>
            <th scope="col">Nombre Plan</th>
            <th scope="col">Costo</th>
            <th scope="col">Conteo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dt) { ?>
            <tr>
                <td><?= $dt['PlanNom'] ?></td>
                <td>$<?= number_format($dt['PlanCosto'], 00) ?></td>
                <td><?= $dt['C'] ?></td>
            </tr>
        <?php   } ?>

    </tbody>
</table>