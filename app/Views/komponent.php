<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>

<h1 class="text-center m-4">
    <?= $nazevKomponenty ?>
</h1>

<div class="row">
    <?php
        foreach($infoKomponent as $row){
            echo $row->nazev.":\n";
            echo $row->hodnota."\n";
        };
    ?>
</div>

<?= $this->endSection(); ?>