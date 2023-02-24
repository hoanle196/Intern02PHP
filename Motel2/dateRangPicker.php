<?php
var_dump($_POST);
if (isset($_POST['daterange'])) {
  $daterange = $_POST['daterange'];
  list($start_date, $end_date) = explode(' - ', $daterange);
  echo "$start_date -  $end_date";
}
?>
<!-- Thêm các thư viện cần thiết -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Hiển thị Date Range Picker trong biểu mẫu -->
<form action="" method="post">
  <label for="date">Date range:</label>
  <input type="text" name="daterange" value="" />
  <input type="submit" value="Submit">
</form>

<!-- Khởi tạo Date Range Picker -->
<script>
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });
</script>