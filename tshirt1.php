<?php include "header.php" ?>
<?php include "navbar.php" ?>

<div class="clearfix">
  <div class="left">
    <section class="clearfix">
        <h1 style="text-align: center;" >Nike Dri-FIT A.I.R. Cody Hudson</h1>  
        <div class="row">
            <figure class="col-sm-6">
                <img src="image/Tshirt/tshirt1-1.JPG">
            </figure>
            <figure class="col-sm-6">
                <img src="image/Tshirt/tshirt1-2.JPG">
            </figure>
        </div>
        <div class="row"> 
            <figure class="col-sm-6">
                <img src="image/Tshirt/tshirt1-3.JPG">
            </figure>
            <figure class="col-sm-6">
                <img src="image/Tshirt/tshirt1-4.JPG">
            </figure>
        </div>
        </section>
  </div>

  <div class="right">
        <div style="display:flex;">
            <h3 class="left"> Men's Long-Sleeve T-Shirt </h3>
            <h5 class="right" style="margin-top: 30px;"> 1,019,000đ </h5>
        </div>
        <div>
            <p>The Nike Dri-FIT A.I.R. T-Shirt delivers all-day comfort with sweat-wicking technology for a look and feel that support every mile. Graphics were created by this season's Artist In Residence (A.I.R.), Cody Hudson. 
            <ul>
                <li>Colour Shown: Obsidian/Obsidian</li>
                <li>Style: CI8071-451</li>
            </ul>
        </div>
  </div>
</div>

<?php include "footer.php" ?> 

<style>
    .right{
        float: right;
        width: 30%;
        padding: 5px;
    }
    .left {
        float: left;
        width: 70%;
        padding: 10px;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    .col-md-6 {
        margin: 0 0 60px;
    }
    section .row img {
        margin: 0 0 30px;
        width: 100%;
    }
</style>