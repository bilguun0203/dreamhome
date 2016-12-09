<div class="container">
    <p>
    <h1>Үйлчлүүлэгч</h1>
    <a href="?page=edit_client" class="btn btn-primary"><i class="fa fa-plus"></i> Нэмэх</a>
    </p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Дугаар</th>
                <th>Овог</th>
                <th>Нэр</th>
                <th>Утас</th>
                <th>Сонирхож буй төрөл</th>
                <th>Үнийн санал</th>
            </tr>
            </thead>
            <tbody>
            <?php if($data['client'] != 0) foreach ($data['client'] as $item) { ?>
                <tr>
                    <td><a href="?page=client_suggest&id=<?php echo $item['clientNo']; ?>"><?php echo $item['clientNo']; ?></a></td>
                    <td><?php echo $item['lName']; ?></td>
                    <td><?php echo $item['fName']; ?></td>
                    <td><?php echo $item['telNo']; ?></td>
                    <td><?php echo $item['prefType']; ?></td>
                    <td><?php echo $item['maxRent']; ?></td>
                    <td><a href="?page=edit_client&id=<?php echo $item['clientNo']; ?>"><i class="fa fa-edit"></i> Засах</a></td>
                    <td><a href="?page=delete&table=client&col=clientNo&id=<?php echo $item['clientNo']; ?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')"><i class="fa fa-remove"></i> Устгах</a></td>
                </tr>
            <?php }
            else echo "<tr><td>Өгөгдөл олдсонгүй</td></tr>"; ?>
            </tbody>
        </table>
    </div>
</div>
