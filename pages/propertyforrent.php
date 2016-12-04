<div class="container">
    <p>
    <h1>Түрээсийн байр</h1>
    <a href="?page=edit_property" class="btn btn-primary"><i class="fa fa-plus"></i> Нэмэх</a>
    </p>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Дугаар</th>
                <th>Гудамж</th>
                <th>Хот</th>
                <th>Шуудангийн хаяг</th>
                <th>Төрөл</th>
                <th>Өрөөний тоо</th>
                <th>Үнэ</th>
                <th>Эзэмшигч</th>
                <th>Ажилтан</th>
                <th>Салбарын дугаар</th>
            </tr>
            </thead>
            <tbody>
            <?php if($data['propertyforrent'] != 0) foreach ($data['propertyforrent'] as $item) { ?>
                <tr>
                    <td><?php echo $item['propertyNo']; ?></td>
                    <td><?php echo $item['street']; ?></td>
                    <td><?php echo $item['city']; ?></td>
                    <td><?php echo $item['postcode']; ?></td>
                    <td><?php echo $item['type']; ?></td>
                    <td><?php echo $item['rooms']; ?></td>
                    <td><?php echo $item['rent']; ?></td>
                    <td><?php
                        $ow = $db->select("privateowner","*","ownerNo = '".$item['ownerNo']."'");
                        echo $item['ownerNo'] . " " . $ow['lName'] . " " . $ow['fName']; ?>
                    </td>
                    <td><?php
                        $st = $db->select("staff","*","staffNo = '".$item['staffNo']."'");
                        echo $item['staffNo'] . " " . $st['lName'] . " " . $st['fName']; ?>
                    </td>
                    <td><?php echo $item['branchNo']; ?></td>
                    <td><a href="?page=edit_property&id=<?php echo $item['propertyNo']; ?>"><i class="fa fa-edit"></i> Засах</a></td>
                    <td><a href="?page=delete&table=propertyforrent&col=propertyNo&id=<?php echo $item['propertyNo']; ?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')"><i class="fa fa-remove"></i> Устгах</a></td>
                </tr>
            <?php }
            else echo "<tr><td>Өгөгдөл олдсонгүй</td></tr>"; ?>
            </tbody>
        </table>
    </div>
</div>
