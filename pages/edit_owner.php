<?php

if(isset($_POST['btn-save'])){
    if($data['method'] == "add"){
        $values = array(
            "ownerNo" => $_POST['id'],
            "lName" => $_POST['lName'],
            "fName" => $_POST['fName'],
            "telNo" => $_POST['telNo'],
            "address" => $_POST['address'],
        );

        if($db->insert("privateowner",$values))
            header("Location: ?page=edit_owner&id=".$_POST['id']."&success=1");
        else
            header("Location: ?page=edit_owner&error=1");
    }
    if($data['method'] == "edit"){
        $id = $_POST['id'];
        $values = array(
            "lName" => $_POST['lName'],
            "fName" => $_POST['fName'],
            "telNo" => $_POST['telNo'],
            "address" => $_POST['address'],
        );

        if($db->update("privateowner", $values, "ownerNo = '".$id."'"))
            header("Location: ?page=edit_owner&id=".$id."&success=1");
        else
            header("Location: ?page=edit_owner&id=".$id."&error=1");
    }
}

?>

<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Эзэмшигч <?php if($data['method'] == "add") echo "нэмэх"; else echo "засах"; ?></legend>
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
                <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['method']=='edit' ? $data['owner']['ownerNo'] : ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="lName" class="control-label">Овог</label>
                <input type="text" class="form-control" name="lName" id="lName" value="<?php if($data['method']=='edit') echo $data['owner']['lName']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="fName" class="control-label">Нэр</label>
                <input type="text" class="form-control" name="fName" id="fName" value="<?php if($data['method']=='edit') echo $data['owner']['fName']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="telNo" class="control-label">Утас</label>
                <input type="text" class="form-control" name="telNo" id="telNo" value="<?php if($data['method']=='edit') echo $data['owner']['telNo']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="address" class="control-label">Хаяг</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php if($data['method']=='edit') echo $data['owner']['address']; else echo ''; ?>" required>
            </div>
        </div>
        <hr>
        <div class="form-group text-center">
            <a href="?page=privateowner" class="btn btn-link btn-lg"><i class="fa fa-arrow-left"></i> Буцах</a>
            <button type="submit" name="btn-save" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Хадгалах</button>
        </div>
    </form>
</div>
