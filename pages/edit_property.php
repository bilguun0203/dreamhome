<?php

if(isset($_POST['btn-save'])){
    if($data['method'] == "add"){
        $values = array(
            "propertyNo" => $_POST['id'],
            "street" => $_POST['street'],
            "city" => $_POST['city'],
            "postcode" => $_POST['postcode'],
            "type" => $_POST['type'],
            "rooms" => $_POST['rooms'],
            "rent" => $_POST['rent'],
            "ownerNo" => $_POST['ownerNo'],
            "staffNo" => $_POST['staffNo'],
            "branchNo" => $_POST['branchNo'],
        );

        if($db->insert("propertyforrent",$values))
            header("Location: ?page=edit_property&id=".$_POST['id']."&success=1");
        else
            header("Location: ?page=edit_property&error=1");
    }
    if($data['method'] == "edit"){
        $id = $_POST['id'];
        $values = array(
            "street" => $_POST['street'],
            "city" => $_POST['city'],
            "postcode" => $_POST['postcode'],
            "type" => $_POST['type'],
            "rooms" => $_POST['rooms'],
            "rent" => $_POST['rent'],
            "ownerNo" => $_POST['ownerNo'],
            "staffNo" => $_POST['staffNo'],
            "branchNo" => $_POST['branchNo'],
        );

        if($db->update("propertyforrent", $values, "propertyNo = '".$id."'"))
            header("Location: ?page=edit_property&id=".$id."&success=1");
        else
            header("Location: ?page=edit_property&id=".$id."&error=1");
    }
}

?>

<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Түрээсийн байр <?php if($data['method'] == "add") echo "нэмэх"; else echo "засах"; ?></legend>
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
            <div class="col-md-6" <?php if($data['method'] == "edit") echo "hidden"; ?>>
                <label for="id" class="control-label">Дугаар</label>
                <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['method']=='edit' ? $data['property']['propertyNo'] : ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="street" class="control-label">Гудамж</label>
                <input type="text" class="form-control" name="street" id="street" value="<?php if($data['method']=='edit') echo $data['property']['street']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="city" class="control-label">Хот</label>
                <input type="text" class="form-control" name="city" id="city" value="<?php if($data['method']=='edit') echo $data['property']['city']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="postcode" class="control-label">Шуудангийн хаяг</label>
                <input type="text" class="form-control" name="postcode" id="postcode" value="<?php if($data['method']=='edit') echo $data['property']['postcode']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="type" class="control-label">Төрөл</label>
                <input type="text" class="form-control" name="type" id="type" value="<?php if($data['method']=='edit') echo $data['property']['type']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="rooms" class="control-label">Өрөө</label>
                <input type="number" min="1" class="form-control" name="rooms" id="rooms" value="<?php if($data['method']=='edit') echo $data['property']['rooms']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="rent" class="control-label">Үнэ</label>
                <input type="number" min="0" class="form-control" name="rent" id="rent" value="<?php if($data['method']=='edit') echo $data['property']['rent']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="ownerNo" class="control-label">Эзэмшигч</label>
                <input type="text" class="form-control" name="ownerNo" id="ownerNo" value="<?php if($data['method']=='edit') echo $data['property']['ownerNo']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="staffNo" class="control-label">Ажилтан</label>
                <input type="text" class="form-control" name="staffNo" id="staffNo" value="<?php if($data['method']=='edit') echo $data['property']['staffNo']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="branchNo" class="control-label">Салбар</label>
                <input type="text" class="form-control" name="branchNo" id="branchNo" value="<?php if($data['method']=='edit') echo $data['property']['branchNo']; else echo ''; ?>" required>
            </div>
        </div>
        <hr>
        <div class="form-group text-center">
            <a href="?page=propertyforrent" class="btn btn-link btn-lg"><i class="fa fa-arrow-left"></i> Буцах</a>
            <button type="submit" name="btn-save" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Хадгалах</button>
        </div>
    </form>
</div>
