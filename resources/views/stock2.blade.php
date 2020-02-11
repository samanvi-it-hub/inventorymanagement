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
    function submit()
    {
        
        var id=document.getElementById("supplier").value;
        var po_num=document.getElementById("po_num").value;
        var po_cost=document.getElementById("po_cost").value;
        var date=document.getElementById("date").value;
        window.location = "stock-inward?id="+id+"&po_num="+po_num+"&po_cost="+po_cost+"&date="+date;
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
                <li>
                  <a href="/dashboard" >
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
           <!-- <div class="breadcrumbs" id="breadcrumbs">
    <small style="font-size:20px;padding-left:3%">Stock Inward</small>

</div> -->
           <div class="col-md-11" style="padding-left:14.3%;padding-top:6%">
           <h4 style="padding-left:40%">Stock Inward PO</h4><br><br>
           <small>Note: Select supplier, enter po number,po cost,date and Click Submit Button</small>
           <table id="table" class="table" cellspacing="0" width="100%">

<tr>
    
    <th>Supplier</th>
    <td><select id="supplier" name="supplier" >
            <option value="">Select</option>
            @foreach($list as $list)
             <option value={{$list->supplier_id}}>{{$list->supplier_name}}</option>
            @endforeach
    </select></td>
    <th>PO Number</th>
    <td><input type="text" name="po_num" id="po_num" required></td>
</tr>
<tr>
    <th>PO Cost</th>
    <td><input type="text" name="po_cost" id="po_cost" required></td>
    <th>Date</th>
    <td><input type="date" name="date" id="date" required></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    
</tr>

</table>
<button  class="btn btn-primary btn-sm" style="margin-left:40%" onclick="submit()">SUBMIT</button>

<table class="table">
    <thead>
        <th>Raw Material</th>
        
        <th>Unit Of Measure</th>
        <th>Quantity</th>
        <th>Cost</th>
        <th>Expiry Date</th>
        <th>Action</th>
    </thead>
</table>
           </div>
       </div>
    
    </div>

    </body>
</html>
