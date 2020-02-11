<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory Management System</title>
        <script src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css" rel="stylesheet">
        <link href="css/mystyles.css" rel="stylesheet">
@include('links')

 <script>
     $(document).ready( function () {
     $('#table').DataTable({
          pageLength: 5,
           dom: 'Bfrtip',
           buttons: [
        
        {
            extend: 'pdf',
            extension:'.pdf',
            text: 'PDF',
            title:'Supplier List',
            orientation:'portrait',
            exportOptions: {
                columns: [ 0, 1 ]
            }
        },
        {
            extend: 'print',
            title:'Supplier List',
            text: 'Print',
            orientation:'portrait',
            exportOptions: {
                columns: [ 0, 1 ]
            }
        },
        'excel',
        
    ]
     });
     } );
   
   </script>   
   
      
        <script>
    function edit(id,name,rep1,ph1,email1,rep2,ph2,email2)
    {
     document.getElementById("supplier_id1").value =id;
     document.getElementById("supplier_name1").value =name;
     document.getElementById("supplier_rep11").value =rep1;
     document.getElementById("supplier_phone11").value =ph1;
     document.getElementById("supplier_email11").value =email1;
     document.getElementById("supplier_rep21").value =rep2;
     document.getElementById("supplier_phone21").value =ph2;
     document.getElementById("supplier_email21").value =email2;
    }
    function view(id,name,rep1,ph1,email1,rep2,ph2,email2)
    {
     document.getElementById("supplier_id2").value =id;
     document.getElementById("supplier_name2").value =name;
     document.getElementById("supplier_rep12").value =rep1;
     document.getElementById("supplier_phone12").value =ph1;
     document.getElementById("supplier_email12").value =email1;
     document.getElementById("supplier_rep22").value =rep2;
     document.getElementById("supplier_phone22").value =ph2;
     document.getElementById("supplier_email22").value =email2;
    }
    function deactive(id)
    {
     document.getElementById("supplier_id3").value =id;
    }

    function active(id)
    {
     document.getElementById("supplier_id4").value =id;
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
                <li class="active">
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
           <h4 style="padding-left:40%">Suppliers List</h4>
           <small>Note: You want to enter new supplier click on "Add new Supplier" Button.</small>
           <div align="right">
             <button class="btn btn-primary"  data-toggle="modal" data-target="#addSupplyer"><i class="fa fa-plus-square"></i> Add new supplier</button>
             <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th class="th-sm"> Name </th>
                  <th class="th-sm"> Rep1 </th>
                  <th class="th-sm"> Phone1 </th>
                  <th class="th-sm"> Email1 </th>
                  <th class="th-sm"> Rep2 </th>
                  <th class="th-sm"> Phone2 </th>
                  <th class="th-sm"> Email2 </th>
                  <th class="th-sm"> Actions </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($list as $list)
        <tr>
           <td>{{$list->supplier_name}}</td>
           <td>{{$list->supplier_rep1}}</td>
           <td>{{$list->supplier_phone1}}</td>
           <td>{{$list->supplier_email1}}</td>
           <td>{{$list->supplier_rep2}}</td>
           <td>{{$list->supplier_phone2}}</td>
           <td>{{$list->supplier_email2}}</td>
           <td align="center"><button class="" onclick="view('{{$list->supplier_id}}','{{$list->supplier_name}}','{{$list->supplier_rep1}}','{{$list->supplier_phone1}}','{{$list->supplier_email1}}','{{$list->supplier_rep2}}','{{$list->supplier_phone2}}','{{$list->supplier_email2}}');" data-toggle="modal" data-target="#viewSupplyer" data-toggle="tooltip" title="Click To Search"><i class="fa fa-search"></i> </button>
            @if($list->supplier_status==0)
            <button class="" onclick="edit('{{$list->supplier_id}}','{{$list->supplier_name}}','{{$list->supplier_rep1}}','{{$list->supplier_phone1}}','{{$list->supplier_email1}}','{{$list->supplier_rep2}}','{{$list->supplier_phone2}}','{{$list->supplier_email2}}');"  data-toggle="modal" data-target="#editSupplyer" disabled data-toggle="tooltip" title="Click To Search"><i class="fa fa-edit"></i></button>
            <button class="" onclick="active('{{$list->supplier_id}}');" data-toggle="modal" data-target="#active"  data-toggle="tooltip" title="Click To Activate The Supplier "><i class="fa fa-times"></i> </button>
            @else
            <button class="" onclick="edit('{{$list->supplier_id}}','{{$list->supplier_name}}','{{$list->supplier_rep1}}','{{$list->supplier_phone1}}','{{$list->supplier_email1}}','{{$list->supplier_rep2}}','{{$list->supplier_phone2}}','{{$list->supplier_email2}}');"  data-toggle="modal" data-target="#editSupplyer" data-toggle="tooltip" title="Click To Edit"><i class="fa fa-edit"></i></button>
            <button class="" onclick="deactive('{{$list->supplier_id}}');" data-toggle="modal" data-target="#deactive" data-toggle="tooltip" title="Click To Deactivate The Supplier "><i class="fa fa-check"></i> </button>
            @endif
        </tr>
        @endforeach
          
            </tbody>
          </table>
           </div>
           
     @php $supplier_id = $list->supplier_id;
     $id=substr($supplier_id,4);
     $t=$id+1;
     $number = str_pad($t, 3, '0', STR_PAD_LEFT);
     //echo $number;
     @endphp

<div class="modal fade" id="addSupplyer" style="padding-right:50%">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#438EB9">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color:white;">Add New Supplyer</h4>
            </div>
            <div class="modal-body">
                <table  class="table" >
                    <form method="POST" action="/save-supplyer">
                    {{ csrf_field() }}

                    <tbody>
                     <tr>
                        <td></td>
                        <td>Supplier Id</td>
                        <td><input type="text" name="supplier_id" id="supplier_id" value="SUP-{{$number}}" required readonly/></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Supplier Name</td>
                        <td><input type="text" name="supplier_name" id="supplier_name" placeholder="enter supplier_name" required/></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Supplier Rep1</td>


                        <td><input type="text" name="supplier_rep1" id="supplier_rep1" placeholder="enter esupplier_rep1" required></td>

                    </tr>


                    <tr>
                        <td></td>
                        <td>Supplier Phone1</td>


                        <td><input type="text" name="supplier_phone1" id="supplier_phone1" placeholder="enter supplier_phone1" required></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Supplier Email1</td>


                        <td><input type="text" name="supplier_email1" id="supplier_email1" placeholder="enter supplier_email1" required></td>

                    </tr>

                    <tr>
                        <td></td>
                        <td>Supplier Rep2</td>


                        <td><input type="text" name="supplier_rep2" id="supplier_rep2" placeholder="enter supplier_rep2" required></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Supplier Phone2</td>


                        <td><input type="text" name="supplier_phone2" id="supplier_phone2" placeholder="enter supplier_phone2" required></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Supplier Email2</td>


                        <td><input type="text" name="supplier_email2" id="supplier_email2" placeholder="enter supplier_email2" required></td>

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

<div class="modal fade" id="editSupplyer" style="padding-right:50%">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#438EB9">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:white;">Edit Supplier</h4>
                </div>
                <div class="modal-body">
                    <table  class="table">
                        <form method="POST" action="/update-supplyer">
                        {{ csrf_field() }}

                        <tbody>
                         <tr>
                            <td></td>
                            <td>Supplier Id</td>
                            <td><input type="text" name="supplier_id" id="supplier_id1"  readonly/></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Name</td>
                            <td><input type="text" name="supplier_name" id="supplier_name1" placeholder="enter supplier_name" required/></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Rep1</td>


                            <td><input type="text" name="supplier_rep1" id="supplier_rep11" placeholder="enter esupplier_rep1"></td>

                        </tr>


                        <tr>
                            <td></td>
                            <td>Supplier Phone1</td>


                            <td><input type="text" name="supplier_phone1" id="supplier_phone11" placeholder="enter supplier_phone1"></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Email1</td>


                            <td><input type="text" name="supplier_email1" id="supplier_email11" placeholder="enter supplier_email1"></td>

                        </tr>

                        <tr>
                            <td></td>
                            <td>Supplier Rep2</td>


                            <td><input type="text" name="supplier_rep2" id="supplier_rep21" placeholder="enter supplier_rep2"></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Phone2</td>


                            <td><input type="text" name="supplier_phone2" id="supplier_phone21" placeholder="enter supplier_phone2"></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Email2</td>


                            <td><input type="text" name="supplier_email2" id="supplier_email21" placeholder="enter supplier_email2"></td>

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

    <div class="modal fade" id="viewSupplyer" style="padding-right:50%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#438EB9">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color:white;">Supplier</h4>
                    </div>
                    <div class="modal-body">
                        <table  class="table">
                            <form method="POST" action="">
                            {{ csrf_field() }}

                            <tbody>
                             <tr>
                                <td></td>
                                <td>Supplier Id</td>
                                <td><input type="text" name="supplier_id" id="supplier_id2"  readonly/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Supplier Name</td>
                                <td><input type="text" name="supplier_name" id="supplier_name2" placeholder="enter supplier_name" readonly/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Supplier Rep1</td>


                                <td><input type="text" name="supplier_rep1" id="supplier_rep12" placeholder="enter esupplier_rep1" readonly/></td>

                            </tr>


                            <tr>
                                <td></td>
                                <td>Supplier Phone1</td>


                                <td><input type="text" name="supplier_phone1" id="supplier_phone12" placeholder="enter supplier_phone1" readonly/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Supplier Email1</td>


                                <td><input type="text" name="supplier_email1" id="supplier_email12" placeholder="enter supplier_email1" readonly/></td>

                            </tr>

                            <tr>
                                <td></td>
                                <td>Supplier Rep2</td>


                                <td><input type="text" name="supplier_rep2" id="supplier_rep22" placeholder="enter supplier_rep2" readonly/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Supplier Phone2</td>


                                <td><input type="text" name="supplier_phone2" id="supplier_phone22" placeholder="enter supplier_phone2" readonly/></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td>Supplier Email2</td>


                                <td><input type="text" name="supplier_email2" id="supplier_email22" placeholder="enter supplier_email2" readonly/></td>

                            </tr>
                            <tr>
                                <td></td>

                                <td>
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
                        <h4 class="modal-title" style="color:white;">Deactivate Supplyer</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="/deactive-supplyer">
                         {{ csrf_field() }}
                         <input type="hidden" name="supplier_id" id="supplier_id3"  readonly/>
                            Do you want to deactivate the supplier.

                            <br/>

                            <button style="margin-left:90%" type="submit" class="btn btn-primary btn-sm">YES</button>
                        </form>


                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



        <div class="modal fade" id="editSupplyer" style="padding-right:50%">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#438EB9">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:white;">Edit Supplyer</h4>
                </div>
                <div class="modal-body">
                    <table  class="table">
                        <form method="POST" action="/update-supplyer">
                        {{ csrf_field() }}

                        <tbody>
                         <tr>
                            <td></td>
                            <td>Supplier Id</td>
                            <td><input type="text" name="supplier_id" id="supplier_id1"  readonly/></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Name</td>
                            <td><input type="text" name="supplier_name" id="supplier_name1" placeholder="enter supplier_name" required/></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Rep1</td>


                            <td><input type="text" name="supplier_rep1" id="supplier_rep11" placeholder="enter esupplier_rep1"></td>

                        </tr>


                        <tr>
                            <td></td>
                            <td>Supplier Phone1</td>


                            <td><input type="text" name="supplier_phone1" id="supplier_phone11" placeholder="enter supplier_phone1"></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Email1</td>


                            <td><input type="text" name="supplier_email1" id="supplier_email11" placeholder="enter supplier_email1"></td>

                        </tr>

                        <tr>
                            <td></td>
                            <td>Supplier Rep2</td>


                            <td><input type="text" name="supplier_rep2" id="supplier_rep21" placeholder="enter supplier_rep2"></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Phone2</td>


                            <td><input type="text" name="supplier_phone2" id="supplier_phone21" placeholder="enter supplier_phone2"></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Supplier Email2</td>


                            <td><input type="text" name="supplier_email2" id="supplier_email21" placeholder="enter supplier_email2"></td>

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


    <div class="modal fade" id="active" style="padding-right:50%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#438EB9">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color:white;">Activate Supplyer</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="/active-supplyer">
                         {{ csrf_field() }}
                         <input type="hidden" name="supplier_id" id="supplier_id4"  readonly/>
                            Do you want to activate the supplier.

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
