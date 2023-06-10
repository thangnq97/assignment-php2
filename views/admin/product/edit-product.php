<?php require_once __DIR__.'/../header.php'?>
<div class="mt-4 mb-4">
    <a href="./product-manager" class="btn btn-success">back</a>
</div>
<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
        <input type="hidden" name="id" value="<?= $product->id?>">
        <div class="mt-3 mb-3">
            <div class="help-block with-errors"><?= $_GET['msg'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $product->name?>">
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Detail</label>
            <textarea name="detail" id="" cols="30" rows="5" class="form-control"><?= $product->detail?></textarea>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="<?= $product->quantity?>">
        </div>
        <div class="mb-3 form-group">
            <img src="./imgs/<?= $product->image?>" style="width: 150px; height: 150px;" alt="">
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Image</label>
            <input class="form-control" type="file" name="image" >
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Category</label>
            <select name="cate_id" id="" class="form-control" >
                <?php foreach($cates as $cate):?>
                    <option <?= ($cate->id === $product->cate_id) ? 'selected' : ''?> value="<?= $cate->id?>"><?= $cate->name?></option>
                <?php endforeach?>
            </select>
            <div class="help-block with-errors"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once __DIR__.'/../footer.php'?>