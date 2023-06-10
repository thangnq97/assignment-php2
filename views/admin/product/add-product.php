<?php require_once __DIR__.'/../header.php'?>

<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" name="name" class="form-control" >
            <div class="help-block with-errors"><?= $err['name'] ?? ''?></div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Detail</label>
            <textarea name="detail" id="" cols="30" rows="5" class="form-control"></textarea>
            <div class="help-block with-errors"><?= $err['detail'] ?? ''?></div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" >
            <div class="help-block with-errors"><?= $err['quantity'] ?? ''?></div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Image</label>
            <input class="form-control" type="file" name="image" >
            <div class="help-block with-errors"><?= $err['image'] ?? ''?></div>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="control-label">Category</label>
            <select name="cate_id" id="" class="form-control" >
                <?php foreach($cates as $cate):?>
                    <option value="<?= $cate->id?>"><?= $cate->name?></option>
                <?php endforeach?>
            </select>
            <div class="help-block with-errors"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once __DIR__.'/../footer.php'?>