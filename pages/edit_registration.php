<?php

if(isset($_POST['btn-save'])){
    if($data['method'] == "add"){
        $values = array(
            "clientNo" => $_POST['clientNo'],
            "staffNo" => $_POST['staffNo'],
            "branchNo" => $_POST['branchNo'],
            "dateJoined" => $_POST['dateJoined']
        );

        if($db->insert("registration",$values))
            header("Location: ?page=edit_registration&success=1");
        else
            header("Location: ?page=edit_registration&error=1");
    }
    if($data['method'] == "edit"){
        $id = $_GET['id'];
        echo $id;
        $values = array(
            "clientNo" => $_POST['clientNo'],
            "staffNo" => $_POST['staffNo'],
            "branchNo" => $_POST['branchNo'],
            "dateJoined" => $_POST['dateJoined']
        );

        if($db->update("registration", $values, "id = '".$id."'"))
            header("Location: ?page=edit_registration&id=".$id."&success=1");
        else
            header("Location: ?page=edit_registration&id=".$id."&error=1");
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
            <div class="col-md-6">
                <label for="clientNo" class="control-label">Үйлчлүүлэгч</label>
                <input type="text" class="form-control" name="clientNo" id="clientNo" value="<?php if($data['method']=='edit') echo $data['registration']['clientNo']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="staffNo" class="control-label">Ажилтан</label>
                <input type="text" class="form-control" name="staffNo" id="staffNo" value="<?php if($data['method']=='edit') echo $data['registration']['staffNo']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="branchNo" class="control-label">Салбар</label>
                <input type="text" class="form-control" name="branchNo" id="branchNo" value="<?php if($data['method']=='edit') echo $data['registration']['branchNo']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="dateJoined" class="control-label">Бүртгэгдсэн огноо</label>
                <input type="text" class="form-control datepicker" name="dateJoined" id="dateJoined" value="<?php if($data['method']=='edit') echo $data['registration']['dateJoined']; else echo ''; ?>" required>
            </div>
        </div>
        <hr><hr>
        <div class="row">
            <div class="form-group text-center">
                <a href="?page=registration" class="btn btn-link btn-lg"><i class="fa fa-arrow-left"></i> Буцах</a>
                <button type="submit" name="btn-save" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Хадгалах</button>
            </div>
        </div>
    </form>
</div>
