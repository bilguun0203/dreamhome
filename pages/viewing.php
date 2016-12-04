<div class="container">
    <p>
    <h1>Сэтгэгдэл</h1>
    <a href="?page=edit_viewing" class="btn btn-primary"><i class="fa fa-plus"></i> Нэмэх</a>
    </p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Дугаар</th>
                <th>Үйлчлүүлэгч</th>
                <th>Түрээсийн байр</th>
                <th>Үзсэн огноо</th>
                <th>Сэтгэгдэл</th>
            </tr>
            </thead>
            <tbody>
            <?php if($data['viewing'] != 0) foreach ($data['viewing'] as $item) { ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['clientNo']; ?></td>
                    <td><?php echo $item['propertyNo']; ?></td>
                    <td><?php echo $item['viewDate']; ?></td>
                    <td><?php echo $item['comment']; ?></td>
                    <td><a href="?page=edit_viewing&id=<?php echo $item['id']; ?>"><i class="fa fa-edit"></i> Засах</a></td>
                    <td><a href="?page=delete&table=viewing&col=id&id=<?php echo $item['id']; ?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')"><i class="fa fa-remove"></i> Устгах</a></td>
                </tr>
            <?php }
            else echo "<tr><td>Өгөгдөл олдсонгүй</td></tr>"; ?>
            </tbody>
        </table>
    </div>
</div>
