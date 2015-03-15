<div class="row">
    <div class="col-sm-4">
        <h2>SERVER</h2>
        <?php var_dump($_SERVER); //toutes les infos serveurs ?>
    </div>
    <div class="col-sm-4">
        <h2>CONSTANTE</h2>
        <?php var_dump(get_defined_constants()); // les constantes ?>
    </div>
    <div class="col-sm-4">
        <h2>SESSION</h2>
        <?php var_dump($_SESSION); //toutes les infos sessions ?>
    </div>
</div>