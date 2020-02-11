<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Session;
use Carbon\Carbon;
//session_start();

class Controller extends BaseController
{


   public function login()
   {
      return view('login');
   }
   public function login_check(Request $request)
   {
      $user_id=$request->user_id;
      $password=$request->password;
      $user=DB::table('sis_users')->where('user_id',$user_id)->get();
      
     foreach($user as $user)
     {
      if($user_id==$user->user_id && $password==$user->password)
      {
         //Session::set('id'$user_id);
         session(['id' => $user_id]);
         return redirect('/dashboard');           
      }
   
      else
      {
         // echo "wrong credentials";
         return view('login');
         // return redirect()->route('views.login')->with('jsAlert', 'updated succesfully');
         // ;
      }
   }
      
   }

   public function logout()
   {
      Session::get('id');
      Session::forget('id');
      return view('login');
   }

  //dahboard function
   public function count_dashboard(Request $request1)
   {
     $user_id= Session::get('id');

      $data1 = DB::table('sis_suppliers')->count();
      $data2 = DB::table('sis_raw_materials')->count();
      $data3 = DB::table('sis_products')->count();


            $data=array(
               "Suppliers"=>$data1,
               "Raw Materials"=>$data2,
               "Products"=>$data3,
            );
            if($user_id!=null)
            {
            return view('welcome2',compact('data'));
            }
            else{
               return view('login');
            }
   }
  //end of dashboard controller...
  
  //supplier functions
   public function suppliers_list()
   {
      $user_id= Session::get('id');
      $list = DB::table('sis_suppliers')->get();
      //print_r($list);
      //print($list);
      //return view ('suppliers')->with('list',$list); 
      //return view('suppliers',compact('list'));

      if($user_id!=null)
            {
      return view('suppliers2', ['list' => $list]);
            }
            else{
               return view('login');
            }
   }

     public function save_supplyer(Request $request) {

      $user_id= Session::get('id');
      $data = array();

      $data['1'] = $request->supplier_id;
      $data['2'] = $request->supplier_name;
      $data['3'] = $request->supplier_rep1;
      $data['4'] = $request->supplier_phone1;
      $data['5'] = $request->supplier_email1;
      $data['6'] = $request->supplier_rep2;
      $data['7'] = $request->supplier_phone2;
      $data['8'] = $request->supplier_email2;
      $data['9'] = 1;

      DB::table('sis_suppliers')->insert(
         ['supplier_id' => $data['1'], 'supplier_name' => $data['2'],'supplier_status'=>$data['9'],'supplier_rep1' => $data['3'], 'supplier_phone1'=> $data['4'], 'supplier_email1'=>$data['5'], 'supplier_rep2'=>$data['6'], 'supplier_phone2'=>$data['7'], 'supplier_email2'=>$data['8']]
     );
     
     //return Redirect::back();
     if($user_id!=null)
            {
     return $this->suppliers_list();
            }
            else{
               return view('login');
            }
      }

      public function update_supplyer(Request $request) {

         $user_id= Session::get('id');
         $data = array();
   
         $data['1'] = $request->supplier_id;
         $data['2'] = $request->supplier_name;
         $data['3'] = $request->supplier_rep1;
         $data['4'] = $request->supplier_phone1;
         $data['5'] = $request->supplier_email1;
         $data['6'] = $request->supplier_rep2;
         $data['7'] = $request->supplier_phone2;
         $data['8'] = $request->supplier_email2;
         $data['9'] = 1;
   
         DB::table('sis_suppliers')
         ->where('supplier_id',$data['1'])
         ->update([ 'supplier_name' => $data['2'],'supplier_rep1' => $data['3'], 'supplier_phone1'=> $data['4'], 'supplier_email1'=>$data['5'], 'supplier_rep2'=>$data['6'], 'supplier_phone2'=>$data['7'], 'supplier_email2'=>$data['8']]
        );
        
        if($user_id!=null)
        {
        
        return $this->suppliers_list();
        }
        else{
         return view('login');
      }
         }

         public function decativate_supplyer(Request $request) {

            $user_id= Session::get('id');
            $data = $request->supplier_id;
      
            
            
            DB::table('sis_suppliers')
            ->where('supplier_id',$data)
            ->update([ 'supplier_status' => 0]
           );
           
      
           if($user_id!=null)
            {
          //return $this->suppliers_list();
          return redirect('/suppliers');
            }
            else{
               return view('login');
            }
           
         }
         public function ativate_supplyer(Request $request) {

            $user_id= Session::get('id');
            $data = $request->supplier_id;
      
            
            
            DB::table('sis_suppliers')
            ->where('supplier_id',$data)
            ->update([ 'supplier_status' => 1]
           );
           
      
           if($user_id!=null)
            {
          //return $this->suppliers_list();
          return redirect('/suppliers');
            }
            else{
               return view('login');
            }
           
         }
         //end of supplier functions
      

         //raw material functions
         public function rm_list()
         {
            $user_id= Session::get('id');
           // $list = DB::table('sis_raw_materials')->get();

           $list = DB::table('sis_raw_materials')
            ->join('sis_unit_of_measure', 'sis_raw_materials.unit_of_measure', '=', 'sis_unit_of_measure.id')
            ->select('sis_raw_materials.*', 'sis_unit_of_measure.*')
            ->get();
            //print_r($list);
            $unit_of_measure=DB::table('sis_unit_of_measure')->get();
            $category = DB::table('sis_rm_category')->get();

            $rm_sup = DB::table('sis_raw_materials')
            ->join('sis_material_suppliers', 'sis_raw_materials.rm_id', '=', 'sis_material_suppliers.rm_id') 
            ->join('sis_suppliers','sis_material_suppliers.supplier_id','=','sis_suppliers.supplier_id')
            ->select('sis_raw_materials.*', 'sis_material_suppliers.*','sis_suppliers.supplier_name')
            ->where(['sis_material_suppliers.status'=>1])
            ->get();

            if($user_id!=null)
            {
            return view('ingradients2', ['list' => $list,'unit_of_measure' => $unit_of_measure, 'category' => $category, 'rm_sup'=> $rm_sup]);
            }
            else{
               return view('login');
            }
         }
         public function rm_category_list(Request $request3)
         {
            $user_id= Session::get('id');
            $list = DB::table('sis_rm_category')->get();
            if($user_id!=null)
            {
            return view('rm_category2', ['list' => $list]);
            }
            else{
               return view('login');
            }
         }
         public function save_ingradient(Request $request) {

            $user_id= Session::get('id');
            $data = array();
      
            $data['1'] = $request->ingradient_id;
            $data['2'] = $request->ingradient_name;
            $data['3'] = $request->category;
            $data['4'] = $request->ingradient_des;
            $data['5'] = $request->unit_of_measure;
            $data['6'] = 1;
      
            DB::table('sis_raw_materials')->insert(
               ['rm_id' => $data['1'], 'item_name' => $data['2'],'rm_category'=>$data['3'],'item_description' => $data['4'], 'unit_of_measure'=> $data['5'], 'item_status'=>$data['6']]
           );
           
           if($user_id!=null)
           {
           
           return $this->rm_list();
           }
           else{
            return view('login');
         }
            }
            public function update_ingradient(Request $request) {

               $user_id= Session::get('id');
               $data = array();
         
               $data['1'] = $request->rm_id;
               $data['2'] = $request->item_name;
               $data['3'] = $request->item_des;
               $data['4'] = $request->unit_of_measure;
         
               DB::table('sis_raw_materials')
               ->where('rm_id',$data['1'])
               ->update([ 'item_name' => $data['2'],'item_description' => $data['3'],'unit_of_measure' => $data['4']]
              );
               
              if($user_id!=null)
            {
              //return $this->product_list();
              return redirect('/ingradients');
            }
            else{
               return view('login');
            }
               }

               public function decativate_ingradient(Request $request) {

                  $user_id= Session::get('id');
                  $data = $request->rm_id;
             
                  DB::table('sis_raw_materials')
                  ->where('rm_id',$data)
                  ->update([ 'item_status' => 0]
                 );
                
                 if($user_id!=null)
                 {
                return redirect('/ingradients');
                 }
                 else{
                  return view('login');
               }
                 
               }
               public function ativate_ingradient(Request $request) {
      
                  $user_id= Session::get('id');
                  $data = $request->rm_id;
             
                  DB::table('sis_raw_materials')
                  ->where('rm_id',$data)
                  ->update([ 'item_status' => 1]
                 );
                 
                 if($user_id!=null)
                 {
                return redirect('/ingradients');
                 }
                 else{
                  return view('login');
               }
                 
               }

         public function ingradient_supplier(Request $request)
         {
            $user_id= Session::get('id');
            $rm_id = $request->id;

            $name=DB::table('sis_raw_materials')->select('item_name')->where(['rm_id'=>$rm_id])->get();
               
            $rm_sup = DB::table('sis_raw_materials')
            ->join('sis_material_suppliers', 'sis_raw_materials.rm_id', '=', 'sis_material_suppliers.rm_id') 
            ->join('sis_suppliers','sis_material_suppliers.supplier_id','=','sis_suppliers.supplier_id')
            ->select('sis_raw_materials.*', 'sis_material_suppliers.*','sis_suppliers.supplier_name')
            ->where(['sis_raw_materials.rm_id'=>$rm_id,'sis_material_suppliers.status'=>1])
            ->get();
            
            $list= DB::table('sis_suppliers')->get();

            //print_r($rm_sup);
            if($user_id!=null)
                 {
            return view('ingradient_supplier2',['rm_sup'=>$rm_sup, 'list'=>$list,'rm_id'=>$rm_id,'name'=>$name]);
         }
         else{
          return view('login');
       }
         
         }
         public function ingradient_suplier_deactive(Request $request)
         {
            $user_id= Session::get('id');
            $rm_id = $request->rm_id;
            $sup_id = $request->supplier_id;
           // print_r($rm_id);
            //print_r($sup_id);
            DB::table('sis_material_suppliers')
            ->where(['rm_id'=>$rm_id,'supplier_id'=>$sup_id])
            ->update([ 'status' => 0]
           );
           if($user_id!=null)
                 {
            return redirect()->back();
         }
         else{
          return view('login');
       }
         

         }
         public function ingradient_suplier_insert(Request $request)
         {
            $user_id= Session::get('id');
            $rm_id = $request->rm_id;
            $sup_id = $request->supplier;

            $count=DB::table('sis_material_suppliers')->where(['rm_id'=>$rm_id,'supplier_id'=>$sup_id])->count();
            if($count==1)
            {
               DB::table('sis_material_suppliers')
               ->where(['rm_id'=>$rm_id,'supplier_id'=>$sup_id])
               ->update([ 'status' => 1]
               );
            }
            else
            {
               DB::table('sis_material_suppliers')
               ->insert(['rm_id' => $rm_id,'supplier_id'=>$sup_id,'item_cost'=>0,'item_lead_time'=>0, 'status' => 1]
              );
            }

            if($user_id!=null)
                 {
            return redirect()->back();
         }
         else{
          return view('login');
       }
         

         }
         //end of raw material functions


         //product functions
        
         public function product_list()
         {

            $user_id= Session::get('id');
            $list = DB::table('sis_products')->get();
            $category = DB::table('sis_category')->get();
            $p_rm = DB::table('sis_products')
            ->join('sis_products_raw_materials', 'sis_products.pr_id', '=', 'sis_products_raw_materials.pr_id') 
            ->join('sis_raw_materials','sis_products_raw_materials.rm_id','=','sis_raw_materials.rm_id')
            ->select('sis_products.*', 'sis_products_raw_materials.*','sis_raw_materials.item_name')
            ->where(['sis_products_raw_materials.item_status'=>1])
            ->get();



            if($user_id!=null)
            {
            return view('end_products2', ['list' => $list, 'category' => $category, 'p_rm' => $p_rm ]);
            }
            else{
               return view('login');
            }
         }
         public function product_category_list(Request $request3)
         {

            $user_id= Session::get('id');
            $list = DB::table('sis_category')->get();
            if($user_id!=null)
            {
            return view('product_category2', ['list' => $list]);
            }
            else{
               return view('login');
            }
         }
         public function update_product(Request $request) {


            $user_id= Session::get('id');
            $data = array();
      
            $data['1'] = $request->pr_id;
            $data['2'] = $request->item_name;
            $data['3'] = $request->item_des;
           
      
            DB::table('sis_products')
            ->where('pr_id',$data['1'])
            ->update([ 'item_name' => $data['2'],'item_description' => $data['3']]
           );
            
           if($user_id!=null)
            {
           //return $this->product_list();
           return redirect('/end_products2');
            }
            else{
               return view('login');
            }
            }
            public function decativate_product(Request $request) {


               $user_id= Session::get('id');
               $data = $request->pr_id;
          
               DB::table('sis_products')
               ->where('pr_id',$data)
               ->update([ 'item_status' => 0]
              );
             
              if($user_id!=null)
            {
             //return $this->suppliers_list();
             return redirect('/end_products2');
            }
            else{
               return view('login');
            }
              
            }
            public function ativate_product(Request $request) {
   

               $user_id= Session::get('id');
               $data = $request->pr_id;
          
               DB::table('sis_products')
               ->where('pr_id',$data)
               ->update([ 'item_status' => 1]
              );
              
              if($user_id!=null)
            {
             //return $this->suppliers_list();
             return redirect('/end_products2');
            }
            else{
               return view('login');
            }
              
            }
            public function save_product(Request $request) {


               $user_id= Session::get('id');
               $data = array();
         
               $data['1'] = $request->product_id;
               $data['2'] = $request->product_name;
               $data['3'] = $request->category;
               $data['4'] = $request->product_des;
               $data['5'] = 1;
         
               DB::table('sis_products')->insert(
                  ['pr_id' => $data['1'],'category_id'=>$data['3'], 'item_name' => $data['2'],'item_description' => $data['4'], 'item_status'=>$data['5']]
              );
              
              if($user_id!=null)
              {
              return redirect('/end_products2');
              //return $this->product_list();
              }
              else{
               return view('login');
                  }
            }

            public function product_ingradient(Request $request)
            {
               $user_id= Session::get('id');
               $pr_id = $request->id;
            $list = DB::table('sis_raw_materials')->get();
            
            $name=DB::table('sis_products')->select('Item_name')->where(['pr_id'=>$pr_id])->get();

            $p_rm = DB::table('sis_products')
            ->join('sis_products_raw_materials', 'sis_products.pr_id', '=', 'sis_products_raw_materials.pr_id') 
            ->join('sis_raw_materials','sis_products_raw_materials.rm_id','=','sis_raw_materials.rm_id')
            ->select('sis_products.*', 'sis_products_raw_materials.*','sis_raw_materials.item_name')
            ->where(['sis_products.pr_id'=>$pr_id,'sis_products_raw_materials.item_status'=>1])
            ->get();
           // print_r($p_rm);
           if($user_id!=null)
              {
               return view('product_ingradientt',['list'=>$list, 'p_rm'=>$p_rm,'pr_id'=>$pr_id,'name'=>$name]);
            }
            else{
             return view('login');
                }
            }

            public function product_ingradient_deactive(Request $request)
         {
            $user_id= Session::get('id');
            $rm_id = $request->r_id;
            $p_id = $request->pr_id;
           // print_r($rm_id);
            //print_r($sup_id);
            DB::table('sis_products_raw_materials')
            ->where(['rm_id'=>$rm_id,'pr_id'=>$p_id])
            ->update([ 'item_status' => 0]
           );
           if($user_id!=null)
                 {
            return redirect()->back();
         }
         else{
          return view('login');
       }
      }

      public function product_ingradient_insert(Request $request)
         {
            $user_id= Session::get('id');
            $rm_id = $request->rm_id;
            $pr_id = $request->pr_id;

            $count=DB::table('sis_products_raw_materials')->where(['rm_id'=>$rm_id,'pr_id'=>$pr_id])->count();
            if($count==1)
            {
               DB::table('sis_products_raw_materials')
               ->where(['rm_id'=>$rm_id,'pr_id'=>$pr_id])
               ->update([ 'item_status' => 1]
               );
            }
            else
            {
               DB::table('sis_products_raw_materials')
               ->insert(['pr_id'=>$pr_id,'rm_id' => $rm_id,'quantity'=>0,'unit_of_measure'=>0,'item_status' => 1]
              );
            }

            if($user_id!=null)
                 {
            return redirect()->back();
         }
         else{
          return view('login');
       }
         

         }
         //end of product functions



         //inventory functions
         public function inventory()
         {

            $user_id= Session::get('id');
            $list = DB::table('sis_rm_category')->get();

            $q_in = DB::table('sis_rm_category')
            ->join('sis_raw_materials','sis_rm_category.id','=','sis_raw_materials.rm_category')
            ->join('sis_stock_inward','sis_raw_materials.rm_id','=','sis_stock_inward.rm_id')
            ->select('sis_rm_category.*', 'sis_raw_materials.*','sis_stock_inward.qty_in')
            ->get();
            //print_r($q_in);

            $q_out = DB::table('sis_rm_category')
            ->join('sis_raw_materials','sis_rm_category.id','=','sis_raw_materials.rm_category')
            ->join('sis_stock_outward','sis_raw_materials.rm_id','=','sis_stock_outward.rm_id')
            ->select('sis_rm_category.*', 'sis_raw_materials.*','sis_stock_outward.qty_out')
            ->get();
            //print_r($q_out);


            if($user_id!=null)
            {
            return view('inventory2', ['list' => $list, 'q_in'=>$q_in, 'q_out'=>$q_out]);
            }
            else{
               return view('login');
            }
         }

         public function stock_outward(Request $request5)
         {
            

            $user_id= Session::get('id');
            $data=$request5->input('id');
            //echo $stock;
            //print_r($data);
            $list = DB::table('sis_rm_category')->get();

            $query_in = DB::table('sis_raw_materials')
            ->join('sis_stock_inward','sis_raw_materials.rm_id','=','sis_stock_inward.rm_id')
            ->select('sis_raw_materials.*','sis_stock_inward.qty_in')
            ->where('sis_raw_materials.rm_category',$data)
            ->get();
            $query_out = DB::table('sis_raw_materials')
            ->join('sis_stock_outward','sis_raw_materials.rm_id','=','sis_stock_outward.rm_id')
            ->select('sis_raw_materials.*','sis_stock_outward.qty_out')
            ->where('sis_raw_materials.rm_category',$data)
            ->get();

           
            //print_r($query_in);
           // print_r($query_out);

           if($user_id!=null)
            {
            return view('stock_outward2', ['list' => $list, 'data'=>$data, 'query_in'=>$query_in, 'query_out'=>$query_out]);
            }
            else{
               return view('login');
            }
         }

         public function update_stock_outward(Request $request6)
         {

            $user_id= Session::get('id');
            $i=$request6->input('i');
            $date=$request6->input('date');
            $data=$request6->input('data');
            $qty=$request6->input('qty');
            //echo $i;
            //echo $date;
            $rm_id= preg_split("/[,]/",$data);
           // print_r($rm_id);
            $con= preg_split("/[,]/",$qty);
           // print_r($con);
            
            for($j=0;$j<=$i;$j++)
            {
               DB::table('sis_stock_outward')->insert(
                  ['rm_id' => $rm_id[$j],'date'=>$date, 'qty_out' => $con[$j]]
              );
            }
            if($user_id!=null)
            {
            return redirect('/inventory');
            }
            else{
               return view('login');
            }
            
         }
         public function stock()
         {
            $user_id= Session::get('id');
            $list = DB::table('sis_suppliers')->get(); 
            if($user_id!=null)
            {
            return view('stock2',['list'=>$list]);
            }
            else{
               return view('login');
            } 
         }
         public function stock_inward(Request $request7)
         {

            $user_id= Session::get('id');
            $supplier_id=$request7->input('id');
            $po_num=$request7->input('po_num');
            $po_cost=$request7->input('po_cost');
            $date=$request7->input('date');

            $id=DB::table('sis_po_header')->count();
               $po_header=DB::table('sis_po_header')
               ->where([['supplier_id', '=', $supplier_id],['PO', '=', $po_num],['date', '=', $date]])
               ->get();

               if($po_header->isEmpty())
               {
                  DB::table('sis_po_header')->insert(
                     ['date' => $date,'PO'=>$po_num,'supplier_id' => $supplier_id, 'po_cost'=> $po_cost,'payment_mode'=>"NOT",'payment_status'=>0,'status'=>0]
                 );
                 $po_header=DB::table('sis_po_header')
                  ->where([['supplier_id', '=', $supplier_id],['PO', '=', $po_num],['date', '=', $date]])
                  ->get();
               }
               $po_lines=DB::table('sis_stock_inward')
                  ->join('sis_raw_materials','sis_stock_inward.rm_id','=','sis_raw_materials.rm_id')
                  ->select('sis_stock_inward.*','sis_raw_materials.*')
                  ->where([['supplier_id', '=', $supplier_id],['PO', '=', $po_num],['date', '=', $date]])
                  ->get();

                  $supplier_materials = DB::table('sis_material_suppliers')
                  ->join('sis_raw_materials','sis_material_suppliers.rm_id','=','sis_raw_materials.rm_id')
                  ->select('sis_material_suppliers.*','sis_raw_materials.*')
                  ->where('sis_material_suppliers.supplier_id',$supplier_id)
                  ->get();
                  //print_r($supplier_materials);
            
            $list = DB::table('sis_suppliers')->get();

            $unit_of_measure=DB::table('sis_unit_of_measure')->get();
            

            if($user_id!=null)
            {
            return view('stock_inward',['list'=>$list, 'po_header'=>$po_header, 'po_lines'=>$po_lines, 'supplier_materials'=>$supplier_materials, 'unit_of_measure'=>$unit_of_measure]);
            }
            else{
               return view('login');
            }
         }
         public function update_inward(Request $request11)
         {
            $user_id= Session::get('id');
            $data = array();

            $data['1'] = $request11->supplier_id;
            $data['2'] = $request11->PO;
            $data['3'] = $request11->date;
            $data['4'] = $request11->supplier_material;
            $data['5'] = $request11->unit_of_measure;
            $data['6'] = $request11->qty;
            $data['7'] = $request11->cost;
            $data['8'] = $request11->exp_date;
            
            DB::table('sis_stock_inward')->insert(
               ['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1'], 'rm_id'=> $data['4'],'qty_in'=>$data['6'],'unit_of_measure'=>$data['5'],'cost'=>$data['7'],'expiry_date'=>$data['8']]
           );
           DB::table('sis_po_header')
               ->where(['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1']])
               ->update(['status'=>1]);

               if($user_id!=null)
            {
           return redirect()->back();
            }
            else{
               return view('login');
            }
           
         }
         public function delete_inward(Request $request12)
         {
            $user_id= Session::get('id');
            $id=$request12->id;
            $data = array();

            $data['1'] = $request12->supplier_id;
            $data['2'] = $request12->PO;
            $data['3'] = $request12->date;
            DB::table('sis_stock_inward')->where('id', $id)->delete();

            $count=DB::table('sis_stock_inward')->where(['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1']])->count();
            
            if($count==0)
            {
               DB::table('sis_po_header')
               ->where(['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1']])
               ->update(['status'=>0]);
            }

            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         
         //end of inventory functions

         //payment functions
         public function payments(Request $request8)
         {
            $user_id= Session::get('id');
            $data=$request8->input('id');
            $start_date=$request8->input('start_date');
            $end_date=$request8->input('end_date');
            $status=$request8->input('status');
            print_r($status);
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');

            if($start_date ==$dt && $end_date==$dt)
            {
               if($status=='')
               {
                  $po = DB::table('sis_po_header')
                  ->where('supplier_id',$data)
                  ->get();
               }
               else
               {
                  $po = DB::table('sis_po_header')
                  ->where('supplier_id',$data)
                  ->where('payment_status',$status)
                  ->get();
               }
            }
           else
           {
            if($status=='')
            {
            $po = DB::table('sis_po_header')
            ->where('supplier_id',$data)
            
            ->whereBetween('date', [$start_date, $end_date])
            ->get();
            }
            else
            {
            $po = DB::table('sis_po_header')
            ->where('supplier_id',$data)
            ->where('payment_status',$status)
            ->whereBetween('date', [$start_date, $end_date])
            ->get();
            }
           }
           $list = DB::table('sis_suppliers')->get();
            if($start_date =='' && $end_date=='')
            {
               $start_date=$dt;
               $end_date=$dt;
            }
            
            if($user_id!=null)
            {
            return view('payments2',['list'=>$list, 'data'=>$data, 'start_date'=>$start_date, 'end_date'=>$end_date, 'po'=>$po]);
            }
            else{
               return view('login');
            }
         }
         public function add_pay(Request $request9)
         {
            $user_id= Session::get('id');
            $id=$request9->input('id');
            $type=$request9->input('type');
            $ids= preg_split("/[,]/",$id);
            $i = count($ids);
            for($j=0;$j<$i;$j++)
            {
               DB::table('sis_po_header')
               ->where('id',$ids[$j])
               ->update(['payment_mode' => $type,'payment_status'=>1]

              );
            }
            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         //end of payment functions
         
         //operations functions
         public function operations()
         {
            $user_id= Session::get('id');

            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');

            $open=DB::table('sis_opening_balence')->where(['Date'=>$dt])->get();
            $close=DB::table('sis_closing_balence')->where(['Date'=>$dt])->get();
            $sale=DB::table('sis_sales_transaction')->where(['Date'=>$dt])->get();
            $billing=DB::table('sis_billing_transaction')->where(['Date'=>$dt])->get();
            $actual=DB::table('sis_actual_transaction')->where(['Date'=>$dt])->get();
            $expences=DB::table('sis_po_header')->where(['Date'=>$dt,'payment_mode'=>'Cash','payment_status'=>1])->get();
            $suppliers=DB::table('sis_suppliers')->get();

            if($user_id!=null)
            {
            return view('operations2',['open'=>$open,'suppliers'=>$suppliers,'close'=>$close,'sale'=>$sale,'billing'=>$billing,'actual'=>$actual,'date'=>$dt,'expences'=>$expences]);
            }
            else {
               return view('login');
            }
         }
         public function operations_open(Request $request)
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');
            echo $dt;
            $data=$request->data;
           // print_r($data);
            $amt= preg_split("/[,]/",$data);
            print_r($amt);

            $open=DB::table('sis_opening_balence')->where(['Date'=>$dt])->count();
            if($open==1)
            {
            DB::table('sis_opening_balence')
            ->where(['Date'=>$dt])
            ->update(['two_thousand'=>$amt[0],'five_hundred'=>$amt[1],'two_hundred'=>$amt[2],'hundred'=>$amt[3],'fifty'=>$amt[4],'twenty'=>$amt[5],'ten'=>$amt[6],'tenc'=>$amt[7],'five'=>$amt[8],'two'=>$amt[9],'one'=>$amt[10],'open_total'=>$amt[11]]
            );
            }
            else
            {
            DB::table('sis_opening_balence')
            ->insert(['Date'=>$dt,'two_thousand'=>$amt[0],'five_hundred'=>$amt[1],'two_hundred'=>$amt[2],'hundred'=>$amt[3],'fifty'=>$amt[4],'twenty'=>$amt[5],'ten'=>$amt[6],'tenc'=>$amt[7],'five'=>$amt[8],'two'=>$amt[9],'one'=>$amt[10],'open_total'=>$amt[11],'status'=>0]
            );
            }
            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function operations_close(Request $request)
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');
            echo $dt;
            $data=$request->data;
           // print_r($data);
            $amt= preg_split("/[,]/",$data);
            print_r($amt);

            $close=DB::table('sis_closing_balence')->where(['Date'=>$dt])->count();
            if($close==1)
            {
            DB::table('sis_closing_balence')
            ->where(['Date'=>$dt])
            ->update(['two_thousand'=>$amt[0],'five_hundred'=>$amt[1],'two_hundred'=>$amt[2],'hundred'=>$amt[3],'fifty'=>$amt[4],'twenty'=>$amt[5],'ten'=>$amt[6],'tenc'=>$amt[7],'five'=>$amt[8],'two'=>$amt[9],'one'=>$amt[10],'close_total'=>$amt[11]]
            );
            }
            else
            {
            DB::table('sis_closing_balence')
            ->insert(['Date'=>$dt,'two_thousand'=>$amt[0],'five_hundred'=>$amt[1],'two_hundred'=>$amt[2],'hundred'=>$amt[3],'fifty'=>$amt[4],'twenty'=>$amt[5],'ten'=>$amt[6],'tenc'=>$amt[7],'five'=>$amt[8],'two'=>$amt[9],'one'=>$amt[10],'close_total'=>$amt[11],'status'=>0]
            );
            }
            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function operations_net_sale(Request $request)
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');
            echo $dt;
            $data=$request->data;
           // print_r($data);
            $amt= preg_split("/[,]/",$data);
            print_r($amt);

            $open=DB::table('sis_sales_transaction')->where(['Date'=>$dt])->count();
            if($open==1)
            {
            DB::table('sis_sales_transaction')
            ->where(['Date'=>$dt])
            ->update(['Tokens'=>$amt[0],'Net_sale'=>$amt[1],'GST'=>$amt[2],'Gross_sale'=>$amt[3]]
            );
            }
            else
            {
            DB::table('sis_sales_transaction')
            ->insert(['Date'=>$dt,'Tokens'=>$amt[0],'Net_sale'=>$amt[1],'GST'=>$amt[2],'Gross_sale'=>$amt[3],'status'=>0]
            );
            }
            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function operations_net_billing(Request $request)
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');
            echo $dt;
            $data=$request->data;
           // print_r($data);
            $amt= preg_split("/[,]/",$data);
            print_r($amt);

            $open=DB::table('sis_billing_transaction')->where(['Date'=>$dt])->count();
            if($open==1)
            {
            DB::table('sis_billing_transaction')
            ->where(['Date'=>$dt])
            ->update(['Cash'=>$amt[0],'Paytm'=>$amt[1],'Phonepe'=>$amt[2],'EDC'=>$amt[3],'Net_total'=>$amt[4]]
            );
            }
            else
            {
            DB::table('sis_billing_transaction')
            ->insert(['Date'=>$dt,'Cash'=>$amt[0],'Paytm'=>$amt[1],'Phonepe'=>$amt[2],'EDC'=>$amt[3],'Net_total'=>$amt[4],'status'=>0]
            );
            }
            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function operations_net_actual(Request $request)
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');
            echo $dt;
            $data=$request->data;
           // print_r($data);
            $amt= preg_split("/[,]/",$data);
            print_r($amt);

            $open=DB::table('sis_actual_transaction')->where(['Date'=>$dt])->count();
            if($open==1)
            {
            DB::table('sis_actual_transaction')
            ->where(['Date'=>$dt])
            ->update(['paytm'=>$amt[0],'phonepe'=>$amt[1],'EDC'=>$amt[2],'Net_total'=>$amt[3]]
            );
            }
            else
            {
            DB::table('sis_actual_transaction')
            ->insert(['Date'=>$dt,'paytm'=>$amt[0],'phonepe'=>$amt[1],'EDC'=>$amt[2],'Net_total'=>$amt[3],'status'=>0]
            );
            }
            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function freez_open()
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');

            DB::table('sis_opening_balence')
            ->where(['Date'=>$dt])
            ->update(['status'=>1]
            );

            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function freez_close()
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');

            DB::table('sis_closing_balence')
            ->where(['Date'=>$dt])
            ->update(['status'=>1]
            );

            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function freez_transactions()
         {
            $user_id= Session::get('id');
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');

            DB::table('sis_sales_transaction')
            ->where(['Date'=>$dt])
            ->update(['status'=>1]
            );
            DB::table('sis_billing_transaction')
            ->where(['Date'=>$dt])
            ->update(['status'=>1]
            );
            DB::table('sis_actual_transaction')
            ->where(['Date'=>$dt])
            ->update(['status'=>1]
            );

            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         public function expences()
         {
            $user_id= Session::get('id');
            $list = DB::table('sis_suppliers')->get(); 
			$mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');
            if($user_id!=null)
            {
            return view('expences',['list'=>$list,'date'=>$dt]);
            }
            else{
               return view('login');
            } 
         }
public function expences_in(Request $request7)
         {

            $user_id= Session::get('id');
            $supplier_id=$request7->input('id');
            $po_num=$request7->input('po_num');
            $po_cost=$request7->input('po_cost');
            $date=$request7->input('date');

            $id=DB::table('sis_po_header')->count();
               $po_header=DB::table('sis_po_header')
               ->where([['supplier_id', '=', $supplier_id],['PO', '=', $po_num],['date', '=', $date]])
               ->get();

               if($po_header->isEmpty())
               {
                  DB::table('sis_po_header')->insert(
                     ['date' => $date,'PO'=>$po_num,'supplier_id' => $supplier_id, 'po_cost'=> $po_cost,'payment_mode'=>"NOT",'payment_status'=>0,'status'=>0]
                 );
                 $po_header=DB::table('sis_po_header')
                  ->where([['supplier_id', '=', $supplier_id],['PO', '=', $po_num],['date', '=', $date]])
                  ->get();
               }
               $po_lines=DB::table('sis_stock_inward')
                  ->join('sis_raw_materials','sis_stock_inward.rm_id','=','sis_raw_materials.rm_id')
                  ->select('sis_stock_inward.*','sis_raw_materials.*')
                  ->where([['supplier_id', '=', $supplier_id],['PO', '=', $po_num],['date', '=', $date]])
                  ->get();

                  $supplier_materials = DB::table('sis_material_suppliers')
                  ->join('sis_raw_materials','sis_material_suppliers.rm_id','=','sis_raw_materials.rm_id')
                  ->select('sis_material_suppliers.*','sis_raw_materials.*')
                  ->where('sis_material_suppliers.supplier_id',$supplier_id)
                  ->get();
                  //print_r($supplier_materials);
            
            $list = DB::table('sis_suppliers')->get();

            $unit_of_measure=DB::table('sis_unit_of_measure')->get();
            

            if($user_id!=null)
            {
            return view('expences_in',['list'=>$list, 'po_header'=>$po_header, 'po_lines'=>$po_lines, 'supplier_materials'=>$supplier_materials, 'unit_of_measure'=>$unit_of_measure]);
            }
            else{
               return view('login');
            }
         }
         public function update_expences(Request $request11)
         {
            $user_id= Session::get('id');
            $data = array();

            $data['1'] = $request11->supplier_id;
            $data['2'] = $request11->PO;
            $data['3'] = $request11->date;
            $data['4'] = $request11->supplier_material;
            $data['5'] = $request11->unit_of_measure;
            $data['6'] = $request11->qty;
            $data['7'] = $request11->cost;
            $data['8'] = $request11->exp_date;
            
            DB::table('sis_stock_inward')->insert(
               ['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1'], 'rm_id'=> $data['4'],'qty_in'=>$data['6'],'unit_of_measure'=>$data['5'],'cost'=>$data['7'],'expiry_date'=>$data['8']]
           );
           DB::table('sis_po_header')
               ->where(['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1']])
               ->update(['status'=>1,'payment_status'=>1,'payment_mode'=>'Cash']);

               if($user_id!=null)
            {
           return redirect()->back();
            }
            else{
               return view('login');
            }
           
         }
         public function delete_expences(Request $request12)
         {
            $user_id= Session::get('id');
            $id=$request12->id;
            $data = array();

            $data['1'] = $request12->supplier_id;
            $data['2'] = $request12->PO;
            $data['3'] = $request12->date;
            DB::table('sis_stock_inward')->where('id', $id)->delete();

            $count=DB::table('sis_stock_inward')->where(['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1']])->count();
            
            if($count==0)
            {
               DB::table('sis_po_header')
               ->where(['date' => $data['3'],'PO'=>$data['2'],'supplier_id' => $data['1']])
               ->update(['status'=>0]);
            }

            if($user_id!=null)
            {
            return redirect()->back();
            }
            else{
               return view('login');
            }
         }
         //end of operations functions

         //reports functions
         public function reports()
         {
            $user_id= Session::get('id');
            if($user_id!=null)
            {
            return view('reports');
            }
            else{
               return view('login');
            }
         }
         public function reports_suppliers()
         {
            $user_id= Session::get('id');
            $list = DB::table('sis_suppliers')->get();
            if($user_id!=null)
            {
            return view('reports_suppliers',['list'=>$list]);
            }
            else{
               return view('login');
            }
         }
         public function reports_payments(Request $request8)
         {
            $user_id= Session::get('id');
            $data=$request8->input('id');
            $start_date=$request8->input('start_date');
            $end_date=$request8->input('end_date');
            $status=$request8->input('status');
            print_r($status);
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');
         if($data=='')
         {
            if($start_date ==$dt && $end_date==$dt)
            {
               if($status=='')
               {
                  $po = DB::table('sis_po_header')
                  //->where('supplier_id',$data)
                  ->get();
               }
               else
               {
                  $po = DB::table('sis_po_header')
                  //->where('supplier_id',$data)
                  ->where('payment_status',$status)
                  ->get();
               }
            }
           else
           {
            if($status=='')
            {
            $po = DB::table('sis_po_header')
            //->where('supplier_id',$data)
            
            ->whereBetween('date', [$start_date, $end_date])
            ->get();
            }
            else
            {
            $po = DB::table('sis_po_header')
            //->where('supplier_id',$data)
            ->where('payment_status',$status)
            ->whereBetween('date', [$start_date, $end_date])
            ->get();
            }
           }
         }
         else
         {
            if($start_date ==$dt && $end_date==$dt)
            {
               if($status=='')
               {
                  $po = DB::table('sis_po_header')
                  ->where('supplier_id',$data)
                  ->get();
               }
               else
               {
                  $po = DB::table('sis_po_header')
                  ->where('supplier_id',$data)
                  ->where('payment_status',$status)
                  ->get();
               }
            }
           else
           {
               if($status=='')
               {
               $po = DB::table('sis_po_header')
               ->where('supplier_id',$data)
            
               ->whereBetween('date', [$start_date, $end_date])
               ->get();
               }
               else
               {
                $po = DB::table('sis_po_header')
               ->where('supplier_id',$data)
               ->where('payment_status',$status)
                ->whereBetween('date', [$start_date, $end_date])
               ->get();
               }
           }  
         }
           $list = DB::table('sis_suppliers')->get();
            if($start_date =='' && $end_date=='')
            {
               $start_date=$dt;
               $end_date=$dt;
            }
            
            if($user_id!=null)
            {
            return view('reports_payments',['list'=>$list, 'data'=>$data, 'start_date'=>$start_date, 'end_date'=>$end_date, 'po'=>$po]);
            }
            else{
               return view('login');
            }
         }
         
         //end of reports functions


   //billing functions
   public function billing(Request $request)
         {
            $user_id= Session::get('id');

            $id=$request->input('id');

            $category = DB::table('sis_category')->where('item_status','1')->get();
            $mytime = Carbon::now();
            $dt=$mytime->format('Y-m-d');

            if($id!=null)
            {
            $product=DB::table('sis_products')
            ->where('category_id',$id)
            ->get();
            }
            else
            {
            $product=DB::table('sis_products')
            ->where('category_id','CA-013')
            ->get();
            }
            $last = DB::table('sis_billing_header')->latest('id')->first();
            if($last->status==0)
            {
               $bill_num=$last->bill_num;
            }
            else
            {
               DB::table('sis_billing_header')->insert(['bill_num'=>$last->bill_num+1,'date'=>$dt,'bill_cost'=>0,'mode'=>'u','status'=>0]);
               $last = DB::table('sis_billing_header')->latest('id')->first();
               $bill_num=$last->bill_num;
            }

            $itms=DB::table('sis_billing_details')->where(['bill_num'=>$bill_num])->get();
            $products=DB::table('sis_products')->get();
           // print_r($itms);
            if($user_id!=null)
            {
            return view('billing',['category'=>$category,'product'=>$product,'bill_num'=>$bill_num,'itms'=>$itms,'products'=>$products]);
            }
            else{
               return view('login');
            }
         }
   public function billing_item(Request $request)
   {
      $pr_id=$request->input('pr_id');
      $pr_cost=$request->input('pr_cost');
      $bill_num=$request->input('bill_num');

      $search=DB::table('sis_billing_details')->where(['bill_num'=>$bill_num,'pr_id'=>$pr_id])->get();
      if($search->isEmpty())
      {
         DB::table('sis_billing_details')->insert(['bill_num'=>$bill_num,'pr_id'=>$pr_id,'qty'=>1,'cost'=>$pr_cost]);
      }
      else
      {
         //print_r($search);
         $cost=0;
         $qty=0;
         foreach($search as $searc)
         {
            $qty=$searc->qty;
            $cost=$searc->cost;
         }
         
         DB::table('sis_billing_details')->where(['bill_num'=>$bill_num,'pr_id'=>$pr_id])->update(['cost'=>$cost+$pr_cost,'qty'=>$qty+1]);
      }         

      return redirect()->back(); 
   }
   public function billing_delete(Request $request)
   {
      $id=$request->input('id');

      DB::table('sis_billing_details')->where('id', $id)->delete();

      return redirect()->back(); 
   }
   public function billing_delete_item(Request $request)
   {
      $id=$request->input('id');
      $cost=$request->input('cost');
      $qty=$request->input('qty');
      $itm_cost=$request->input('itm_cost');
      if($qty==1)
      {
         DB::table('sis_billing_details')->where('id', $id)->delete();
      }
      else
      {
      DB::table('sis_billing_details')->where('id', $id)->update(['qty'=>$qty-1,'cost'=>$cost-$itm_cost]);
      }
      return redirect()->back(); 
   }
   public function billing_final(Request $request)
   {
      $bill_num=$request->input('bill_num');
      $cost=$request->input('cost');
      $mode=$request->input('mode');

      DB::table('sis_billing_header')->where('bill_num', $bill_num)->update(['bill_cost'=>$cost,'mode'=>$mode,'status'=>1]);
      return redirect()->back();
   }
   //end of billing functions
}