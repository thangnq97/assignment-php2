<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>
                <a class="btn btn-primary" href="./add-category">Add new</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($cates as $cate):?>
                <tr>
                    <td><?= $cate->id?></td>
                    <td><?= $cate->name?></td>
                    <td>
                        <a class="btn btn-success" href="./edit-category?id=<?= $cate->id?>">edit</a>
                        <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="./delete-category?id=<?= $cate->id?>">delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>