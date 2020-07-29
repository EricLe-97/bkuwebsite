<?php 

include "include.php";
echo '';

?>

<script>
    
        axios.get('https://www.cloudflare.com/cdn-cgi/trace')
        .then(res => {
            let temp = res.data;
            console.log(temp);
            let find = temp.indexOf('ip=');
            let findS = temp.indexOf('ts=');
            console.log(find, findS);
            let ip = temp.slice(find+3,findS);
            console.log(ip);

        })
        .catch(err => console.log(err));

</script>