<?php $this->load->view('header') ?>
<div class="pbody">
    <div class="container">
        <?php foreach($products as $row){?>
        <div class="col-md-6">
            <div class="product">
                <div class="pimage">
                    <img class="img-responsive" src="<?= base_url() ?>uploads/<?= $row['image']?>">
                </div>
                <div class="pdata">
                    <h4><?= $row['name']?></h4>
                    <p><?= $row['description']?></p>
                    <p>Stock : <?= $row['stock']?></p>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>
<?php
$this->load->view('footer')?>