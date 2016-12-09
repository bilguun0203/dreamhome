<script>
    if("<?php echo $page; ?>" == "edit_registration")
    {
        if (document.getElementById('dateJoined').value == "") {
            var date = new Date();
            var month = date.getMonth();
            month++;
            if (month < 10) {
                month = "0" + month;
            }
            var pubdate = date.getFullYear() + "-" + month + "-" + date.getDate();
            document.getElementById('dateJoined').value = pubdate;
        }
    }
    $(function () {
        $('.datepicker').datepicker({ format : 'yyyy-mm-dd' });
    });

</script>
</body>
</html>