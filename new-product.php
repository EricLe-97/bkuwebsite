<?php include "header.php" ?>
<?php include "navbar.php" ?>

<?php 
  include "conn.php";

  $query = mysqli_query($conn,"SELECT product, price, category from `product`");
?>

<div class="container">
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>Product name</th>
        <th>Price</th>
        <th>Category</th>
      </tr>
    </thead>

    <tbody >
      <p><button class="btn btn-primary" style="margin-top:15px;" onclick="sortTable()">Sort by name</button></p>
      <?php while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        <tr>
          <td><?php echo $row['product'] ?></td>
          <td><?php echo $row['price'] ?></td>
          <td><?php echo $row['category'] ?></td>
        </tr>
       <?php } ?>
    </tbody>
  </table>
</div>

<div class="container">
  <nav aria-label="Page navigation example" >
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
</div>

<?php include "footer.php" ?>

<style>
    .right{
        float: right;
    }
    .left{
        float: left;
    }
</style>

<script>
  function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>