<!DOCTYPE html>
<html>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: Arial;
  }

  .header {
    text-align: center;
  }

  .row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    padding: 0 4px;
  }

  .column {
    -ms-flex: 25%; /* IE10 */
    flex: 25%;
    max-width: 25%;
    padding: 0 4px;
  }

  .column img {
    margin-top: 8px;
    vertical-align: middle;
    width: 100%;
  }

  .main {   
      -ms-flex: 70%; /* IE10 */
      flex: 70%;
      background-color: white;
      padding: 20px;
    }
    
  @media screen and (max-width: 800px) {
    .column {
      -ms-flex: 50%;
      flex: 50%;
      max-width: 50%;
    }
  }

  @media screen and (max-width: 600px) {
    .column {
      -ms-flex: 100%;
      flex: 100%;
      max-width: 100%;
    }
  }
</style>
<body>

<!-- Header -->
<div class="header">
  <h1>Nike Style</h1>
  <p>All product suitable for men, women and kids</p>
</div>

<!-- Photo Grid -->
<div class="row"> 
  <div class="column">
    <img src="image/Tshirt/Tshirt1.JPG" style="width:100%">
    <img src="image/Tshirt/Tshirt2.JPG" style="width:100%">
    <img src="image/Tshirt/Tshirt3.JPG" style="width:100%">
    <img src="image/Tshirt/Tshirt4.JPG" style="width:100%">
    <!-- <img src="image/Tshirt/Tshirt5.JPG" style="width:100%">
    <img src="image/Tshirt/Tshirt6.JPG" style="width:100%"> -->
  </div>
  <div class="column">
    <img src="image/Cap/Cap1.JPG" style="width:100%">
    <img src="image/Cap/Cap2.JPG" style="width:100%">
    <img src="image/Cap/Cap3.JPG" style="width:100%">
    <img src="image/Cap/Cap4.JPG" style="width:100%">
    <!-- <img src="image/Cap/Cap5.JPG" style="width:100%">
    <img src="image/Cap/Cap6.JPG" style="width:100%"> -->
  </div>  
  <div class="column">
    <img src="image/Hoodie/Hoodie1.JPG" style="width:100%">
    <img src="image/Hoodie/Hoodie2.JPG" style="width:100%">
    <img src="image/Hoodie/Hoodie3.JPG" style="width:100%">
    <img src="image/Hoodie/Hoodie4.JPG" style="width:100%">
    <!-- <img src="image/Hoodie/Hoodie5.JPG" style="width:100%">
    <img src="image/Hoodie/Hoodie6.JPG" style="width:100%"> -->
  </div>
  <div class="column">
    <img src="image/Bag/Bag1.JPG" style="width:100%">
    <img src="image/Bag/Bag2.JPG" style="width:100%">
    <img src="image/Bag/Bag3.JPG" style="width:100%">
    <img src="image/Bag/Bag4.JPG" style="width:100%">
    <!-- <img src="image/Bag/Bag5.JPG" style="width:100%">
    <img src="image/Bag/Bag6.JPG" style="width:100%"> -->
  </div>
</div>

</body>
</html>
