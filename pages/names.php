<div class="container">
    <div class="table-responsive col-md-6">
        <h2>Нэрсийн жагсаалт</h2>
        <hr>
        <form role="form">
            <div class="input-group">
                <input type="text" id="search-name" class="form-control" placeholder="Хайх...">
                <span class="input-group-btn">
                    <button class="btn btn-info" id="btn-search-name" type="button"><i class="fa fa-search"></i> Хайх</button>
                </span>
            </div>
        </form>
        <hr>
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th>First Name</th>
    				<th>Last Name</th>
    			</tr>
    		</thead>
    		<tbody id="result-name">
    		</tbody>
    	</table>
    </div>
    <div class="table-responsive col-md-6">
        <h2>Утасны жагсаалт</h2>
        <hr>
        <form role="form">
            <div class="input-group">
                <input type="text" id="search-tel" class="form-control" placeholder="Хайх...">
                <span class="input-group-btn">
                    <button class="btn btn-info" id="btn-search-tel" type="button"><i class="fa fa-search"></i> Хайх</button>
                </span>
            </div>
        </form>
        <hr>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Утас</th>
            </tr>
            </thead>
            <tbody id="result-tel">
            </tbody>
        </table>
    </div>
</div>
<script>
    $.post('pages/functions/search_name_tel.php', { text: "" }, function (data) {
        $('#result-name').html(data);
    });
    $.post('pages/functions/search_name_tel.php', { tel: "" }, function (data) {
        $('#result-tel').html(data);
    });
    $('#search-name').keyup(function () {
        var search = document.getElementById('search-name').value;
        $('#result-name').html = "";
        console.log(search);
        $.post('pages/functions/search_name_tel.php', { text: search }, function (data) {
            $('#result-name').html(data);
        });
    });
    $('#btn-search-name').click(function(){

        var search = document.getElementById('search-name').value;
        $('#result-name').html = "";
        console.log(search);
        $.post('pages/functions/search_name_tel.php', { text: search }, function (data) {
            $('#result-name').html(data);
        });

    });

    $('#search-tel').keyup(function () {
        var search = document.getElementById('search-tel').value;
        $('#result-tel').html = "";
        console.log(search);
        $.post('pages/functions/search_name_tel.php', { tel: search }, function (data) {
            $('#result-tel').html(data);
        });
    });
    $('#btn-search-tel').click(function(){

        var search = document.getElementById('search-tel').value;
        $('#result-tel').html = "";
        console.log(search);
        $.post('pages/functions/search_name_tel.php', { tel: search }, function (data) {
            $('#result-tel').html(data);
        });

    });
</script>