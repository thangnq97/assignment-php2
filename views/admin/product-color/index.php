<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>PRODUCT</th>
            <th>COLOR</th>
            <th>price</th>
            <th>
                <a class="btn btn-primary" href="./add-pro_color">Add new</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($pro_color as $item):?>
                <tr>
                    <td><?= $item->id?></td>
                    <td>
                        <?php foreach($products as $pro) {
                            echo ($pro->id === $item->product_id) ? $pro->name : '';
                        }?>
                    </td>
                    <td>
                        <?php foreach($colors as $color) {
                            echo ($color->id === $item->color_id) ? $color->name : '';
                        }?>
                    </td>
                    <td><?= number_format($item->price)?></td>
                    <td>
                        <a class="btn btn-success" href="./edit-pro_color?id=<?= $item->id?>">edit</a>
                        <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="./delete-pro_color?id=<?= $item->id?>">delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>