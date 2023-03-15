<!-- autor: Orobio Vásquez Madelyne -->
<?php require_once HEADER_ADMIN; ?>
<div style="text-align: center;" class="container mt-5 pt-4">
    <h2>Modificación de Sede <?php echo $sede['id']?></h2>
    </div>
<div class="container mt-2">
<div class="container">
    <div class="card card-body">
        <form action="index.php?c=sede&f=edit" method="POST" name="formProdNuevo" id="formProdNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $sede['id']; ?>" />
            <div class="form-group col-sm-6">
                <label for="txtprovincia">Provincia</label>
                <input type="text" name="txtprovincia" id="txtprovincia" value="<?php echo $sede['provincia'] ?>" class="form-control" placeholder="INGRESE PROVINCIA" autofocus="" required />
            </div>
            <div class="form-group col-sm-6">
                <label for="txtciudad">Ciudad</label>
                <input type="text" name="txtciudad" id="txtciudad" value="<?php echo $sede['ciudad'] ?>" class="form-control" placeholder="INGRESE CIUDAD" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="txthorario">Horarios</label>
                <select id="txthorario" name="txthorario" class="form-control">
                    <option value='matutina' <?php echo ($sede['horario'] == "matutina") ? 'selected="selected"' : '' ?>>matutino</option>
                    <option value='vespertino' <?php echo ($sede['horario'] == "vespertino") ? 'selected="selected"' : '' ?>>vespertino</option>
                    <option value='nocturno' <?php echo ($sede['horario'] == "nocturno") ? 'selected="selected"' : '' ?>>nocturno</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label for="txtdireccion">Direccion</label>
                <input type="text" name="txtdireccion" id="txtdireccion" value="<?php echo $sede['direccion'] ?>" class="form-control" placeholder="DIRECCION" required>
            </div>

            <div class="form-group col-sm-12">
                <input type="checkbox" id="txtactivo" name="txtactivo" <?php echo ($sede['activo'] == 1) ? 'checked' : '' ?>>
                <label for="txtactivo">Activo</label>
            </div>

            <div class="form-group mx-auto">
                <button type="submit" class="btn btn-primary" onclick="if (!confirm('Esta seguro de modificar el producto?')) return false;">Guardar</button>
                <a href="index.php?c=productos&f=index" class="btn btn-primary">Cancelar</a>
            </div>

    </div>
    </form>
</div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER_ADMIN; ?>