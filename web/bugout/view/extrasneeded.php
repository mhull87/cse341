<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/header.php';
?>

<main>
  <h2>My Survival Page</h2>
  <h3>My Extras - Needed</h3>

  <!-- list out the extras they have -->
    <?php 
    echo $itemslist;
    ?>

  <a href="../bag/index.php?action=extraspacked">Extras Packed</a><br><br>
  <a href="../bag/index.php?action=mygear">My Gear</a>

</main>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bugout/common/footer.php';
?>