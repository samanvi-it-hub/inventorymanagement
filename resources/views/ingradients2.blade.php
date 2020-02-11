<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/mystyles.css" rel="stylesheet">
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
    function view(id,name,des)
    {
     document.getElementById("rm_id1").value =id;
     document.getElementById("item_name1").value =name;
     document.getElementById("item_des1").value =des;
    }
    function edit(id,name,des,type)
    {
     document.getElementById("rm_id2").value =id;
     document.getElementById("item_name2").value =name;
     document.getElementById("item_des2").value =des;
     document.getElementById("type").value =type;
    }
    function deactive(id)
    {
     document.getElementById("rm_id3").value =id;
    }

    function active(id)
    {
     document.getElementById("rm_id4").value =id;
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
                  <a href="/dashboard">
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
                  <a href="ingradients"><li class="active">Ingredients</li></a>
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
           <div class="col-md-11" style="padding-left:9.3%;padding-top:6%">
           
           <h4 style="padding-left:40%">Ingredients</h4>
           <small>Note: You want to enter new Ingredient click on "Add Ingredient" Button.</small>
           <div align="right">
             <button class="btn btn-primary"  data-toggle="modal" data-target="#addIngradient"><i class="fa fa-plus-square"></i>Add Ingredient</button>
             <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th >Item Name </th>
                    <th >Item Description</th>
                    <th >Unit of Measure</th>
                    <th >Actions</th>
                    <th >Suppliers </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($list as $lists)
         <tr>
            <td>{{$lists->item_name}}</td>
            <td>{{$lists->item_description}}</td>
            <td>{{$lists->Type}}</td>
            <td align="center"><button class="" onclick="view('{{$lists->rm_id}}','{{$lists->item_name}}','{{$lists->item_description}}');" data-toggle="modal" data-target="#viewIngradient" data-toggle="tooltip" title="Click To Search"><i class="fa fa-search"></i> </button>
             @if($lists->item_status==0)
             <button class="" onclick="edit('{{$lists->rm_id}}','{{$lists->item_name}}','{{$lists->item_description}}');"  data-toggle="modal" data-target="#editIngradient" disabled data-toggle="tooltip" title="Click To Edit"><i class="fa fa-edit"></i></button>
             <button class="" onclick="active('{{$lists->rm_id}}');" data-toggle="modal" data-target="#active" data-toggle="tooltip" title="Click To Activate The Ingredient"><i class="fa fa-times"></i> </button>
             @else
             <button class="" onclick="edit('{{$lists->rm_id}}','{{$lists->item_name}}','{{$lists->item_description}}','{{$lists->id}}');"  data-toggle="modal" data-target="#editIngradient" data-toggle="tooltip" title="Click To Edit"><i class="fa fa-edit"></i></button>
             <button class="" onclick="deactive('{{$lists->rm_id}}');" data-toggle="modal" data-target="#deactive" data-toggle="tooltip" title="Click To Deactivate The Ingredient"><i class="fa fa-check"></i> </button>
             @endif
             <td>
                    @foreach($rm_sup as $rm_sups)
                    @if($lists->rm_id==$rm_sups->rm_id)
                     {{$rm_sups->supplier_name}}<br/>
                    @endif

                    @endforeach
             <a href="ingradient_supplier?id={{$lists->rm_id}}"><button class="" title="Click To Add Supplier" data-toggle="" data-target=""><i class="fa fa-plus"></i> </button></a>

             </td>
         </tr>
         @endforeach
          
            </tbody>
          </table>
          @php $rm_id = $lists->rm_id;
$id=substr($rm_id,3);
$t=$id+1;
$number = str_pad($t, 3, '0', STR_PAD_LEFT);
//echo $number;
@endphp
</div>


<div class="modal fade" id="addIngradient" style="padding-right:50%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#438EB9">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color:white;">Add New Ingradient</h4>
                    </div>
                    <div class="modal-body">
                        <table  class="table">
                            <form method="POST" action="/save-ingradient">
                            {{ csrf_field() }}

                            <tbody>
                             <tr>
                                <td></td>
                                <td>Ingradient Id</td>
                                <td><input type="text" name="ingradient_id" id="ingradient_id" value="RM-{{$number}}" readonly/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Ingradient Name</td>
                                <td><input type="text" name="ingradient_name" id="ingardient_name" placeholder="enter ingardient_name" required/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Ingradient Description</td>


                                <td><input type="text" name="ingradient_des" id="ingradient_des" placeholder="enter ingradient_des" required></td>

                            </tr>


                            <tr>
                                <td></td>
                                <td>Unit of measure</td>


                                <td><select id="unit_of_measure" name="unit_of_measure">
                                    <option value="">Select</option>
                                    @foreach($unit_of_measure as $unit_of_measures)
                                    <option value={{$unit_of_measures->id}}>{{$unit_of_measures->Type}}</option>
                                    @endforeach
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Ingradient Category</td>


                                <td><select id="category" name="category">
                                        <option value="">Select</option>
                                        @foreach($category as $category)
                                        <option value={{$category->id}}>{{$category->category_name}}</option>
                                        @endforeach
                                        </select></td>

                            </tr>

                            <tr>
                                <td></td>

                                <td>
                                <button style="margin-left:90%" type="submit" class="btn btn-primary btn-sm">SAVE</button>
                                 </td>
                                <td></td>

                            </tr>

                            </form>



                            </tbody>



                        </table>

                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="viewIngradient" style="padding-right:50%">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#438EB9">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="color:white;">View Ingradient</h4>
                        </div>
                        <div class="modal-body">
                            <table  class="table">

                                {{ csrf_field() }}

                                <tbody>
                                 <tr>
                                    <td></td>
                                    <td>Product Id</td>
                                    <td><input type="text" name="rm_id" id="rm_id1"  readonly/></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Item Name</td>
                                    <td><input type="text" name="item_name" id="item_name1"  readonly/></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Item Description</td>


                                    <td><input type="text" name="item_des" id="item_des1"  readonly/></td>

                                </tr>
                                

                                <tr>
                                    <td></td>

                                    <td>
                                    </td>
                                    <td></td>

                                </tr>


                                </tbody>



                            </table>

                        </div>
                       
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="editIngradient" style="padding-right:50%">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#438EB9">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" style="color:white;">Edit Ingredient</h4>
                            </div>
                            <div class="modal-body">
                                <table  class="table">
                                        <form method="POST" action="/update-ingradient">
                                    {{ csrf_field() }}

                                    <tbody>
                                     <tr>
                                        <td></td>
                                        <td>Product Id</td>
                                        <td><input type="text" name="rm_id" id="rm_id2"  readonly/></td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Item Name</td>
                                        <td><input type="text" name="item_name" id="item_name2"  readonly/></td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Item Description</td>


                                        <td><input type="text" name="item_des" id="item_des2" /></td>

                                    </tr>

                                    <tr>
                                            <td></td>
                                            <td>Unit of measure</td>
                                             @php //$dat=('<input type="hidden" name="type" id="type">')  ; 
                                             @endphp
                                            
                                            <td><select id="unit_of_measure" name="unit_of_measure">
                                                <option  id="type">SELECT</option>
                                                @foreach($unit_of_measure as $unit_of_measures)
                                                
                                                <option value={{$unit_of_measures->id}}>{{$unit_of_measures->Type}}</option>
                                                
                                                @endforeach
                                                </select>
                                            </td>
            
                                        </tr>

                                    <tr>
                                        <td></td>

                                        <td>
                                                <button style="margin-left:90%" type="submit" class="btn btn-primary btn-sm">SAVE</button>
                                        </td>
                                        <td></td>

                                    </tr>

                                    </form>



                                    </tbody>



                                </table>

                            </div>
                          
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="modal fade" id="deactive" style="padding-right:50%">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#438EB9">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" style="color:white;">Deactivate Ingradient</h4>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="/deactive-ingradient">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="rm_id" id="rm_id3"  readonly/>
                                        Do you want to deactivate the ingradient.

                                        <br/>

                                        <button style="margin-left:90%" type="submit" class="btn btn-primary btn-sm">YES</button>
                                    </form>


                                </div>
                             
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade" id="active" style="padding-right:50%">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:#438EB9">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" style="color:white;">Activate Ingradient</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form method="POST" action="/active-ingradient">
                                         {{ csrf_field() }}
                                         <input type="hidden" name="rm_id" id="rm_id4"  readonly/>
                                            Do you want to activate the ingradient.

                                            <br/>

                                            <button style="margin-left:90%" type="submit" class="btn btn-primary btn-sm">YES</button>
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
