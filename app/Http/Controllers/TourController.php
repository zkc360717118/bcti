<?php

namespace App\Http\Controllers;

use App\Itinerary;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    /*
    增加行程碎片到数据库
    */
    public function addText(Request $re){
        if(empty($_POST)){
            //显示添加页面
            return view('english.addtext');

        }else{
            //接收post数据，增加行程
            $it = new Itinerary();
            $it->code = $re->code;
            $it->content= $re->contents;
            $it->city = $re->city;

            dd($it->save());
//            dd(new Itinerary($re->all()));
        }
    }

    /*
    行程碎片化的展示
    */
    public function itiPieces(){
        //查出所有碎片行程的信息
        $alltour = DB::table('itinerarys')->get();
        return view('english.itinerarypieceshow',['alltour'=>$alltour]);
    }

    /*
     * 单个碎片化行程展示，修改
     */
    public function modifyIti(Itinerary $itid ,Request $req){
        if(empty($_POST)){
            //展示
            return view('english.modifyiti',['p'=>$itid]);
        }else{
            //修改
//            $it = Itinerary::where('itid',$req->itid)->get();
            $it = Itinerary::find($req->itid);

            $it->content =$req->contents;
            $it->code = $req->code;
            $it->city = $req->city;

            return $it->save() ? redirect('/itipieces') : "更新失败，pls contact Mr.kevin";
        }
    }


}
