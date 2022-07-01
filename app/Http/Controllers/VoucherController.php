<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voucher;
use Symfony\Contracts\Service\Attribute\Required;
use Session;
class VoucherController extends Controller
{
    //

    public function index(){

        $voucher = voucher::get();

        return view('index',compact('voucher'));
    }

    public function store(request $request){

        $validated = $request->validate([
            'voucher_title' => 'required',
            'start_date' => 'required',
            'expire_date'=> 'required',
            'amount' => 'required',
            'image' => 'required'
        ]);
            

        

        $data=[];

        $data['voucher_title'] = $request->voucher_title;
        $data['start_date'] = $request->start_date;
        $data['expire_date'] = $request->expire_date;
        $data['amount'] = $request->amount;
        $data['description'] = $request->description;
       
        $image = $request->file('image');


        $file_name = $request->voucher_title . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/voucher_image'), $file_name);
        // $image->storeAs('voucher_image', $file_name);
        $data['image'] = $file_name;
       Voucher::create($data);

       return back()->with('message', 'Your success message');
    }

    public function edit($id){

        $vouchers = voucher::where('id',$id)->first();
        
        return view('edit-voucher',compact('vouchers'));

    }

    public function update(request $request){
        

        $validated = $request->validate([
            'voucher_title' => 'required',
            'start_date' => 'required',
            'expire_date'=> 'required',
            'amount' => 'required',
            'image' => 'required'
        ]);
    

        $update = voucher::find($request->id);
        $update->voucher_title = $request->voucher_title;
        $update->start_date  = $request->start_date;
        $update->expire_date =  $request->expire_date;
        $update->amount =  $request->amount;
        

        $update->save();

        if($update){
        return redirect('/voucher/index')->with('message','Voucher update sucessfully');
        }
        else{
            return redirect()->with('error', 'The error message here!');
            
        }
    }


    public function delete($id){

        $voucher= voucher::find($id);

        $voucher->delete();
        

        return back()->with('message','delete sucessfully');
    }

    // public function restore($id){


    //     $voucher = voucher::find($id);
    //     $voucher->restore();

    // }
}
