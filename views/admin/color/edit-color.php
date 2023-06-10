<?php require_once __DIR__.'/../header.php'?>
<div class="mt-4 mb-4">
    <a href="./color-manager" class="btn btn-success">back</a>
</div>
<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
    <input type="hidden" name="id" value="<?= $color->id?>">
        <div class="mt-3 mb-3">
            <div class="help-block with-errors"><?= $_GET['msg'] ?? ''?></div>
        </div>
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $color->name?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once __DIR__.'/../footer.php'?>