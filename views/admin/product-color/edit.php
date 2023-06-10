<?php require_once __DIR__.'/../header.php'?>
<div class="mt-4 mb-4">
    <a href="./pro_color-manager" class="btn btn-success">back</a>
</div>
<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
        <input type="hidden" name="id" value="<?= $item->id?>">
        <div class="mt-3 mb-3">
            <div class="help-block with-errors"><?= $_GET['msg'] ?? ''?></div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Product</label>
            <select name="product_id" id="" class="form-control" >
                <?php foreach($products as $pro):?>
                    <option <?= ($item->product_id === $pro->id) ? 'selected' : ''?> value="<?= $pro->id?>"><?= $pro->name?></option>
                <?php endforeach?>
            </select>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Color</label>
            <select name="color_id" id="" class="form-control" >
                <?php foreach($colors as $color):?>
                    <option <?= ($item->color_id === $color->id) ? 'selected' : ''?> value="<?= $color->id?>"><?= $color->name?></option>
                <?php endforeach?>
            </select>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Price</label>
            <input type="text" name="price" class="form-control" value="<?= $item->price?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once __DIR__.'/../footer.php'?>