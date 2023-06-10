<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>DISCOUT</th>
            <th>QUANTITY</th>
            <th>MIN PRICE</th>
            <th>EXPIRY</th>
            <th>
                <a class="btn btn-primary" href="./add-voucher">Add new</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($vouchers as $voucher):?>
                <tr>
                    <td><?= $voucher->id?></td>
                    <td><?= $voucher->name?></td>
                    <td><?= $voucher->discount?></td>
                    <td><?= $voucher->quantity?></td>
                    <td><?= $voucher->min_price?></td>
                    <td><?= $voucher->expiry?></td>
                    <td>
                        <a class="btn btn-success" href="./edit-voucher?id=<?= $voucher->id?>">edit</a>
                        <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="./delete-voucher?id=<?= $voucher->id?>">delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>