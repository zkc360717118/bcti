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
            return view('itinerary.addtext');

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
        return view('itinerary.itinerarypieceshow',['alltour'=>$alltour]);
    }

    /*
     * 单个碎片化行程展示，修改
     */
    public function modifyIti(Itinerary $itid ,Request $req){
        if(empty($_POST)){
            //展示
            return view('itinerary.modifyiti',['p'=>$itid]);
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

    /*
    * Author:kevin_zkc@126.com
    * Date:2016-12-19
    * description:
    *          请求：/getpiece/id     这里id是行程碎片的主键
    *          如果有行程返回：
                                       {
                                        "itid": 1,
                                        "content": "On Arrival, meet local guide and transfer to hotel.",
                                        "code": "daoda",
                                        "uid": 1,
                                        "city": ""
                                        }
    *          如果没有返回：0
    */

    public function pieceAjax(Itinerary $id){
        $data = $id->toArray();
        return empty($data)?'0':json_encode($data);
    }



}
