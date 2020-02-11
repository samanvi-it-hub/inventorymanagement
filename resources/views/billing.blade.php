<!doctype html>

<style>
        * {box-sizing: border-box}
        
        /* Set height of body and the document to 100% */
        body, html {
          height: 100%;
          margin: 0;
          font-family: Arial;
          background-color: white;
        }
        
        /* Style tab links */
        .tablink {
          background-color: #438EB9;
          color: black;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          font-size: 17px;
          width: 50%;
        }
        
        .tablink:hover {
          background-color: black;
        }
        
        
        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
          color: black;
          display: none;
          padding: 100px 20px;
          height: 100%;
           
        }
        
        
        </style>


<script>
     function openPage(pageName,elmnt,color) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablink");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
          }
          document.getElementById(pageName).style.display = "block";
          elmnt.style.backgroundColor = color;
        }
        
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    function change(to_pay)
    {
        var k=parseInt( document.getElementById("amt").value);
        var x=k-to_pay;
        document.getElementById("change").value = x;
    }


   function mode(bill_num)
   {
      
       //alert(bill_num);
    var k=parseInt( document.getElementById("amtt").value);
    var value= $("input:radio[name=mode]:checked").val();
    //alert(value);alert(k);
    window.location="billing_final?bill_num="+bill_num+"&cost="+k+"&mode="+value;
   }
</script>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        @include('links') 
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
                <li >
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
                  <a href="reports_payments"><li>Payments</li></a>
                  
                </ul>
                <li class="active">
                  <a href="billing">
                  <i class="fa fa-money"></i> Billing</a>
                </li>
            </ul>
     </div>
</div>

<div class="container">
    <div class="row">
        <div style="width:1275px;height:85px;border:1px solid #fff;background-color:blue;margin-left:225px;overflow-x: auto;">
            @foreach ($category as $cat)
            <a href="/billing?id={{$cat->category_id}}">
            <div class="col-md-1">
            <div style="width:100px;height:50px;border:1px solid #fff;background-color:none;margin-top:10px;color:white" >
            {{ $cat->category_name }}
            </div>
            </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

<div class="container"  style="margin-left:210px;">
    <div class="row">
        <div class="col-lg-9">
            <div style="width:850px;height:500px;border:1px solid #fff;background-color:#d0d3d4;margin-top:10px;overflow-x: auto;">
                @foreach ($product as $pro)
                <a href="/billing_item?pr_id={{$pro->pr_id}}&pr_cost={{$pro->pr_cost}}&bill_num={{$bill_num}}">
                <div class="col-md-2">
                <div style="width:110px;height:75px;border:1px solid #fff;background-color:#dc7633;margin-top:10px;color:white;margin-top:20%" >
                    <p style="margin-top: 16px;margin-left:16px"> {{ $pro->Item_name }}</p>
                </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3">
            <div style="width:400px;height:450px;border:1px solid #000;background-color:#F0F3F4;margin-top:10px;overflow-x: auto;">
                <table class="table">
                <tr>
                    <th>Item Nmae</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>
                @foreach ($itms as $items)
                @foreach ($products as $pros)
                @if($items->pr_id==$pros->pr_id)
                <tr>
                    <td>{{$pros->Item_name}}</td>
                    <td>{{$items->qty}}</td>
                    <td>{{$items->cost}}</td>
                    <td>
                        <a href="/billing_delete_item?id={{$items->id}}&cost={{$items->cost}}&qty={{$items->qty}}&itm_cost={{$pros->pr_cost}}"><button><i class="fa fa-minus"></i></button></a>
                        <a href="/billing_delete?id={{$items->id}}"><button><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endif
                @endforeach
                @endforeach
                </table>
            </div>
            <div style="width:400px;height:50px;background-color:none;margin-top:10px;">
                <div align="center">
                <button class="btn btn-primary" data-toggle="modal" data-target="#payment" onclick="openPage('Cash', defaultOpen, 'white')">settle</button>
                </div>
            </div>
        </div>
    </div>
</div>

                






<div class="modal fade" id="payment" style="padding-right:50%">
        <div class="modal-dialog" style="width:120%">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#438EB9">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:white;">Payment</h4>
                </div>
                <div class="modal-body">
                <div class="container">
                <div class="row">
                <div class="col-md-4">
                <div style="width:375px;height:400px;border:1px solid #000;background-color:none;margin-top:10px;overflow-x: auto;">
                        
                    @php $totalcost=0; @endphp

                        <table class="table">
                        <tr>
                            <th>Item Nmae</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                          
                        </tr>
                        @foreach ($itms as $items)
                        @foreach ($products as $pros)
                        @if($items->pr_id==$pros->pr_id)
                        <tr>
                            <td>{{$pros->Item_name}}</td>
                            <td>{{$items->qty}}</td>
                            <td>{{$items->cost}}</td>
                            
                        </tr>
                        @php $totalcost=$totalcost+$items->cost; @endphp
                        
                        @endif
                        @endforeach
                        @endforeach
                        </table>
                    </div>   
                    @php $tax=(5/100)*$totalcost; $T_cost=$tax+$totalcost;
                    $T_cost=round($T_cost); @endphp
                    <table  class="table">
                    <tbody>
                    <tr>
                    <td></td>
                    <td>Amount</td><td><input type="text" value="{{$totalcost}}"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>Tax</td><td><input type="text" value="{{$tax}}"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>To be Paid</td><td><input type="text" value="{{$T_cost}}"></td>
                    </tr>
                    </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                   
                    <button class="tablink" onclick="openPage('Cash', this, 'white')" id="defaultOpen">CASH</button>
                    <button class="tablink" onclick="openPage('Card', this, 'white')">CARD</button>
                    <div id="Cash" class="tabcontent">
                    
                    <table  class="table">
                        <tbody>
                            <tr>
                            
                            <td><input type="number" id="amt" name="amt" size="5"></td>
                            <td><button class="btn btn-primary" onclick="change({{$T_cost}})">INR.</button></td>
                            </tr>
                            <tr>
                            
                            <td>CHANGE</td>
                            <td><input type="number" id="change" name="change" size="5" readonly/></td>
                            </tr>
                        </tbody>
                    </table>
                    <div align="center">
                            <a href="/billing_final?bill_num={{$bill_num}}&cost={{$T_cost}}&mode=cash"><button class="btn btn-primary">DONE</button></a>
                        </div>
                    </div>
                    
                    <div id="Card" class="tabcontent">
                    
                            <table>
                                <tbody>
                                    <tr>
                                    
                                    <td><input type="number" id="amtt" name="amtt" size="5"></td>
                                    
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <br>
                            
                            <table  class="table">
                                    <tbody>
                                    
                                    <tr>
                                    <td></td>
                                    <td><input type="radio" name="mode" id="mode" value="credit"><label>Credit Card</label></td>
                                    <td><input type="radio" name="mode" id="mode" value="Debit"><label>Debit Card</label></td>
                                    
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td><input type="radio" name="mode" id="mode" value="paytm"><label>Paytm</label></td>
                                    <td><input type="radio" name="mode" id="mode" value="phonepe"><label>Phonepe</label></td>
                                    
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td><input type="radio" name="mode" id="mode" value="upi"><label>UPI</label></td>
                                    <td><input type="radio" name="mode" id="mode" value="googlepay"><label>Google Pay</label></td>

                                    </tr>
                                    </tbody>
                            </table>
                            
                                <div align="center">
                                        <button class="btn btn-primary" onclick="mode({{$bill_num}})">DONE</button>
                                    </div>
                    </div>

                </div>
                </div>
                </div>
                
                </div>
            
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>