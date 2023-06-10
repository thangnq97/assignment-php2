<?php require_once __DIR__.'/../header.php'?>

<form action="" method="POST" enctype="multipart/form-data" data-toggle="validator" role="form">
        <div class="mb-3 mt-3 form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" name="name" class="form-control" >
            <div class="help-block with-errors"><?= $err['name'] ?? ''?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php require_once __DIR__.'/../footer.php'?>