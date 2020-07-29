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
  <h1>Gear for Everyone</h1>
  <p>All product suitable for everybody</p>
</div>

<!-- Photo Grid -->
<div class="row"> 
  <div class="column">
    <img src="image/laptop/laptop1.png" style="width:100%">
    <img src="image/laptop/laptop2.png" style="width:100%">
    <img src="image/laptop/laptop3.png" style="width:100%">
    <img src="image/laptop/laptop4.png" style="width:100%">
    <!-- <img src="image/Tshirt/Tshirt5.JPG" style="width:100%">
    <img src="image/Tshirt/Tshirt6.JPG" style="width:100%"> -->
  </div>
  <div class="column">
    <img src="image/headphone/headphone1.png" style="width:100%">
    <img src="image/headphone/headphone2.png" style="width:100%">
    <img src="image/headphone/headphone3.png" style="width:100%">
    <img src="image/headphone/headphone4.png" style="width:100%">
    <!-- <img src="image/Cap/Cap5.JPG" style="width:100%">
    <img src="image/Cap/Cap6.JPG" style="width:100%"> -->
  </div>  
  <div class="column">
    <img src="image/gamingroom/room1.jpeg" style="width:100%">
    <img src="image/gamingroom/room2.jpg" style="width:100%">
    <img src="image/gamingroom/room3.jpg" style="width:100%">
    <img src="image/gamingroom/room4.jpg" style="width:100%">
    <img src="image/gamingroom/room5.jpeg" style="width:100%">

    <!-- <img src="image/Hoodie/Hoodie5.JPG" style="width:100%">
    <img src="image/Hoodie/Hoodie6.JPG" style="width:100%"> -->
  </div>
  <div class="column">
    <img src="image/gamingchair/chair1.png" style="width:100%">
    <img src="image/gamingchair/chair2.png" style="width:100%">
    <img src="image/gamingchair/chair3.png" style="width:100%">

    <!-- <img src="image/Bag/Bag5.JPG" style="width:100%">
    <img src="image/Bag/Bag6.JPG" style="width:100%"> -->
  </div>
</div>

</body>
</html>
