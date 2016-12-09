<?php

if(isset($_POST['btn-save'])){
    if($data['method'] == "add"){
        $values = array(
            "staffNo" => $_POST['id'],
            "lName" => $_POST['lName'],
            "fName" => $_POST['fName'],
            "position" => $_POST['position'],
            "sex" => $_POST['sex'],
            "DOB" => $_POST['DOB'],
            "salary" => $_POST['salary'],
            "branchNo" => $_POST['branchNo']
        );

        if($db->insert("staff",$values))
            header("Location: ?page=edit_staff&id=".$_POST['id']."&success=1");
        else
            header("Location: ?page=edit_staff&error=1");
    }
    if($data['method'] == "edit"){
        $id = $_POST['id'];
        $values = array(
            "lName" => $_POST['lName'],
            "fName" => $_POST['fName'],
            "position" => $_POST['position'],
            "sex" => $_POST['sex'],
            "DOB" => $_POST['DOB'],
            "salary" => $_POST['salary'],
            "branchNo" => $_POST['branchNo']
        );

        if($db->update("staff", $values, "staffNo = '".$id."'"))
            header("Location: ?page=edit_staff&id=".$id."&success=1");
        else
            header("Location: ?page=edit_staff&id=".$id."&error=1");
    }
}

?>

<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Ажилтан <?php if($data['method'] == "add") echo "нэмэх"; else echo "засах"; ?></legend>
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
                <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['method']=='edit' ? $data['staff']['staffNo'] : ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="lName" class="control-label">Овог</label>
                <input type="text" class="form-control" name="lName" id="lName" value="<?php if($data['method']=='edit') echo $data['staff']['lName']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="fName" class="control-label">Нэр</label>
                <input type="text" class="form-control" name="fName" id="fName" value="<?php if($data['method']=='edit') echo $data['staff']['fName']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="position" class="control-label">Албан тушаал</label>
                <input type="text" class="form-control" name="position" id="position" value="<?php if($data['method']=='edit') echo $data['staff']['position']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="DOB" class="control-label">Төрсөн огноо</label>
                <input type="text" class="form-control datepicker" name="DOB" id="DOB" value="<?php if($data['method']=='edit') echo $data['staff']['DOB']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="salary" class="control-label">Цалин</label>
                <input type="number" min="0" class="form-control" name="salary" id="salary" value="<?php if($data['method']=='edit') echo $data['staff']['salary']; else echo ''; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="branchNo" class="control-label">Салбар</label>
                <select name="branchNo" id="branchNo" class="form-control" required>
                    <?php
                    $result = $db->select("branch", "branchNo");
                    foreach ($result as $item) {
                    ?>
                	<option value="<?php echo $item['branchNo']; ?>" <?php if($data['method']=='edit') if($data['staff']['branchNo'] == $item['branchNo']) echo 'selected'; ?>><?php echo $item['branchNo']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group form-inline">
                    <label class="control-label">Хүйс</label>
                    <div class="col-sm6 radio-inline">
                        <div class="radio radio-primary">
                            <input type="radio" name="sex" id="c1" value="M" <?php if($data['method']=='edit') if($data['staff']['sex'] == "M") echo "checked"; ?>>
                            <label for="c1">
                                Эрэгтэй
                            </label>
                        </div>
                    </div>
                    <div class="col-sm6 radio-inline">
                        <div class="radio radio-danger">
                            <input type="radio" name="sex" id="c2" value="F" <?php if($data['method']=='edit') if($data['staff']['sex'] == "F") echo "checked"; ?>>
                            <label for="c2">
                                Эмэгтэй
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group text-center">
            <a href="?page=staff" class="btn btn-link btn-lg"><i class="fa fa-arrow-left"></i> Буцах</a>
            <button type="submit" name="btn-save" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Хадгалах</button>
        </div>
    </form>
</div>
