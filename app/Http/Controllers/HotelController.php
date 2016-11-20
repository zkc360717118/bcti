<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

use App\Http\Requests;

class HotelController extends Controller
{
    /*
     * 酒店展示页面
     */
    public function show(){

    }

    /*
     * 酒店信息增加
     */
    public function add(Request $r){
        if(empty($_POST)){
            //展示酒店添加页面
            return view('hotel.add');
        }else{
            //接收post ，添加酒店信息
            $h = new Hotel();
            $h->city=$r->city;
            $h->hname=$r->hname;
            $h->star=$r->star;
            $h->tel=$r->tel;
            $h->note=$r->note;
            //1-12月份数据的搜集
            for ($i=0;$i<count($r->jan);$i++){
                $h->jan.=$r->jan[$i].'|';
            }
            $h->jan = rtrim($h->jan,'|');

            for ($i=0;$i<count($r->feb);$i++){
                $h->feb.=$r->feb[$i].'|';
            }
            $h->feb = rtrim($h->feb,'|');

            for ($i=0;$i<count($r->mar);$i++){
                $h->mar.=$r->mar[$i].'|';
            }
            $h->mar = rtrim($h->mar,'|');

            for ($i=0;$i<count($r->apr);$i++){
                $h->apr.=$r->apr[$i].'|';
            }
            $h->apr = rtrim($h->apr,'|');

            for ($i=0;$i<count($r->may);$i++){
                $h->may.=$r->may[$i].'|';
            }
            $h->may = rtrim($h->may,'|');

            for ($i=0;$i<count($r->june);$i++){
                $h->june.=$r->june[$i].'|';
            }
            $h->june = rtrim($h->june,'|');

            for ($i=0;$i<count($r->july);$i++){
                $h->july.=$r->july[$i].'|';
            }
            $h->july = rtrim($h->july,'|');

            for ($i=0;$i<count($r->aug);$i++){
                $h->aug.=$r->aug[$i].'|';
            }
            $h->aug = rtrim($h->aug,'|');

            for ($i=0;$i<count($r->sep);$i++){
                $h->sep.=$r->sep[$i].'|';
            }
            $h->sep = rtrim($h->sep,'|');

            for ($i=0;$i<count($r->oct);$i++){
                $h->oct.=$r->oct[$i].'|';
            }
            $h->oct = rtrim($h->oct,'|');

            for ($i=0;$i<count($r->nov);$i++){
                $h->nov.=$r->nov[$i].'|';
            }
            $h->nov = rtrim($h->nov,'|');

            for ($i=0;$i<count($r->dec);$i++){
                $h->dec.=$r->dec[$i].'|';
            }
            $h->dec = rtrim($h->dec,'|');

            dd($h);
        }

    }

}
