<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\Http\Controllers\model;
use data;
use Illuminate\Support\MessageBag;



class SendquoteController extends Controller
{
 public function quotemessage(){
 
  return view('Sendquote.quotemessage');

  }

    public function store(Request $request){

      // for checking if code works   
            // dd($request-> all());

     //validating data inputted by users.. 
        $this->validate($request, [

               'fname' => 'required',
               'lname' => 'required',
               'pno' => 'required|numeric|min:14',
               'message' => 'required',
               'service' => 'required'
             
             ], [], 
         
          [
              'fname' => 'First Name',
              'lname' => 'Last Name',
              'message' => 'Message',
              'service' => 'service',
              'pno' => 'Phone Number'
              ]);

       // accepting data.................
           $fname = $request-> input('fname');
           $lname = $request-> input('lname');
           $message = $request-> input('message');
           $pno = $request-> input('pno');
           $service = $request-> input('service');

       

          // this line of code should check for duplicates,and return error

          if ($data = DB::table('sendquotes')->exists()){

          return redirect()->back()->with('flash_message', 'You have Supplied Quote already!');  
      
           }
          // this line of code should execute if no duplicate value, and store entry. 
          else{ 
              
           $data= array('fname'=>$fname,
           'lname'=>$lname,
           'message'=>$message,
           'pno'=>$pno,
           'service'=>$service);
           DB::table('sendquotes')->insert($data);
        
           return redirect()->back()->with('flash_message', 'Quote Received'); 
  
                  }

                }
  
            }

