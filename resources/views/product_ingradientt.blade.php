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
    function deactivate(rm_id)
    {
     document.getElementById("r_id").value =rm_id;
    
    }
</script>
<script>
     $(document).ready( function () {
     $('#table').DataTable({
          pageLength: 5,
           dom: 'Bfrtip',
           buttons:[
              
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


                <li  class="active" data-toggle="collapse" data-target="#new" class="collapsed">
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
           <a href="/end_products"><button class="btn btn-primary" > Back</button></a>
           <br/>
          @foreach ($name as $name) 
          <h3 align="center">{{$name->Item_name}}</h3> 
          @endforeach
          <br/>
          <table border="2"  id="table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>item Name</th>      
                <th>Action</th>
                
            </tr> 
        </thead>   
            @foreach ($p_rm as $p_rms) 
            <tr>
                <td>{{$p_rms->item_name}}</td>
                <td><button class="btn btn-danger" onclick="deactivate('{{$p_rms->rm_id}}')" data-toggle="modal" data-target="#deactive"> Delete</button></td>
            </tr>   
            @endforeach
            <tr><form method="POST" action="/product_ingradient_insert">
                    {{ csrf_field() }}
                    <input type="hidden" name="pr_id" id="pr_id" value="{{$pr_id}}" readonly/>
                    <td><select id="rm_id" name="rm_id" >
                            <option value="">Select</option>
                            @foreach($list as $list)
                             <option value={{$list->rm_id}}>{{$list->item_name}}</option>
                            @endforeach
                    </select></td>
                    <td><button class="btn btn-primary" > Insert</button></td>
                    </form>
                    </tr>
     </table>
           
           </div>
       </div>
    
    </div>
    <div class="modal fade" id="deactive" style="padding-right:50%">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#438EB9">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color:white;">Deactivate Ingredient</h4>
            </div>
            <div class="modal-body">

                <form method="POST" action="/product_ingradient_deactive">
                 {{ csrf_field() }}
                 <input type="hidden" name="r_id" id="r_id" readonly/>
                 <input type="hidden" name="pr_id" id="pr_id" value={{$pr_id}} readonly/>
                    Do you want to deactivate the ingredient.

                    <br/>

                    <button style="margin-left:90%" type="submit" class="btn btn-primary btn-sm">YES</button>
                </form>


            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    </body>
</html>