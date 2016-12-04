<div class="container">
    <div class="jumbotron">
    	<div class="container">
            <?php if(isset($_GET['delete'])){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Амжилттай!</strong> Сонгосон мөрийг устгасан.
                </div>
            <?php } ?>
    		<h1>Welcome!</h1>
    		<p>DreamHome Database</p>
    		<p>
    			<a href="?page=branch" class="btn btn-primary"><i class="fa fa-building-o"></i> Салбар</a>
    			<a href="?page=client" class="btn btn-success"><i class="fa fa-users"></i> Үйлчлүүлэгч</a>
    			<a href="?page=privateowner" class="btn btn-info"><i class="fa fa-user-secret"></i> Эзэмшигч</a>
    			<a href="?page=propertyforrent" class="btn btn-warning"><i class="fa fa-building"></i> Түрээсийн байр</a>
    			<a href="?page=registration" class="btn btn-danger"><i class="fa fa-book"></i> Бүртгэл</a>
    			<a href="?page=staff" class="btn btn-primary"><i class="fa fa-user"></i> Ажилтан</a>
    			<a href="?page=viewing" class="btn btn-info"><i class="fa fa-comments-o"></i> Сэтгэгдэл</a>
    		</p>
    	</div>
    </div>
</div>