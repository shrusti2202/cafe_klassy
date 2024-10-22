@extends('admin.layout.main_structure')

@section('main_code')



<!DOCTYPE html>
<html>
<style>
  body {
    font-family: Arial;
  }

  input[type=text],
  select {
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
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form method='post' action="{{url('/insert_product')}}" role="form" enctype="multipart/form-data">
      @csrf
      <label>Product Name</label>
      <input type="text" name="name" placeholder="Product name..">

      <label>Product Image</label><p></p>
      <input type="file" name="img" placeholder="Product Image.."><p></p>


      <label>Product Title</label>
      <input type="text" name="title" placeholder="Product Title..">

      <label>Product Description</label>
      <input type="text" name="description" placeholder="Product Description..">

      <input type="submit" value="Submit" name="submit">
    </form>
  </div>

</body>

</html>

@endsection