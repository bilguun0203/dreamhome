<div class="container">
    <p>
        <h1>Салбар</h1>
        <a href="?page=edit_branch" class="btn btn-primary"><i class="fa fa-plus"></i> Нэмэх</a>
    </p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Дугаар</th>
                    <th>Гудамж</th>
                    <th>Хот</th>
                    <th>Шуудангийн дугаар</th>
                    <th>Үйлдэл</th>
                </tr>
            </thead>
            <tbody>
                <?php if($data['branch'] != 0) foreach ($data['branch'] as $item) { ?>
                <tr>
                    <td><?php echo $item['branchNo']; ?></td>
                    <td><?php echo $item['street']; ?></td>
                    <td><?php echo $item['city']; ?></td>
                    <td><?php echo $item['postcode']; ?></td>
                    <td><a href="?page=edit_branch&id=<?php echo $item['branchNo']; ?>"><i class="fa fa-edit"></i> Засах</a></td>
                    <td><a href="?page=delete&table=branch&col=branchNo&id=<?php echo $item['branchNo']; ?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')"><i class="fa fa-remove"></i> Устгах</a></td>
                </tr>
                <?php }
                else echo "<tr><td>Өгөгдөл олдсонгүй</td></tr>"; ?>
            </tbody>
        </table>
    </div>
</div>
