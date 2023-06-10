<?php require_once __DIR__.'/../header.php'?>

<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
        
        <div class="mb-3 form-group">
            <label for="" class="control-label">Product</label>
            <select name="product_id" id="" class="form-control" >
                <?php foreach($products as $pro):?>
                    <option value="<?= $pro->id?>"><?= $pro->name?></option>
                <?php endforeach?>
            </select>
            <div class="help-block with-errors"><?= $err['product_id'] ?? ''?></div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Color</label>
            <select name="color_id" id="" class="form-control" >
                <?php foreach($colors as $color):?>
                    <option value="<?= $color->id?>"><?= $color->name?></option>
                <?php endforeach?>
            </select>
            <div class="help-block with-errors"><?= $err['color_id'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Price</label>
            <input type="text" name="price" class="form-control" >
            <div class="help-block with-errors"><?= $err['price'] ?? ''?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once __DIR__.'/../footer.php'?>