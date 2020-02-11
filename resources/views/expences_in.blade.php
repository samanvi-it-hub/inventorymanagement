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
        window.location = "expences-in?id="+id+"&po_num="+po_num+"&po_cost="+po_cost+"&date="+date;
    }
    function delete_inward(id)
    {
     document.getElementById("id").value =id;
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
                <li class="active">
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
           <div class="col-md-11" style="padding-left:14.3%;padding-top:6%">
           <h4 style="padding-left:40%">Expences</h4>
           <table class="table">
    @if($po_header->isEmpty())
    <tr>
        
        <th>Supplier</th>
        <td><select id="supplier" name="supplier" >
                <option value="">Select</option>
                
        </select></td>
        <th>PO Number</th>
        <td><input type="text" name="po_num" id="po_num"></td>
    </tr>
    <tr>
        <th>PO Cost</th>
        <td><input type="text" name="po_cost" id="po_cost"></td>
        <th>Date</th>
        <td><input type="date" name="date" id="date"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td> <button  class="btn btn-primary btn-sm" onclick="submit()">SUBMIT</button></td>
        
    </tr>
    @else
    @foreach($po_header as $po_headers)
    <tr>
        
            <th>Supplier</th>
            <td>@foreach($list as $lists)
                @if($lists->supplier_id==$po_headers->supplier_id)
                {{$lists->supplier_name}}
                @endif
               @endforeach</td>
            <th>PO Number</th>
            <td>{{$po_headers->PO}}</td>
        </tr>
        <tr>
            <th>PO Cost</th>
            <td>{{$po_headers->po_cost}}</td>
            <th>Date</th>
            <td>{{$po_headers->date}}</td>
        </tr>
    @endforeach
    @endif

        
    </table>
    <br/>
    <table class="table">
        <thead>
            <th>Raw Material</th>
            
            <th>Unit Of Measure</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Expiry Date</th>
            <th>Action</th>
        </thead>
        <tbody>
                @foreach($po_lines as $po_line)
                <tr>
                    <td>{{$po_line->item_name}}</td>          
                    
                    <td>{{$po_line->unit_of_measure}}</td>
                    <td>{{$po_line->qty_in }}</td>
                    <td>{{$po_line->cost }}</td>
                    <td>{{$po_line->expiry_date }}</td>
                    <td><button class="btn btn-danger" onclick="delete_inward('{{$po_line->id}}')" data-toggle="modal" data-target="#delete_inward"> Delete</button></td>
                </tr>
                @endforeach
                <tr><form method="POST" action="/update-expences">
                    {{ csrf_field() }}
                    <input type="hidden" id="supplier_id" name="supplier_id" value="{{$po_headers->supplier_id}}">
                    <input type="hidden" id="PO" name="PO" value="{{$po_headers->PO}}">
                    <input type="hidden" id="date" name="date" value="{{$po_headers->date}}">
                        <td><select id="supplier_material" name="supplier_material" >
                                <option value="">Select</option>
                                @foreach($supplier_materials as $supplier_materials)
                                 <option value={{$supplier_materials->rm_id}}>{{$supplier_materials->item_name}}</option>
                                @endforeach
                        </select></td> 
                        <td>
                                <select id="unit_of_measure" name="unit_of_measure" >
                                        <option value="">Select</option>
                                        @foreach($unit_of_measure as $unit_of_measure)
                                         <option value={{$unit_of_measure->id}}>{{$unit_of_measure->Type}}</option>
                                        @endforeach
                                </select></td>     
                        <td><input type="text" name="qty" id="qty"></td>
                        
                        <td><input type="text" name="cost" id="cost"></td>
                        <td><input type="date" name="exp_date" id="exp-date"></td>
                        <td><button class="btn btn-primary" > Insert</button></td>
                    </form>
                    </tr>
                
        </tbody>
    </table>

</div>
<div class="modal fade" id="delete_inward" style="padding-right:50%">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#438EB9">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:white;">Delete Item</h4>
                </div>
                <div class="modal-body">
                    
                    <form method="POST" action="/delete-expences">
                     {{ csrf_field() }}
                     <input type="hidden" id="supplier_id" name="supplier_id" value="{{$po_headers->supplier_id}}">
                    <input type="hidden" id="PO" name="PO" value="{{$po_headers->PO}}">
                    <input type="hidden" id="date" name="date" value="{{$po_headers->date}}">
                     <input type="hidden" name="id" id="id"  readonly/>
                        Do you want to delete the Item.

                        <br/>
                       
                        <button type="submit" style="margin-left:90%" class="btn btn-primary btn-sm">YES</button>
                    </form>
                    
    
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
          
           </div>
       </div>
    
    </div>

    </body>
</html>
