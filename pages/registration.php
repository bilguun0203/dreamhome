<div class="container">
    <p>
    <h1>Бүртгэл</h1>
    <a href="?page=edit_registration" class="btn btn-primary"><i class="fa fa-plus"></i> Нэмэх</a>
    </p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Дугаар</th>
                <th>Үйлчлүүлэгч</th>
                <th>Салбар</th>
                <th>Ажилтан</th>
                <th>Огноо</th>
            </tr>
            </thead>
            <tbody>
            <?php if($data['registration'] != 0) foreach ($data['registration'] as $item) { ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['clientNo']; ?></td>
                    <td><?php echo $item['branchNo']; ?></td>
                    <td><?php echo $item['staffNo']; ?></td>
                    <td><?php echo $item['dateJoined']; ?></td>
                    <td><a href="?page=edit_registration&id=<?php echo $item['id']; ?>"><i class="fa fa-edit"></i> Засах</a></td>
                    <td><a href="?page=delete&table=registration&col=id&id=<?php echo $item['id']; ?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')"><i class="fa fa-remove"></i> Устгах</a></td>
                </tr>
            <?php }
            else echo "<tr><td>Өгөгдөл олдсонгүй</td></tr>"; ?>
            </tbody>
        </table>
    </div>
</div>
