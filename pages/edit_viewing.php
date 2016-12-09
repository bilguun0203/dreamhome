<?php

if(isset($_POST['btn-save'])){
    if($data['method'] == "add"){
        $values = array(
            "clientNo" => $_POST['clientNo'],
            "propertyNo" => $_POST['propertyNo'],
            "viewDate" => $_POST['viewDate'],
            "comment" => $_POST['comment']
        );

        if($db->insert("viewing",$values))
            header("Location: ?page=edit_viewing&success=1");
        else
            header("Location: ?page=edit_viewing&error=1");
    }
    if($data['method'] == "edit"){
        $id = $_GET['id'];
        echo $id;
        $values = array(
            "clientNo" => $_POST['clientNo'],
            "propertyNo" => $_POST['propertyNo'],
            "viewDate" => $_POST['viewDate'],
            "comment" => $_POST['comment']
        );

        if($db->update("viewing", $values, "id = '".$id."'"))
            header("Location: ?page=edit_viewing&id=".$id."&success=1");
        else
            header("Location: ?page=edit_viewing&id=".$id."&error=1");
    }
}

?>

<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Бүртгэл <?php if($data['method'] == "add") echo "нэмэх"; else echo "засах"; ?></legend>
        </div>
        <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Анхаар!</strong> Алдаа гарлаа.
            </div>
        <?php } ?>
        <?php if(isset($_GET['success'])) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Амжилттай!</strong> Үйлдлийг амжилттай гүйцэтгэлээ.
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-4">
                <label for="clientNo" class="control-label">Үйлчлүүлэгч</label>
<!--                <input type="text" class="form-control" name="clientNo" id="clientNo" value="--><?php //if($data['method']=='edit') echo $data['viewing']['clientNo']; else echo ''; ?><!--" required>-->
                <select name="clientNo" id="clientNo" class="form-control" required>
                    <?php
                    $result = $db->select("client");
                    foreach ($result as $item) {
                        ?>
                        <option value="<?php echo $item['clientNo']; ?>" <?php if($data['method']=='edit') if($data['viewing']['clientNo'] == $item['clientNo']) echo 'selected'; ?>><?php echo $item['clientNo']." - ".$item['fName']." ".$item['lName']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="propertyNo" class="control-label">Түрээсийн байр</label>
<!--                <input type="text" class="form-control" name="propertyNo" id="propertyNo" value="--><?php //if($data['method']=='edit') echo $data['viewing']['propertyNo']; else echo ''; ?><!--" required>-->
                <select name="propertyNo" id="propertyNo" class="form-control" required>
                    <?php
                    $result = $db->select("propertyforrent");
                    foreach ($result as $item) {
                        ?>
                        <option value="<?php echo $item['propertyNo']; ?>" <?php if($data['method']=='edit') if($data['viewing']['propertyNo'] == $item['propertyNo']) echo 'selected'; ?>><?php echo $item['propertyNo']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="viewDate" class="control-label">Үзсэн огноо</label>
                <input type="text" class="form-control datepicker" name="viewDate" id="viewDate" value="<?php if($data['method']=='edit') echo $data['viewing']['viewDate']; else echo ''; ?>" required>
            </div>
            <div class="col-md-12">
                <label for="comment" class="control-label">Сэтгэгдэл</label>
                <textarea name="comment" id="comment" class="form-control" cols="30" rows="4" required><?php if($data['method']=='edit') echo $data['viewing']['comment']; else echo ''; ?></textarea>
            </div>
        </div>
        <hr><hr>
        <div class="row">
            <div class="form-group text-center">
                <a href="?page=viewing" class="btn btn-link btn-lg"><i class="fa fa-arrow-left"></i> Буцах</a>
                <button type="submit" name="btn-save" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Хадгалах</button>
            </div>
        </div>
    </form>
</div>
