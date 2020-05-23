<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


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
               'pno' => 'required',
               'message' => 'required',
               'service' => 'required'
             
            ]);  

       // accepting data.................
           $fname = $request-> input('fname');
           $lname = $request-> input('lname');
           $message = $request-> input('message');
           $pno = $request-> input('pno');
           $service = $request-> input('service');

                                     

        // if(model::where($data)){

           //   return back()->with('errors', 'Request already exists');
           // }
             
             //  else{  

        
        $data= array('fname'=>$fname,
                   'lname'=>$lname,
                   'message'=>$message,
                    'pno'=>$pno,
                    'service'=>$service);

        DB::table('sendquotes')->insert($data);
          
       return redirect()->back()->with('flash_message', 'Quote Received'); 
        
       }
       

}
