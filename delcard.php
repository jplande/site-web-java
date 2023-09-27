<?php

session_start();
require_once('class/Card.php');
Card::delToCard($_GET['val']);
?>
<script>
    document.location.href="panier.php";
</script>