<!-- autor: Zuñiga Kayler -->
<?php
require_once HEADER_ADMIN;?>
<main>
<br><br><br>
    <div style="text-align: rigth;" class="container">
    <h2>Dashboard</h2>
    </div>
    <div class="container">
    <?php if (!empty($_SESSION['mensaje'])) {?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['mensaje']; ?>
</div>
    <?php
unset($_SESSION['mensaje']);}?>

    </div><br>
    <div class="container">
    <div class="alert alert-success" role="alert">
    <p class="alert-heading">¡Bienvenido/a!</p>
  <h2><?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos']; ?></h2>
  <hr>
  <p class="mb-0"></p>
</div>
    </div>
</main>
<?php
require_once FOOTER_ADMIN;?>