<h3 style="text-align: center;font-weight: bold;">Bill details </h3>
<a class="btn btn-primary" href="<?=base?>admin/order&page=<?=$data["page"]?>">Back</a>
<h3>Info customer</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name customer</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><?=$data["infouser"][0]["name"]?></td>
      <td><?=$data["infouser"][0]["phone_number"]?></td>
      <td><?=$data["infouser"][0]["address_user"]?></td>
      <td><?=$data["infouser"][0]["email_account"]?></td>
    </tr>
  </tbody>
</table>
<h3>Details</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Name product</th>
      <th scope="col">Amount</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
      <?php $total = 0?>
    <?php foreach($data["orderdetails"] as $key=>$values){?>
    <tr>
      <th scope="row"><?=$key+1?></th>
      <td><?=$values["name_product"]?></td>
      <td><?=$values["quantity"]?></td>
      <td><?=number_format ($values["unit_price"] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</td>
      <?php $total+= $values["unit_price"];?>
    </tr>
    <?php }?>
  </tbody>
</table>
<h2> Fee 35.000đ</h2>
<h2 style="color: black; font-weight: bold;">Total money: <?=number_format ($total+35000 , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )?> VNĐ</h2>
<form method="POST">
  <?php if($data["statusorder"] == "Waiting for progressing"){ ?>
  <button class="btn btn-primary" name="submit"> Bill Processing</button>
  <?php }else{?>
    <h2 style="color: green; font-weight: bold;">Bill processed</h2>
  <?php }?>
</form>