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
        $h = new Hotel();
        $a = $h->all();

        return view('hotel.show',['allhotel'=>$a]);
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
            $m = ['jan','feb','mar','apr','may','june','july','aug','sep','oct','nov','dec'];
                for ($k=0;$k<count($m);$k++) {
                    //先把每月2-4个价格搜集起来 成为“180|200” 或者 “180|200|300|400”
                    for ($i=0;$i<count($r->input($m[$k]));$i++){
                        $h->$m[$k].=$r->input("$m[$k].$i").'|';
                    }
                    //如果是4个价格，则从中间把|替换成换行符并去掉最后一个|, 否则就只是把最后一个|去掉
                    if(substr_count($h->$m[$k],'|')==4){
                        $p='/^(\d+\|\d+)\|(\d+\|\d+)\|$/';
                        $h->$m[$k]=preg_replace($p,'\1'."<br>".'\2',$h->$m[$k]);
                    }else{
                        $h->$m[$k]=rtrim($h->$m[$k],'|');
                    }
                }
            return $h->save() ? redirect('/hotel'):'更新失败，联系kevin';
        }

    }

    /*
    酒店信息的更改
    */
    public function edit($h,Request $r){
        if(empty($_POST)){
            //显示当前酒店的信息
            $hotel=Hotel::find($h);
            $m = ['jan','feb','mar','apr','may','june','july','aug','sep','oct','nov','dec'];
            for ($i=0; $i < count($m) ; $i++) {

                $pattern = '/^(\d{3,4})\|(\d{3,5})(<br>)(\d{3,4})\|(\d{3,5})$/';//针对4个价格的正则
                $p='/\|/'; //针对2个价格的正则
                $replacement = '$1,$2,$4,$5';//把4个价格的| 换成逗号
                $coma=',';//把2个价格的中间换成逗号

                if(strlen($hotel->$m[$i])>9){
                    $md = preg_replace($pattern, $replacement,$hotel->$m[$i]);
                    $data[$m[$i]] = explode(',',$md);
                }else{
                    $md = preg_replace($p, $coma,$hotel->$m[$i] );
                }
                $hotel->$m[$i]= explode(',',$md);
            }

            return view('hotel.edit',['data'=>$hotel]);
        }else{
            //更新酒店信息
            //接收post ，添加酒店信息
            $hotel= Hotel::find($h);
            $hotel->city=$r->city;
            $hotel->hname=$r->hname;
            $hotel->star=$r->star;
            $hotel->tel=$r->tel;
            $hotel->note=$r->note;

            //1-12月份数据的搜集
            $m = ['jan','feb','mar','apr','may','june','july','aug','sep','oct','nov','dec'];
            for ($k=0;$k<count($m);$k++) {
                //先把每月2-4个价格搜集起来 成为“180|200” 或者 “180|200|300|400”
                $hotel->$m[$k]=$r->input("$m[$k].0").'|';

                for ($i=1;$i<count($r->input($m[$k]));$i++){
                    $hotel->$m[$k].=$r->input("$m[$k].$i").'|';
                }
                //如果是4个价格，则从中间把|替换成换行符并去掉最后一个|, 否则就只是把最后一个|去掉
                if(substr_count($hotel->$m[$k],'|')==4){
                    $p='/^(\d+\|\d+)\|(\d+\|\d+)\|$/';
                    $hotel->$m[$k]=preg_replace($p,'\1'."<br>".'\2',$hotel->$m[$k]);
                }else{
                    $hotel->$m[$k]=rtrim($hotel->$m[$k],'|');
                }
            }

            return $hotel->save() ? redirect('/hotel'):'更新失败，联系kevin';
        }


    }

    /*
   * Author:kevin_zkc@126.com
   * Date:2016-12-19
   * description:
   *          请求：/gethotel/id     这里id是行程碎片的主键
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
//    public function hotelAjax(Hotel $id){
//        $data = $id->toArray();
//        return empty($data)?'0':json_encode($data);
//    }

}
