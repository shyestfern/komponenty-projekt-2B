<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>

<div class="row">
    <?php foreach($vyrobce as $row): ?>
    
    <div class="col-md-6 col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?= anchor('vyrobce/'.$row->idVyrobce, $row->vyrobce); ?>
                </h5>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>