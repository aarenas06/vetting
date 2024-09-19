<label class="form-label ">Nombre Del Plan</label>
<input type="text" class="form-control form-control-sm" value="<?= $data['PlanNom'] ?>" id="PlanNomUp" readonly>
<label class="form-label">Vigencia Por Dias</label>
<input type="number" class="form-control form-control-sm" value="<?= $data['PlanVigenciaDia'] ?>" id="PlanVigenciaDiaUp">
<label class="form-label">Vigencia Por Meses</label>
<input type="number" class="form-control form-control-sm" value="<?= $data['PlanVigenciaMes'] ?>" id="PlanVigenciaMesUp">
<label class="form-label">Costo</label>
<input type="tel" class="form-control form-control-sm" value="<?= number_format($data['PlanCosto'], 00) ?>" id="PlanCostoUp" oninput="formatoConComas(this)">
<hr>
<center>
    <button class="btn btn-primary btn-sm" onclick="UpdatePlan(<?= $idPlan ?>)"> <i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
</center>