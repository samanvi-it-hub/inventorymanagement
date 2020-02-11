<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        @include('links') 
<script>
  function stock()
    {
        id=document.getElementById("stock").value;
        window.location = "stock-outward?id="+id;
    }
  function submitForm(i)
    {
      //alert(i);
    var date=document.getElementById("date").value;
    var j;
    var data = [];
    var qty = [];
    for(j=0;j<=i;j++)
      {
        data[j] = document.getElementById('id['+j+']').value;;
        qty[j]= document.getElementById('quantity['+j+']').value;
      }
      //alert(data);
      //alert(qty);
      window.location = "update-stock-outward?data="+data+"&qty="+qty+"&date="+date+"&i="+i;
  }

</script>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-inverse navbar-fixed-top">
               <div class="container">
               <div class="row">
               <div class="col-md-6" style="padding-left:45%">
                     <img src="imgs/dhadoom.png" alt="logo" style="height:48px;width:150px;float: left;">



                     </div>
                     <div class="col-md-6" style="margin-top:25px">
                     <a style="padding-left:120%;text-decoration:none;color:white" href="/logout">LOGOUT</a>
                     </div>
                 </div> 
                  
              </div>
           </nav>
        </div>
    </div>

    <div class="container-fluid">
       <div class="row">
           <div class="col-md-1">
           <br><br><br><br>
           
    <div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li class="active">
                  <a href="/" >
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard</a>
                </li>
                <li>
                  <a href="suppliers">
                  <i class="fa fa-user"></i> Suppliers</a>
                </li>

               
                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a><i class="fa fa-globe fa-lg"></i> Material<span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <a href="rm_category"><li>Categories</li></a>
                  <a href="ingradients"><li>Ingredients</li></a>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a><i class="fa fa-cubes"></i>Products<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <a href="product_category"><li>Categories</li></a>
                  <a href="end_products"><li>End Products</li></a> 
                </ul>


                 <li class="active">
                  <a href="inventory">
                  <i class="fa fa-calendar"></i> Inventory</a>
                  </li>

                 <li>
                  <a href="payments">
                  <i class="fa fa-cc-mastercard"></i>  Payments</a>
                </li>
                <li>
                  <a href="operations">
                  <i class="fa fa-money"></i> Operations</a>
                </li>
                <li data-toggle="collapse" data-target="#neww" class="collapsed">
                  <a><i class="fa fa-file"></i> Reports<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="neww">
                  <a href="reports_suppliers"><li>Suppliers</li></a>
                  <a href="reports_payments"><li>Payments</li></a>
                  
                </ul>
                <li>
                  <a href="billing">
                  <i class="fa fa-money"></i> Billing</a>
                </li>
            </ul>
     </div>
</div>
</div>
<div style="padding-left:40%;padding-top:5%" ><br><br>
<h4 style="padding-left:25%">Stock OutWard</h4>
<small>Note: Select Category and Date</small>
<table id="table" class="" cellspacing="0" width="100%">
            <thead>
              <tr>
                 
              </tr>
              <tr>
              <th>Category</th>
<td><select id="stock" name="stock" onchange="stock()">
         <option value="">Select</option>
         @foreach($list as $list)
          @if($list->id==$data)
          <option value={{$list->id}} selected>{{$list->category_name}}</option>
          @else
          <option value={{$list->id}}>{{$list->category_name}}</option>
          @endif
         @endforeach
</select></td>
</tr>
              <tr>
                 <th>Date</th>
                <td><input type="date" name="date" id="date"></td>
             </tr>
            </thead>
          </table>
</div>
<div style="padding-left:20%;padding-top:5%">

<table  class="table" width="70%">
  <thead>
      <tr>
          <td>Raw material</td>
          <td>Current Stock</td>
          <td>Consumption</td>
  
      </tr> 
  </thead>
 
    <tbody>
      
        @php $i=0; @endphp
     @foreach($query_in as $query_ins)
     <tr>
        <td><input type="hidden" name="id" id="id[<?php echo $i ?>]" value="{{$query_ins->rm_id}}" />{{$query_ins->item_name}}</td>
        
        @if($query_out->isEmpty())
        <td>{{$query_ins->qty_in}}</td>
        @else
        @foreach($query_out as $query_outs)
        @if($query_in->rm_id==$query_outs->rm_id)
        @php $qty=$query_ins->qty_in-$query_outs->qty_out;@endphp
        <td>@php echo $qty;@endphp
        </td>
        @endif
        @endforeach
        @endif
        
        
        <td><input type="text" name="quantity[]" id="quantity[<?php echo $i ?>]"  /></td>

     </tr>
     @php $i=$i+1; @endphp 
     @endforeach
    
    </tbody>
    

<tr>
    <td></td>

    <td>
    <button type="submit" class="btn btn-primary btn-sm" onclick="submitForm(<?php $i=$i-1; echo $i; ?>)">SAVE</button>
     </td>
    <td></td>

</tr>
</table> 
</div>




</div>


           </div>
       </div>
    
    </div>

    </body>
</html>
