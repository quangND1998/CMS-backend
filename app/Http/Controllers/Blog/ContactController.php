<?php

namespace App\Http\Controllers\BLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Resources\ContactResource;
use Illuminate\Http\Response;
class ContactController extends Controller
{
    public function XuLyThemMessage(Request $request){
        $input = $request->all();
        $message = new Contact;
        $message->name = $request->input('contact_name');
        $message->email = $request->input('contact_email');
        $message->content = $request->input('contact_message');
 
        $message->save();
        return redirect('/');
     }
     public function getDanhSach(){
         $messages = Contact::latest()->take(20)->get();
         return  ContactResource::collection($messages);
     }
     public function Xoa($id){
        $contact= Contact::find($id);
        if (!$contact) {
            $msg = [
                'msg' => 'Delete the contact failed'
            ];
            return response()->json($msg, Response::HTTP_BAD_REQUEST);
        }

  

   
        $contact->delete();
        return response()->json('Delete Sussessfully', Response::HTTP_OK);
     
     }
}
