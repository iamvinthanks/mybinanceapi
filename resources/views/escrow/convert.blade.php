
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=button] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button]:hover {
  background-color: #45a049;
}

.escrow {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


<h3>Form Escrow</h3>

<div class="escrow">
  <form action="/action_page.php">
    <label for="fname">Buyer ID</label>
    <input type="text" id="buyer" name="firstname" placeholder="Buyer ID..">
    <label for="lname">Seller ID</label>
    <input type="text" id="seller" name="lastname" placeholder="Seller ID..">
    <label for="lname">Amount to Escrow</label>
    <input type="text" id="amount" name="lastname" placeholder="Amount..">
    <label for="lname">Seller Rek</label>
    <input type="text" id="rek_seller" name="lastname" placeholder="">
    <label for="lname">ID Rek Seller</label>
    <input type="text" id="id_rek_seller" name="lastname" placeholder="">
    <label for="lname">Buyer Rek</label>
    <input type="text" id="rek_buyer" name="lastname" placeholder="">
    <label for="lname">ID Buyer Rek</label>
    <input type="text" id="id_rek_buyer" name="lastname" placeholder="">
    <input type="button" value="submit" id="createescrow">
  </form>
</div>



