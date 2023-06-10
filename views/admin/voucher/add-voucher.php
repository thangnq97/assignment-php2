<?php require_once __DIR__.'/../header.php'?>

<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" name="name" class="form-control" >
            <div class="help-block with-errors"><?= $err['name'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">DISCOUNT</label>
            <input type="text" name="discount" class="form-control" >
            <div class="help-block with-errors"><?= $err['discount'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">QUANTITY</label>
            <input type="number" name="quantity" class="form-control" >
            <div class="help-block with-errors"><?= $err['quantity'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">MIN PRICE</label>
            <input type="text" name="min_price" class="form-control" >
            <div class="help-block with-errors"><?= $err['min_price'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">EXPIRY</label>
            <input type="date" name="expiry" class="form-control" >
            <div class="help-block with-errors"><?= $err['expiry'] ?? ''?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once __DIR__.'/../footer.php'?>