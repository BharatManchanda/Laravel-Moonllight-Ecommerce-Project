<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reviewController extends Controller
{
    function index(){
        $result['review']=DB::table('review')
                    ->get();
        return view('admin.review',$result);
    }
    function update_review_status($status, $id){
        DB::table('review')
            ->where('id',$id)
            ->update([
                'review_status'=> $status
            ]);
        return redirect('admin/review');
    }
    function delete_review($id){
        DB::table('review')
            ->where("id",$id)
            ->delete();
            return redirect('admin/review');
    }
}
