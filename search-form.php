<html>
<head>
   <style>
   #search-list{
      float:left;
      list-style:none;
      margin-top:-3px;
      padding:0;
      width:190px;
      position: absolute;}
   #search-list li{
      padding: 5px; 
      background: #f0f0f0; 
      border-bottom: #bbb9b9 1px solid;}
   #search-list li:hover{
      background:#ece3d2;
      cursor: pointer;}
   #search-box{
      padding: 10px;
      border: #a8d4b1 1px solid;
      border-radius:4px;
   }

   
   </style>

   <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
   <script>
      $(document).ready(function(){
         $("#search-box").keyup(function(event){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("suggesstion-box").innerHTML = this.responseText;
                  }
            };
            xmlhttp.open("GET", "search.php?keyword=" + $(this).val(), true);
            xmlhttp.send();
         });
      });

      function selectProduct(val) {
         $("#search-box").val(val);
         $("#suggesstion-box").hide();
      }
   </script>
</head>

<body>
      <form method="GET" action="search-process.php">
         <input type="text" id="search-box" name="search-box" placeholder="Find the product.." />
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search-button">Search</button>
         <div id="suggesstion-box" style="z-index:10;"></div>
      </form>

</body>
</html>