<div class="container">
    <h2>Эзэмшигчийн мэдээлэл</h2>
    <div class="col-md-6">
        <ul class="list-group">
            <li class="list-group-item"><b>Дугаар:</b> <?php echo $data['owner']['ownerNo']; ?></li>
            <li class="list-group-item"><b>Нэр:</b> <?php echo $data['owner']['fName']." ".$data['owner']['lName']; ?></li>
        </ul>
    </div>
    <div class="col-md-6">
        <ul class="list-group">
            <li class="list-group-item"><b>Утас:</b> <?php echo $data['owner']['telNo']; ?></li>
            <li class="list-group-item"><b>Хаяг:</b> <?php echo $data['owner']['address']; ?></li>
        </ul>
    </div>
</div>
