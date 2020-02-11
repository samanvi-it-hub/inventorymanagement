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
     $(document).ready( function () {
     $('#table').DataTable({
          pageLength: 5,
           dom: 'Bfrtip',
           buttons:[
               'copy', 'excel', 'pdf'
           ]
           
     });
     } );
   
   </script> 
<script>
    function submit()
        {
            id=document.getElementById("supplier").value;
            start_date=document.getElementById("start_date").value;
            end_date=document.getElementById("end_date").value;
            status=document.getElementById("status").value;//alert();
            window.location = "reports_payments?id="+id+"&start_date="+start_date+"&end_date="+end_date+"&status="+status;
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
                  <a href="reports_suppliers"><li>Suppliers</li></a>
                  <a href="reports_payments"><li  class="active">Payments</li></a>
                  
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
           <h4 style="font-size:20px;padding-left:33%">Payment List</h4><br><br>
           <small>Note: Select Supplier,start date,end date and click Search Button</small>
           <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
    
                <tr>
                        <th>Supplier</th>
                        <td><select id="supplier" name="supplier" onchange="supplier()">
                                <option value="">Select</option>
                                @foreach($list as $lists)
                                 @if($lists->supplier_id==$data)
                                
                                 <option value={{$lists->supplier_id}} selected>{{$lists->supplier_name}}</option>
                                 @else
                                 <option value={{$lists->supplier_id}}>{{$lists->supplier_name}}</option>
                                 @endif
                                @endforeach
                        </select></td>
                    <th>Start Date</th>
                    <td><input type="date" name="start_date" id="start_date" value="{{$start_date}}"></td>
                    <th>End Date</th>
                    <td><input type="date" name="end_date" id="end_date" value="{{$end_date}}"></td>
                    <th>Status</th>
                    <td>
                        <select id="status" name="status">
                            <option value="">ALL</option>
                            <option value="1">PAID</option>
                            <option value="2">UNPAID</option>
                        </select>
                    </td>
                    <td><button class="btn btn-primary btn-sm" onclick="submit()">SERCH</button><td>
                </tr>    
            </table>
            
            <table id="table"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                    <th ><input type="checkbox"> </th>
                    <th >SUPPLIER  </th>
                    <th >PO NUMBER  </th>      
                    <th >DATE </th> 
                    <th >COST </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($po->isEmpty())
                        <tr>
                            <td></td>
                            <td></td>
                            <td align="center"> No records found!!</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        @foreach ($po as $pos)
                            <tr>
                                <td><input type="checkbox" name="changeStatus[]" value="{{$pos->id}}"></td>
                                <td>
                                        @foreach($list as $lists)
                                        @if($lists->supplier_id==$pos->supplier_id)
                                       {{$lists->supplier_name}}
                                        @endif
                                        @endforeach
                                </td>
                                <td>{{$pos->PO}}</td>
                                <td>{{$pos->date}}</td>
                                <td><input type="hidden" name="cost[]" id="cost[{{$pos->id}}]" value="{{$pos->po_cost}}">{{$pos->po_cost}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          
           </div>
       </div>
    
    </div>

    </body>
</html>