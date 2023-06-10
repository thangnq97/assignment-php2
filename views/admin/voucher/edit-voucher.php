<?php require_once __DIR__.'/../header.php'?>
<div class="mt-4 mb-4">
    <a href="./voucher-manager" class="btn btn-success">back</a>
</div>
<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
        <input type="hidden" name="id" value="<?= $voucher->id?>">
        <div class="mt-3 mb-3">
            <div class="help-block with-errors"><?= $_GET['msg'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $voucher->name?>">
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">DISCOUNT</label>
            <input type="text" name="discount" class="form-control" value="<?= $voucher->discount?>">
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">QUANTITY</label>
            <input type="number" name="quantity" class="form-control" value="<?= $voucher->quantity?>">
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">MIN PRICE</label>
            <input type="text" name="min_price" class="form-control" value="<?= $voucher->min_price?>">
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">EXPIRY</label>
            <input type="date" name="expiry" class="form-control" value="<?= $voucher->expiry?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once __DIR__.'/../footer.php'?>