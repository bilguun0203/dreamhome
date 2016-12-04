<div class="container">
    <p>
    <h1>Ажилтан</h1>
    <a href="?page=edit_staff" class="btn btn-primary"><i class="fa fa-plus"></i> Нэмэх</a>
    </p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Дугаар</th>
                <th>Овог</th>
                <th>Нэр</th>
                <th>Албан тушаал</th>
                <th>Хүйс</th>
                <th>Төрсөн огноо</th>
                <th>Цалин</th>
                <th>Салбар</th>
            </tr>
            </thead>
            <tbody>
            <?php if($data['staff'] != 0) foreach ($data['staff'] as $item) { ?>
                <tr>
                    <td><?php echo $item['staffNo']; ?></td>
                    <td><?php echo $item['lName']; ?></td>
                    <td><?php echo $item['fName']; ?></td>
                    <td><?php echo $item['position']; ?></td>
                    <td><?php echo $item['sex']; ?></td>
                    <td><?php echo $item['DOB']; ?></td>
                    <td><?php echo $item['salary']; ?></td>
                    <td><?php echo $item['branchNo']; ?></td>
                    <td><a href="?page=edit_staff&id=<?php echo $item['staffNo']; ?>"><i class="fa fa-edit"></i> Засах</a></td>
                    <td><a href="?page=delete&table=staff&col=staffNo&id=<?php echo $item['staffNo']; ?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')"><i class="fa fa-remove"></i> Устгах</a></td>
                </tr>
            <?php }
            else echo "<tr><td>Өгөгдөл олдсонгүй</td></tr>"; ?>
            </tbody>
        </table>
    </div>
</div>
