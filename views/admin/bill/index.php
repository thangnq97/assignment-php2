<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>full name</th>
            <th>phone</th>
            <th>address</th>
            <th>email</th>
            <th>total price</th>
            <th>created at</th>
            <th>status</th>
            <th>voucher</th>
            <th>acction</th>
        </thead>
        <tbody>
            <?php foreach($bills as $bill):?>
                <tr>
                    <td><?= $bill->id?></td>
                    <td><?= $bill->fullname?></td>
                    <td><?= $bill->phone?></td>
                    <td><?= $bill->address?></td>
                    <td><?= $bill->email?></td>
                    <td><?= $bill->total_price?></td>
                    <td><?= $bill->create_at?></td>
                    <td><a class="btn btn-success" onclick="return confirm('are you sure?')" href="./update-bill?id=<?= $bill->id?>"><?= $bill->status?></a></td>
                    <td>
                        <?php foreach($vouchers as $voucher){
                            echo ($voucher->id === $bill->voucher_id) ? $voucher->discount : '';
                        }?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="./bill-detail?id=<?= $bill->id?>">detail</a>
                        <a class="btn btn-danger" onclick="return confirm('are you sure?')" href="./cancel-bill?id=<?= $bill->id?>">cancel</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>