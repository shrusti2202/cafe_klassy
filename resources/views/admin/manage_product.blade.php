@extends('admin.layout.main_structure')

@section('main_code')
<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>

  <div id="menu" class="box1">
    <ul class="box1 f-right">
      <li><a href="add_product"><span><strong>ADD PRODUCTS &raquo;</strong></span></a></li>
    </ul>
  </div>
  <h1 ALIGN='center' style='color:grey'>PRODUCTS</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>TITLE</th>
      <th>DESCRIPTION</th>
      <th>ACTION</th>
    </tr>
    <tr>
      <?php
      if (!empty($product_arr)) {
        foreach ($product_arr as $w) {
      ?>
          <td><?php echo $w->id; ?></td>
          <td><?php echo $w->name; ?></td>
          <td><?php echo $w->img; ?></td>
          <td><?php echo $w->description; ?></td>
          <td>
            <button href="" class="btn btn-primary"><?php echo $w->status; ?></button>
            <button href="" class="btn btn-primary">Edit</button>
            <button>DELETE</button>
          </td>
        <?php
        }
      } else {
        ?>
    <tr>
      <td align="center" colspan="4"> Data Not Found </td>
    </tr>
  <?php
      }
  ?></tr>
  </tr>
  </table>

</body>

</html>

@endsection