<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ClientAttachement;
use Illuminate\Support\Facades\Storage;

use File;

class ClientController extends Controller
{
    public function ClientView()
    {
        $clients = Client::all() ;
        return view('client.index',compact('clients')) ;
    
    }


    public function ClientCreate()
    {
        return view('client.create') ;
    }


    public function ClientStore(Request $request)
    {

        // **************Partie Client Save 
        $client = new Client();
        $client->client_name = $request->input('client_name');
        $client->email = $request->input('email') ;
        $client->national_id = $request->input('national_id') ;
        $client->save();


        // ******************Partie Attachement 

        
        if ($request->hasFile('pic')) {
            // *******recupère le dernier enregistrement id de Client 
               $client_id = Client::latest()->first()->id;
               
   
               $image = $request->file('pic');
               $file_name = $image->getClientOriginalName(); //le nom de l'image
               $client_name = $request->client_name ;  // le nom du client
   
               $attachments = new ClientAttachement();
   
               $attachments->file_name = $file_name;
               $attachments->client_name = $client_name;            
               $attachments->client_id = $client_id;
   
               
   
               
               $attachments->save();
   
               // ************move pic
               $imageName = $request->pic->getClientOriginalName();
               $request->pic->move(public_path('Attachments/' . $client_name), $imageName);
           
           }else 
   
           {
               // $image = $request->file('pic');
               // $file_name = $image->getClientOriginalName();
               // dd($file_name) ;
           }
   


        return redirect()->route('client.index');
    }



    public function ClientEdit($id)
    {
        $client = Client::findOrFail($id) ; // recupere le client suivant sont id
        $attachements = ClientAttachement::where('client_id',$id)->get() ;// recupere tous les fichier lies à cet id
        return view('client.edit',['client'=>$client , 'attachements'=>$attachements]) ;


      
    }


    public function ClientDelete(Request $request, $id )
    {
        $client = Client::findOrFail($id);
        $client->delete();

        Storage::disk('public_uploads')->deleteDirectory($client->client_name);
        
        

        return redirect()->route('client.index') ;

    }


    public function StoreAddFile(Request $request)
    {
       
        $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',
    
            ], [
                'file_name.mimes' => 'Format doit etre :   pdf, jpeg , png , jpg',
            ]);
        

            $image = $request->file('file_name');
            $client_id = $request->client_id ;
            $file_name = $image->getClientOriginalName();
            $client_name = $request->client_name ;

            $attachments = new ClientAttachement();

            $attachments->file_name = $file_name;
            $attachments->client_name = $client_name;            
            $attachments->client_id = $client_id;

            

            
            $attachments->save();

            // ************move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('Attachments/'. $request->client_name), $imageName);
        
            
            return back();
    

    }

    public function ViewFile($client_name,$file_name)

    {
        // mu must execute this : php artisan storage:link
       
        $files = Storage::disk('public_uploads')->path($client_name.'/'.$file_name);
        return response()->file($files);
        
    }

    public function GetFile($client_name,$file_name)

    {
        $files = Storage::disk('public_uploads')->path($client_name.'/'.$file_name);
        return response()->download( $files );
    }

    public function DeleteFile(Request $request)
    {
        $attachement = ClientAttachement::findOrFail($request->id_file);
        $attachement->delete();
        Storage::disk('public_uploads')->delete($request->client_name.'/'.$request->file_name);
        
        return back();
    }

    
}
