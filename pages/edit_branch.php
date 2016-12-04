<?php

if(isset($_POST['btn-save'])){
    if($data['method'] == "add"){
        $values = array(
            "branchNo" => $_POST['id'],
            "street" => $_POST['street'],
            "city" => $_POST['city'],
            "postcode" => $_POST['postcode']
        );

        if($db->insert("branch",$values))
            header("Location: ?page=edit_branch&id=".$_POST['id']."&success=1");
        else
            header("Location: ?page=edit_branch&error=1");
    }
    if($data['method'] == "edit"){
        $id = $_POST['id'];
        $values = array(
            "street" => $_POST['street'],
            "city" => $_POST['city'],
            "postcode" => $_POST['postcode']
        );

        if($db->update("branch", $values, "branchNo = '".$id."'"))
            header("Location: ?page=edit_branch&id=".$id."&success=1");
        else
            header("Location: ?page=edit_branch&id=".$id."&error=1");
    }
}

?>

<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Салбар <?php if($data['method'] == "add") echo "нэмэх"; else echo "засах"; ?></legend>
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
                <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['method']=='edit' ? $data['branch']['branchNo'] : ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="street" class="control-label">Гудамж</label>
                <input type="text" class="form-control" name="street" id="street" value="<?php if($data['method']=='edit') echo $data['branch']['street']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="city" class="control-label">Хот</label>
                <input type="text" class="form-control" name="city" id="city" value="<?php if($data['method']=='edit') echo $data['branch']['city']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="postcode" class="control-label">Шуудангийн хаяг</label>
                <input type="text" class="form-control" name="postcode" id="postcode" value="<?php if($data['method']=='edit') echo $data['branch']['postcode']; else echo ''; ?>" required>
            </div>
        </div>
        <hr><hr>
        <div class="row">
            <div class="form-group text-center">
                <a href="?page=branch" class="btn btn-link btn-lg"><i class="fa fa-arrow-left"></i> Буцах</a>
                <button type="submit" name="btn-save" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Хадгалах</button>
            </div>
        </div>
    </form>
</div>
