
@extends('admin.layout.main_structure')

@section('main_code')



<!DOCTYPE html>
<html>
<style>
body {
  font-family: Arial;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>
<div id="menu" class="box1">
    <ul class="box1 f-right">
      <li><a href="manage_product"><span><strong>MANAGE PRODUCTS &raquo;</strong></span></a></li>
    </ul>
</div>

<div class="container">
  <form action="/action_page.php">
    <label >Product Name</label>
    <input type="text" name="name" placeholder="Product name..">

    <label >Product Image</label>
    <input type="text" name="img" placeholder="Product Image..">

    
    <label >Product Description</label>
    <input type="text" name="description" placeholder="Product Description..">

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>

@endsection