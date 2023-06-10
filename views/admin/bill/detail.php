<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>quantity</th>
            <th>color</th>
            <th>product</th>
            <th>total price</th>
            <th><a class="btn btn-primary" href="./bill-manager">back</a></th>
        </thead>
        <tbody>
            <?php foreach($data as $item):?>
                <tr>
                    <td><?= $item['id']?></td>
                    <td><?= $item['quantity']?></td>
                    <td><?= $item['color']?></td>
                    <td><?= $item['product']?></td>
                    <td><?= $item['total_price']?></td>
                    <td></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>