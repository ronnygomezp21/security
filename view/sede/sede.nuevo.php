<!-- autor: Orobio Vásquez Madelyne -->
<?php require_once HEADER_ADMIN; ?>
<div style="text-align: center;" class="container mt-5 pt-4">
    <h2>Nueva Sede</h2>
    </div>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=sede&f=new" method="POST" name="formProdNuevo" id="formProdNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="txtprovincia">Provincia</label>
                    <input type="text" name="txtprovincia" id="txtprovincia" class="form-control" placeholder="INGRESE PROVINCIA" autofocus="" required />
                </div>
                <div class="form-group col-sm-6">
                    <label for="txtciudad">Ciudad</label>
                    <input type="text" name="txtciudad" id="txtciudad" class="form-control" placeholder="INGRESE CIUDAD" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="txthorario">Horarios</label>
                    <select id="txthorario" name="txthorario" class="form-control">
                        <option value='matutina'>matutino</option>
                        <option value='vespertino'>vespertino</option>
                        <option value='nocturno'>nocturno</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="txtdireccion">Direccion</label>
                    <input type="text" name="txtdireccion" id="txtdireccion" class="form-control" placeholder="DIRECCION" required>
                </div>

                <div class="form-group col-sm-12">
                    <input type="checkbox" id="txtactivo" name="txtactivo">
                    <label for="txtactivo">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=sede&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER_ADMIN; ?>