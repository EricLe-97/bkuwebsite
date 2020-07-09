<?php
    include "conn.php";
    if(!empty($_GET["keyword"])) {
        $query ="SELECT * FROM product WHERE product like '" . $_GET["keyword"] . "%'  LIMIT 0,6";
        $resultset = mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($resultset)) {
			$result[] = $row;
		}		
    if(!empty($result)) {		?>
		<ul id="search-list">
		<?php	foreach($result as $prod) { ?>
		    <li onClick="selectProduct('<?php echo $prod["product"]; ?>');"><?php echo $prod["product"]; ?></li>
		<?php } ?>
		</ul>
    <?php } } ?>

