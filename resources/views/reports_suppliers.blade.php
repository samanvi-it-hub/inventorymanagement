<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory Management System</title>
        <script src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css" rel="stylesheet">
        @include('links') 
        <script>
     $(document).ready( function () {
     $('#table').DataTable({
          pageLength: 5,
           dom: 'Bfrtip',
           buttons:[
             {
                extend: 'print',
                title:'Supplier List',
                text: 'Print',
                orientation:'portrait',
                exportOptions: {
                columns: [ 0, 1, 2 ]
            }
             },
              'excel', 
              'pdf',
               
           ]
           
     });
     } );
   
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


                 <li>
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
                  <a href="reports_suppliers"><li  class="active">Suppliers</li></a>
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
           <div class="col-md-11" style="padding-left:14.3%;padding-top:6%">
           <small style="font-size:20px;padding-left:33%">Supplier List</small>
           <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
        <tr>
    
                <th> Name </th>
                <th> Rep1 </th>
                <th> Phone1 </th>
                <th> Email1 </th>
                <th> Rep2 </th>
                <th> Phone2 </th>
                <th> Email2 </th>  
        </tr>
    </thead>
            @foreach ($list as $list)
            <tr>
               <td>{{$list->supplier_name}}</td>
               <td>{{$list->supplier_rep1}}</td>
               <td>{{$list->supplier_phone1}}</td>
               <td>{{$list->supplier_email1}}</td>
               <td>{{$list->supplier_rep2}}</td>
               <td>{{$list->supplier_phone2}}</td>
               <td>{{$list->supplier_email2}}</td>
            </tr>
            @endforeach
        </table>
          
           </div>
       </div>
    
    </div>

    </body>
</html>
