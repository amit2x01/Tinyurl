<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tinyurl;
use App\Models\visitor;
use Str;
class TinyUrlGenerator extends Controller
{
    function import(Request $Request){
        $Request->validate([
            "csv_file" => "max:10240|required|mimes:csv,xlsx,txt",
        ]);

        $file = $Request->csv_file;
        $file_name = date('Y_M_D_').sha1(md5(sha1("upload_image".date('YYMMDDYYHhhhiiss').mt_rand(59999,99999)))).$file->getClientOriginalName();
        $upload_path = 'documents/';
        $file->move($upload_path, $file_name);
        
            
   
        
        $csvURLlist = array_map('str_getcsv', file(public_path($upload_path.$file_name)));
        $csvURLlist = array_filter($csvURLlist);
        unset($csvURLlist[0]);

        $urls = [];
        foreach($csvURLlist as $csv_url){
            if(!empty($csv_url[0])){
                $urls[] = ["url" => $csv_url[0], "shorturl" => Str::random(10)];
            }  
        }
     
        tinyurl::insert($urls);

        unlink(public_path($upload_path.$file_name));

        return redirect('/ap/dashboard');
    }

    function addNewUrl(Request $Request){
        $Request->validate([
            "url" => "required",
        ]);

        tinyurl::insert([
            "url" => $Request->url,
            "shorturl" => Str::random(10),
        ]);
        return redirect('/ap/dashboard');
    }


    function DeleteUrl(Request $Request){
        $Request->validate([
            'url_id'       =>  'required',
        ]);

        tinyurl::where('id' , $Request->url_id)->delete();
        return redirect('/ap/dashboard');
    }




    function redirectUrl(Request $request, $shortUrl){
        $getUrl = tinyurl::where('shorturl',$shortUrl)->get()->toarray();

        if(count($getUrl) > 0){

            $validate = visitor::where([
                'ip'=>$request->ip(),
                "visited_link_id" => $getUrl[0]['id'],
            ])->get();

            if(count($validate) <= 0){
                visitor::insert([
                    'ip'=>$request->ip(),
                    "visited_link_id" => $getUrl[0]['id'],
                ]);
            }

            
            return redirect($getUrl[0]['url']);
        }else{
            echo "Link is Expired";
        }
    }
}
