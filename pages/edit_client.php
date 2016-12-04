<?php

if(isset($_POST['btn-save'])){
    if($data['method'] == "add"){
        $values = array(
            "clientNo" => $_POST['id'],
            "lName" => $_POST['lName'],
            "fName" => $_POST['fName'],
            "telNo" => $_POST['telNo'],
            "prefType" => $_POST['prefType'],
            "maxRent" => $_POST['maxRent']
        );

        if($db->insert("client",$values))
            header("Location: ?page=edit_client&id=".$_POST['id']."&success=1");
        else
            header("Location: ?page=edit_client&error=1");
    }
    if($data['method'] == "edit"){
        $id = $_POST['id'];
        $values = array(
            "lName" => $_POST['lName'],
            "fName" => $_POST['fName'],
            "telNo" => $_POST['telNo'],
            "prefType" => $_POST['prefType'],
            "maxRent" => $_POST['maxRent']
        );

        if($db->update("client", $values, "clientNo = '".$id."'"))
            header("Location: ?page=edit_client&id=".$id."&success=1");
        else
            header("Location: ?page=edit_client&id=".$id."&error=1");
    }
}

?>

<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Үйлчлүүлэгч <?php if($data['method'] == "add") echo "нэмэх"; else echo "засах"; ?></legend>
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
                <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['method']=='edit' ? $data['client']['clientNo'] : ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="lName" class="control-label">Овог</label>
                <input type="text" class="form-control" name="lName" id="lName" value="<?php if($data['method']=='edit') echo $data['client']['lName']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="fName" class="control-label">Нэр</label>
                <input type="text" class="form-control" name="fName" id="fName" value="<?php if($data['method']=='edit') echo $data['client']['fName']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="telNo" class="control-label">Утас</label>
                <input type="text" class="form-control" name="telNo" id="telNo" value="<?php if($data['method']=='edit') echo $data['client']['telNo']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="prefType" class="control-label">Сонирхдог төрөл</label>
                <input type="text" class="form-control" name="prefType" id="prefType" value="<?php if($data['method']=='edit') echo $data['client']['prefType']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="maxRent" class="control-label">Үнийн санал</label>
                <input type="number" min="0" class="form-control" name="maxRent" id="maxRent" value="<?php if($data['method']=='edit') echo $data['client']['maxRent']; else echo ''; ?>" required>
            </div>
        </div>
        <hr>
        <div class="form-group text-center">
            <a href="?page=client" class="btn btn-link btn-lg"><i class="fa fa-arrow-left"></i> Буцах</a>
            <button type="submit" name="btn-save" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Хадгалах</button>
        </div>
    </form>
</div>
