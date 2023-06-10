<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>
                <a class="btn btn-primary" href="./add-color">Add new</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($colors as $color):?>
                <tr>
                    <td><?= $color->id?></td>
                    <td><?= $color->name?></td>
                    <td>
                        <a class="btn btn-success" href="./edit-color?id=<?= $color->id?>">edit</a>
                        <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="./delete-color?id=<?= $color->id?>">delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>