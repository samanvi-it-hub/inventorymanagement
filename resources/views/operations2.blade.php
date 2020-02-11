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
    function myFunction(r,s,v) {
var res;
res=s*r;
  document.getElementById(v).value = res;
  
}

function add()
{
  var a=parseInt( document.getElementById("twothousand").value);
  var b=parseInt( document.getElementById("fivehundred").value);
  var c=parseInt( document.getElementById("twohundred").value);
  var d=parseInt( document.getElementById("hundred").value);
  var e=parseInt( document.getElementById("fifty").value);
  var f=parseInt( document.getElementById("twenty").value);
  var g=parseInt( document.getElementById("ten").value);
  var h=parseInt( document.getElementById("tenc").value);
  var i=parseInt( document.getElementById("five").value);
  var j=parseInt( document.getElementById("two").value);
  var k=parseInt( document.getElementById("one").value);
  var l=a+b+c+d+e+f+g+h+i+j+k;
  document.getElementById("total").value = l;
  var data=[a,b,c,d,e,f,g,h,i,j,k,l];
  window.location = "operations_open?data="+data;
}
function add_close()
{
  var a=parseInt( document.getElementById("two_2000").value);
  var b=parseInt( document.getElementById("five_500").value);
  var c=parseInt( document.getElementById("two_200").value);
  var d=parseInt( document.getElementById("hundred_100").value);
  var e=parseInt( document.getElementById("fifty_50").value);
  var f=parseInt( document.getElementById("twenty_20").value);
  var g=parseInt( document.getElementById("ten_10").value);
  var h=parseInt( document.getElementById("ten_c_10").value);
  var i=parseInt( document.getElementById("five_5").value);
  var j=parseInt( document.getElementById("two_2").value);
  var k=parseInt( document.getElementById("one_1").value);
  var l=a+b+c+d+e+f+g+h+i+j+k;
  document.getElementById("total_close").value = l;
  var data=[a,b,c,d,e,f,g,h,i,j,k,l];
  window.location = "operations_close?data="+data;
}
function net_sale(n)
{  
	var gst;
	gst=(5/100)*n;
	document.getElementById("gst").value = gst.toFixed(2);
	var gross;
	gross=parseFloat(n)+parseFloat(gst);
	document.getElementById("gross").value = gross.toFixed(2);
	var tokens= document.getElementById("tokens").value;
	gst=gst.toFixed(2);
    gross=gross.toFixed(2);
    var data=[tokens,n,gst,gross];
    window.location = "operations_net_sale?data="+data;
}
function net_billing(pt,pp,ed,nt)
{
	
	var total;
	total=parseFloat(pt)+parseFloat(pp)+parseFloat(ed)
	document.getElementById(nt).value = total.toFixed(2);
		total=total.toFixed(2);
    var cash=document.getElementById("cash").value;
    var data=[cash,pt,pp,ed,total];
    window.location = "operations_net_billing?data="+data;
}
function net_actual(pt,pp,ed,nt)
{
	
	var total;
	total=parseFloat(pt)+parseFloat(pp)+parseFloat(ed)
	document.getElementById(nt).value = total.toFixed(2);
    total=total.toFixed(2);
    var data=[pt,pp,ed,total];
    window.location = "operations_net_actual?data="+data;
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
                            <li  class="active">
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
           <div class="col-md-11" style="padding-left:6%;padding-top:2%">
           
       </div>
    </div>
   





       
    </div>
    <div class="container" style="padding-left:20%">
         <div class="row">
              <div class="col-md-6">
                     <h4>Opening Balance</h4>
                          <h6>Notes</h6>
                          @if($open->isEmpty())
                          
                          <table>
                          <tr>
                          <td>₹ 2000</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(2000,this.value,'twothousand')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="twothousand" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 500</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(500,this.value,'fivehundred')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="fivehundred" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 200</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(200,this.value,'twohundred')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="twohundred" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 100</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(100,this.value,'hundred')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="hundred" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 50</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(50,this.value,'fifty')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="fifty" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 20</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(20,this.value,'twenty')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="twenty" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 10</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(10,this.value,'ten')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="ten" size="8" readonly></td>
                          </tr>
                          </table>
                          
                          <h6>Coins</h6>
                          <table>
                          
                          <tr>
                          <td>₹ 10</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(10,this.value,'tenc')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="tenc" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 5</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(5,this.value,'five')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="five" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 2</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(2,this.value,'two')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="two" size="8" readonly></td>
                          </tr>
                          
                          <tr>
                          <td>₹ 1</td>
                          <td>*</td>
                          <td><input type="text" id="h" onblur="myFunction(1,this.value,'one')" size="4"></td>
                          <td>=</td>
                          <td><input type="text" id="one" size="8" readonly></td>
                          </tr>
                          
                          </table>
                          
                          
                          <input type="submit" class="btn btn-primary btn-sm" onclick="add()" value="total">
                          <input type="text" id="total" >
                                    <br/>
                                    <br/>
                                    
                                
                                @else
                                
                                    @foreach($open as $opens)
                                    
                                        @if($opens->status==0)
                                        <table>
                                            <tr>
                                            <td>₹ 2000</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(2000,this.value,'twothousand')" value="{{$opens->two_thousand/2000}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="twothousand" size="8"  value="{{$opens->two_thousand}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 500</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(500,this.value,'fivehundred')" value="{{$opens->five_hundred/500}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="fivehundred" size="8" value="{{$opens->five_hundred}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 200</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(200,this.value,'twohundred')" value="{{$opens->two_hundred/200}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="twohundred" size="8" value="{{$opens->two_hundred}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 100</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(100,this.value,'hundred')" value="{{$opens->hundred/100}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="hundred" size="8" value="{{$opens->hundred}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 50</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(50,this.value,'fifty')" value="{{$opens->fifty/50}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="fifty" size="8" value="{{$opens->fifty}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 20</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(20,this.value,'twenty')" value="{{$opens->twenty/20}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="twenty" size="8" value="{{$opens->twenty}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 10</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(10,this.value,'ten')" value="{{$opens->ten/10}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="ten" size="8" value="{{$opens->ten}}" readonly></td>
                                            </tr>
                                            </table>
                                            
                                            <h6>Coins</h6>
                                            <table>
                                            
                                            <tr>
                                            <td>₹ 10</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(10,this.value,'tenc')" value="{{$opens->tenc/10}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="tenc" size="8" value="{{$opens->tenc}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 5</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(5,this.value,'five')" value="{{$opens->five/5}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="five" size="8" value="{{$opens->five}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 2</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(2,this.value,'two')" value="{{$opens->two/2}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="two" size="8" value="{{$opens->two}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 1</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" onblur="myFunction(1,this.value,'one')" value="{{$opens->one/1}}" size="4"></td>
                                            <td>=</td>
                                            <td><input type="text" id="one" size="8" value="{{$opens->one}}" readonly></td>
                                            </tr>
                                            
                                            </table>
                                            
                                            
                                            <input type="submit" class="btn btn-primary btn-sm" onclick="add()" value="total">
                                            <input type="text" id="total" value="{{$opens->open_total}}" >
                                            <br/>
                                            
                                           <a href="/freez_open"> <input type="submit" class="btn btn-primary btn-sm" value="FREEZ"></a>
                                        @else
                                        <table>
                                            <tr>
                                            <td>₹ 2000</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  value="{{$opens->two_thousand/2000}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="twothousand" size="8"  value="{{$opens->two_thousand}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 500</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" value="{{$opens->five_hundred/500}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="fivehundred" size="8" value="{{$opens->five_hundred}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 200</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" value="{{$opens->two_hundred/200}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="twohundred" size="8" value="{{$opens->two_hundred}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 100</td>
                                            <td>*</td>
                                            <td><input type="text" id="h" value="{{$opens->hundred/100}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="hundred" size="8" value="{{$opens->hundred}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 50</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  value="{{$opens->fifty/50}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="fifty" size="8" value="{{$opens->fifty}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 20</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  value="{{$opens->twenty/20}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="twenty" size="8" value="{{$opens->twenty}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 10</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  value="{{$opens->ten/10}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="ten" size="8" value="{{$opens->ten}}" readonly></td>
                                            </tr>
                                            </table>
                                            
                                            <h6>Coins</h6>
                                            <table>
                                            
                                            <tr>
                                            <td>₹ 10</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  value="{{$opens->tenc/10}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="tenc" size="8" value="{{$opens->tenc}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 5</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  value="{{$opens->five/5}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="five" size="8" value="{{$opens->five}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 2</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  size="4" value="{{$opens->two/2}}" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="two" size="8" value="{{$opens->two}}" readonly></td>
                                            </tr>
                                            
                                            <tr>
                                            <td>₹ 1</td>
                                            <td>*</td>
                                            <td><input type="text" id="h"  value="{{$opens->one/1}}" size="4" readonly></td>
                                            <td>=</td>
                                            <td><input type="text" id="one" size="8" value="{{$opens->one}}" readonly></td>
                                            </tr>
                                            
                                            </table>
                                            
                                            
                                            Total :
                                            <input type="text" id="total" value="{{$opens->open_total}}"  readonly>
                                            <br/>
                                            <br/>
                                        @endif
                                    
                                    @endforeach
                                
                                @endif
                                
                            </div>
                            <h4>Closing Balance</h4>
                             <h6>Notes</h6>
                             @if($close->isEmpty())
                
          <table>
          <tr>
          <td>₹ 2000</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(2000,this.value,'two_2000')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="two_2000" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 500</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(500,this.value,'five_500')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="five_500" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 200</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(200,this.value,'two_200')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="two_200" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 100</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(100,this.value,'hundred_100')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="hundred_100" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 50</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(50,this.value,'fifty_50')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="fifty_50" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 20</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(20,this.value,'twenty_20')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="twenty_20" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 10</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(10,this.value,'ten_10')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="ten_10" size="8" readonly></td>
          </tr>
          </table>
          
          <h6>Coins</h6>
          <table>
          
          <tr>
          <td>₹ 10</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(10,this.value,'ten_c_10')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="ten_c_10" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 5</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(5,this.value,'five_5')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="five_5" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 2</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(2,this.value,'two_2')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="two_2" size="8" readonly></td>
          </tr>
          
          <tr>
          <td>₹ 1</td>
          <td>*</td>
          <td><input type="text" id="h" onblur="myFunction(1,this.value,'one_1')" size="4"></td>
          <td>=</td>
          <td><input type="text" id="one_1" size="8" readonly></td>
          </tr>
          
          </table>
          
          
          <input type="submit" onclick="add_close()" class="btn btn-primary btn-sm" value="total">
          <input type="text" id="total_close" >
          <br/>
          <br/>
          
      
      @else
      
          @foreach($close as $closes)
          
              @if($closes->status==0)
              <table>
                  <tr>
                  <td>₹ 2000</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(2000,this.value,'two_2000')" value="{{$closes->two_thousand/2000}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="two_2000" size="8"  value="{{$closes->two_thousand}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 500</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(500,this.value,'five_500')" value="{{$closes->five_hundred/500}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="five_500" size="8" value="{{$closes->five_hundred}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 200</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(200,this.value,'two_200')" value="{{$closes->two_hundred/200}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="two_200" size="8" value="{{$closes->two_hundred}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 100</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(100,this.value,'hundred_100')" value="{{$closes->hundred/100}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="hundred_100" size="8" value="{{$closes->hundred}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 50</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(50,this.value,'fifty_50')" value="{{$closes->fifty/50}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="fifty_50" size="8" value="{{$closes->fifty}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 20</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(20,this.value,'twenty_20')" value="{{$closes->twenty/20}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="twenty_20" size="8" value="{{$closes->twenty}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 10</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(10,this.value,'ten_10')" value="{{$closes->ten/10}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="ten_10" size="8" value="{{$closes->ten}}" readonly></td>
                  </tr>
                  </table>
                  
                  <h6>Coins</h6>
                  <table>
                  
                  <tr>
                  <td>₹ 10</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(10,this.value,'ten_c_10')" value="{{$closes->tenc/10}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="ten_c_10" size="8" value="{{$closes->tenc}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 5</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(5,this.value,'five_5')" value="{{$closes->five/5}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="five_5" size="8" value="{{$closes->five}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 2</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(2,this.value,'two_2')" value="{{$closes->two/2}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="two_2" size="8" value="{{$closes->two}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 1</td>
                  <td>*</td>
                  <td><input type="text" id="h" onblur="myFunction(1,this.value,'one_1')" value="{{$closes->one/1}}" size="4"></td>
                  <td>=</td>
                  <td><input type="text" id="one_1" size="8" value="{{$closes->one}}" readonly></td>
                  </tr>
                  
                  </table>
                  
                  
                  <input type="submit" class="btn btn-primary btn-sm" onclick="add_close()" value="total">
                  <input type="text" id="total_close" value="{{$closes->close_total}}" >
                  <br/>
                  
                 <a href="/freez_close"> <input type="submit" class="btn btn-primary btn-sm" value="FREEZ"></a>
              @else
              <table>
                  <tr>
                  <td>₹ 2000</td>
                  <td>*</td>
                  <td><input type="text" id="h"  value="{{$closes->two_thousand/2000}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="two_2000" size="8"  value="{{$closes->two_thousand}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 500</td>
                  <td>*</td>
                  <td><input type="text" id="h" value="{{$closes->five_hundred/500}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="five_500" size="8" value="{{$closes->five_hundred}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 200</td>
                  <td>*</td>
                  <td><input type="text" id="h" value="{{$closes->two_hundred/200}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="two_200" size="8" value="{{$closes->two_hundred}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 100</td>
                  <td>*</td>
                  <td><input type="text" id="h" value="{{$closes->hundred/100}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="hundred_100" size="8" value="{{$closes->hundred}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 50</td>
                  <td>*</td>
                  <td><input type="text" id="h"  value="{{$closes->fifty/50}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="fifty_50" size="8" value="{{$closes->fifty}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 20</td>
                  <td>*</td>
                  <td><input type="text" id="h"  value="{{$closes->twenty/20}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="twenty_20" size="8" value="{{$closes->twenty}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 10</td>
                  <td>*</td>
                  <td><input type="text" id="h"  value="{{$closes->ten/10}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="ten_10" size="8" value="{{$closes->ten}}" readonly></td>
                  </tr>
                  </table>
                  
                  <h6>Coins</h6>
                  <table>
                  
                  <tr>
                  <td>₹ 10</td>
                  <td>*</td>
                  <td><input type="text" id="h"  value="{{$closes->tenc/10}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="ten_c_10" size="8" value="{{$closes->tenc}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 5</td>
                  <td>*</td>
                  <td><input type="text" id="h"  value="{{$closes->five/5}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="five_5" size="8" value="{{$closes->five}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 2</td>
                  <td>*</td>
                  <td><input type="text" id="h"  size="4" value="{{$closes->two/2}}" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="two_2" size="8" value="{{$closes->two}}" readonly></td>
                  </tr>
                  
                  <tr>
                  <td>₹ 1</td>
                  <td>*</td>
                  <td><input type="text" id="h"  value="{{$closes->one/1}}" size="4" readonly></td>
                  <td>=</td>
                  <td><input type="text" id="one_1" size="8" value="{{$closes->one}}" readonly></td>
                  </tr>
                  
                  </table>
                  
                  
                  Total :
                  <input type="text" id="total" value="{{$closes->close_total}}"  readonly>
                  <br/>
                  <br/>
              @endif
          
          @endforeach
      
      @endif
      </div>
  </div>
                        </div>
                      
                        </div>
                       
              
              </div>
             
              <div class="col-md-6" style="padding-left:14.5%">
             
              <div>
            <div align="center">
                <div class="container">
                <div class="row" align="left">
                <div class="col-lg-2">
                {{$date}}
                </div>
                <div class="col-lg-2">
                <h4>Expenses</h4>
                </div>
                <div class="col-lg-2">
               <a href="/expences"><input type="submit" class="btn btn-primary btn-sm" id="expenses" value="Add Expenses"></a>
                </div>
                </div>
                </div>
              </div>
              <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>PO Number</th>
                    <th>Supplier Name</th>
                    <th>PO Cost</th>
                </tr>
                </thead>
                    <tbody>
                @foreach($expences as $expence)
                <tr>
                    <td></td>
                    <td>{{$expence->PO}}</td>
                    <td>
                        @foreach($suppliers as $supplier)
                        @if($expence->supplier_id==$supplier->supplier_id)
                        {{$supplier->supplier_name}}
                        @endif
                        @endforeach
                    </td>
                    <td>{{$expence->po_cost}}</td>
                </tr>
                @endforeach
                <tbody>
            </table>
            </div>
            </div>

            <div style="padding-left:20%">
            
            <div style="">
                <h4 align="center">Transactions</h4>
                <div class="container">
                <div class="row">
                <div class="col-lg-2">
                @if($sale->isEmpty())
                <h6 align="center">Sales</h6>
				<table>
				<tr>
				<th>Tokens #</th>
				<td><input type="text" id="tokens" size="7"></td>
				</tr>
				<tr>
				<th>Net Sale</th>
				<td><input type="text" size="7" onblur="net_sale(this.value)"></td>
				</tr>
				<tr>
				<th>GST (5%)</th>
				<td><input type="text" size="7" id="gst"></td>
				</tr>
				<tr>
				<th>Gross Sale</th>
				<td><input type="text" size="7" id="gross"></td>
				</tr>
                </table>
                @else
                @foreach ($sale as $sales)
                @if($sales->status==0)
                <h6 align="center">Sales</h6>
				<table>
				<tr>
				<th>Toens #</th>
				<td><input type="text" id="tokens" size="7" value="{{$sales->Tokens}}"></td>
				</tr>
				<tr>
				<th>Net Sale</th>
				<td><input type="text" size="7" onblur="net_sale(this.value)" value="{{$sales->Net_sale}}"></td>
				</tr>
				<tr>
				<th>GST (5%)</th>
				<td><input type="text" size="7" id="gst" value="{{$sales->GST}}"></td>
				</tr>
				<tr>
				<th>Gross Sale</th>
				<td><input type="text" size="7" id="gross" value="{{$sales->Gross_sale}}"></td>
				</tr>
                </table>
                @else
                <h6 align="center">Sales</h6>
				<table>
				<tr>
				<th>Toens #</th>
				<td><input type="text" id="tokens" size="7" value="{{$sales->Tokens}}" readonly></td>
				</tr>
				<tr>
				<th>Net Sale</th>
				<td><input type="text" size="7" value="{{$sales->Net_sale}}" readonly></td>
				</tr>
				<tr>
				<th>GST (5%)</th>
				<td><input type="text" size="7" id="gst" value="{{$sales->GST}}" readonly></td>
				</tr>
				<tr>
				<th>Gross Sale</th>
				<td><input type="text" size="7" id="gross" value="{{$sales->Gross_sale}}" readonly></td>
				</tr>
                </table>
                @endif  
                @endforeach
                @endif
                </div>
                <div class="col-lg-2">
                @if($billing->isEmpty())
                <h6 align="center">Billing</h6>
				<table>
				<tr>
				<th>Cash</th>
				<td><input type="text" id="cash" size="7"></td>
				</tr>
				<tr>
				<th>PayTm</th>
				<td><input type="text" id="paytm" size="7"></td>
				</tr>
				<tr>
				<th>Phone Pe</th>
				<td><input type="text" id="phonepe" size="7"></td>
				</tr>
				<tr>
				<th>EDC</th>
				<td><input type="text" id="edc" onblur="net_billing(document.getElementById('paytm').value,document.getElementById('phonepe').value,this.value,'net_total')" size="7"></td>
				</tr>
				<tr>
				<th>Net Total</th>
				<td><input type="text" id="net_total" size="7"></td>
				</tr>
                </table>
                @else
                @foreach ($billing as $billings)
                @if($billings->status==0)
                <h6 align="center">Billing</h6>
				<table>
				<tr>
				<th>Cash</th>
				<td><input type="text" id="cash" size="7" value="{{$billings->Cash}}"></td>
				</tr>
				<tr>
				<th>PayTm</th>
				<td><input type="text" id="paytm" size="7" value="{{$billings->Paytm}}"></td>
				</tr>
				<tr>
				<th>Phone Pe</th>
				<td><input type="text" id="phonepe" size="7" value="{{$billings->Phonepe}}"></td>
				</tr>
				<tr>
				<th>EDC</th>
				<td><input type="text" id="edc" value="{{$billings->EDC}}" onblur="net_billing(document.getElementById('paytm').value,document.getElementById('phonepe').value,this.value,'net_total')" size="7"></td>
				</tr>
				<tr>
				<th>Net Total</th>
				<td><input type="text" id="net_total" size="7" value="{{$billings->Net_total}}"></td>
				</tr>
                </table>
                @else
                <h6 align="center">Billing</h6>
				<table>
				<tr>
				<th>Cash</th>
				<td><input type="text" id="cash" size="7" value="{{$billings->Cash}}" readonly></td>
				</tr>
				<tr>
				<th>PayTm</th>
				<td><input type="text" id="paytm" size="7" value="{{$billings->Paytm}}" readonly></td>
				</tr>
				<tr>
				<th>Phone Pe</th>
				<td><input type="text" id="phonepe" size="7" value="{{$billings->Phonepe}}" readonly></td>
				</tr>
				<tr>
				<th>EDC</th>
				<td><input type="text" id="edc"  size="7" value="{{$billings->EDC}}" readonly></td>
				</tr>
				<tr>
				<th>Net Total</th>
				<td><input type="text" id="net_total" size="7" value="{{$billings->Net_total}}" readonly></td>
				</tr>
                </table>
                @endif  
                @endforeach
                @endif
                </div>
                <div class="col-lg-2">
                @if($actual->isEmpty())
                <h6 align="center">Actual</h6>
				<table>
				<tr>
				<th>PayTm</th>
				<td><input type="text" id="PayTm" size="7"></td>
				</tr>
				<tr>
				<th>Phone Pe</th>
				<td><input type="text" id="Phonepe" size="7"></td>
				</tr>
				<tr>
				<th>EDC</th>
				<td><input type="text" id="Edc" onblur="net_actual(document.getElementById('PayTm').value,document.getElementById('Phonepe').value,this.value,'Net_Total')" size="7"></td>
				</tr>
				<tr>
				<th>Net Total</th>
				<td><input type="text" id="Net_Total" size="7"></td>
				</tr>
                </table>
                @else
                @foreach ($actual as $actuals)
                @if($actuals->status==0)
                <h6 align="center">Actual</h6>
				<table>
				<tr>
				<th>PayTm</th>
				<td><input type="text" id="PayTm" size="7" value="{{$actuals->paytm}}"></td>
				</tr>
				<tr>
				<th>Phone Pe</th>
				<td><input type="text" id="Phonepe" size="7" value="{{$actuals->phonepe}}"></td>
				</tr>
				<tr>
				<th>EDC</th>
				<td><input type="text" id="Edc" value="{{$actuals->EDC}}" onblur="net_actual(document.getElementById('PayTm').value,document.getElementById('Phonepe').value,this.value,'Net_Total')" size="7"></td>
				</tr>
				<tr>
				<th>Net Total</th>
				<td><input type="text" id="Net_Total" size="7" value="{{$actuals->Net_total}}"></td>
				</tr>
                </table>
                @else
                <h6 align="center">Actual</h6>
				<table>
				<tr>
				<th>PayTm</th>
				<td><input type="text" id="PayTm" size="7" value="{{$actuals->paytm}}" readonly></td>
				</tr>
				<tr>
				<th>Phone Pe</th>
				<td><input type="text" id="Phonepe" size="7" value="{{$actuals->phonepe}}" readonly></td>
				</tr>
				<tr>
				<th>EDC</th>
				<td><input type="text" id="Edc"  size="7" value="{{$actuals->EDC}}" readonly></td>
				</tr>
				<tr>
				<th>Net Total</th>
				<td><input type="text" id="Net_Total" size="7" value="{{$actuals->Net_total}}" readonly></td>
				</tr>
                </table>
                @endif  
                @endforeach
                @endif
                <a href="/freez_transactions"> <input type="submit" class="btn btn-primary btn-sm" value="FREEZ"></a>
                </div>
                </div>
                </div>
            
            </div>








         
         </div>
          
           </div>

    </body>
</html>
