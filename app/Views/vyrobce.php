<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>

<div class="row">
    <?php foreach($komponent as $row): ?>

    <div class="col-md-6 col-12 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <?= anchor('', $row->nazev); ?>
                </h5>
                <p>
                    <?= $row->typKomponent; ?>
                </p>
                <img class="img-fluid" src="<?= base_url('img/komponenty/'.$row->pic); ?>" alt="<?= "Komponenta ".$row->nazev ?>">
            </div>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>