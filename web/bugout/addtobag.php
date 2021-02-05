<?php
include 'common/header.php';
?>

<main>
  <h2>Add Other Items To Your Bug Out Bag</h2>
  <form action="#" method="POST">

    <label for="item_name">Item Name</label><br>
    <input name="item_name" id="item_name" type="text"><br><br>

    <label for="quantity">Quantity</label><br>
    <input type="number" min="0" name="quantity" id="quantity"><br><br>

    <p>Is It Packed?</p>

    <input type="radio" name="packed" id="packed" value="yes">
    <label for="packed">Yes</label><br>

    <input type="radio" name="packed" id="need" value="no">
    <label for="need">No</label><br><br>

    <input type="submit" id="addtobagbtn" value="Add To My Bug Out Bag">

  </form>
</main>

<?php
include 'common/footer.php';
?>