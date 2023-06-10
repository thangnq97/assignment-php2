<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>CONTENT</th>
            <th>USER</th>
            <th>PRODUCT</th>
            <th>ACTION</th>
        </thead>
        <tbody>
            <?php foreach($comments as $cmt):?>
                <tr>
                    <td><?= $cmt->id?></td>
                    <td><?= $cmt->content?></td>
                    <td>
                        <?php foreach($users as $user) {
                           echo ($cmt->user_id === $user->id) ? $user->username : '';
                        }?>
                    </td>
                    <td>
                        <?php foreach($products as $pro) {
                           echo ($cmt->product_id === $pro->id) ? $pro->name : '';
                        }?>
                    </td>
                    <td>
                        <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="./delete-cmt?id=<?= $cmt->id?>">delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>