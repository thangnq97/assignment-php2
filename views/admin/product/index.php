<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>IMG</th>
            <th style="width: 33%;">detail</th>
            <th>category</th>
            <th>quantity</th>
            <th>
                <a class="btn btn-primary" href="./add-product">Add new</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($products as $pro):?>
                <tr>
                    <td><?= $pro->id?></td>
                    <td><?= $pro->name?></td>
                    <td>
                        <img src="./imgs/<?= $pro->image?>" style="width: 150px; height: 150px;">
                    </td>
                    <td class="w-30"><?= $pro->detail?></td>
                    <td>
                        <?php foreach($cates as $cate) {
                            echo ($cate->id === $pro->cate_id) ? $cate->name : '';
                        }?>
                    </td>
                    <td><?= $pro->quantity?></td>
                    <td>
                        <a class="btn btn-success" href="./edit-product?id=<?= $pro->id?>">edit</a>
                        <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="./delete-product?id=<?= $pro->id?>">delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>