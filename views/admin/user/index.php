<?php require_once __DIR__.'/../header.php'?>

<div class="table w-50">
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ROLE</th>
        </thead>
        <tbody>
            <?php foreach($users as $user):?>
                <tr>
                    <td><?= $user->id?></td>
                    <td><?= $user->username?></td>
                    <td><?= $user->password?></td>
                    <td><?= $user->role?></td>
                    <td>
                        <a onclick="return confirm('are you sure?')" class="btn btn-danger" href="./delete-user?id=<?= $user->id?>">delete</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__.'/../footer.php'?>