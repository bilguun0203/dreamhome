<div class="container">
    <h2>Үйлчлүүлэгчид санал болгох байр</h2>

<!--    --><?php //dump($data['propertyforrent']); ?>
    <?php if($data['propertyforrent'] != 0){
        foreach ($data['propertyforrent'] as $item){
        ?>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="table-responsive">
                        <h4>Байр</h4>
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
                                <th>Ажилтан</th>
                                <th>Салбарын дугаар</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $item['propertyNo']; ?></td>
                                <td><?php echo $item['street']; ?></td>
                                <td><?php echo $item['city']; ?></td>
                                <td><?php echo $item['postcode']; ?></td>
                                <td><?php echo $item['type']; ?></td>
                                <td><?php echo $item['rooms']; ?></td>
                                <td><?php echo $item['rent']; ?></td>
                                <td><?php
                                    $st = $db->select("staff","*","staffNo = '".$item['staffNo']."'");
                                    echo $item['staffNo'] . " " . $st['lName'] . " " . $st['fName']; ?>
                                </td>
                                <td><?php echo $item['branchNo']; ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <h4>Эзэмшигч</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Дугаар</th>
                                <th>Овог</th>
                                <th>Нэр</th>
                                <th>Утас</th>
                                <th>Хаяг</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $item['owner']['ownerNo']; ?></td>
                                <td><?php echo $item['owner']['lName']; ?></td>
                                <td><?php echo $item['owner']['fName']; ?></td>
                                <td><?php echo $item['owner']['telNo']; ?></td>
                                <td><?php echo $item['owner']['address']; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <?php }} else { ?>
        <div class="alert alert-info">
        	<strong>Уучлаарай!</strong> Санал болгох өгөгдөл олдсонгүй.
        </div>
    <?php } ?>
</div>
