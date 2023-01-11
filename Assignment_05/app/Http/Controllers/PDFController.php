<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function generatePDF($id)
    {
        $users = Student::where('id', $id)->with('major')->first();
        $fileName = $users->id.$users->name;
        $data = [
            'title' => 'Student Detail Information',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
        $pdf = PDF::loadView('myPDF', $data);

        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/files/'.$fileName.'.pdf',$content);

        return response()->json(['student' => $users, 'msg' => 'Successfully created new major.'], 200);
    }

    public function testOne($mailAddress)
    {
        if(!$mailAddress){
            return response()->json(['msg' => 'Mail field required.'], 200);
        }
        else{
            $users = Student::where('email', $mailAddress)->with('major')->first();
        if($users){
        $fileName = $users->id.$users->name;
        $data["email"] = $users->email;
        $data["title"] = "From pyaephyoaung31999@gmail.com";
        $data["body"] = "Student Detail Information";
        $files = [
            public_path('storage/files/'.$fileName.'.pdf'),
        ];
            Mail::send('mail', $data, function($message)use($data, $files) {
                $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
    
                foreach ($files as $file){
                    $message->attach($file);
                }
            });
            return response()->json(['file' => $fileName, 'mail' => $mailAddress,'msg' => 'Mail successfully send to student.'], 200);
        }
        else{
            return response()->json(['msg' => 'Mail does not match our recoed. Try again.'], 200);
        }
        }
    }
}

