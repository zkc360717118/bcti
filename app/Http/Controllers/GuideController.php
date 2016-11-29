<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;

use App\Http\Requests;

class GuideController extends Controller
{
    /*
     * 添加导游
     */
    public function add(Request $r){
        if(empty($_POST)){
            return view('guide.add');
        }else{
            $t = new Guide();
            return $t ->create($r->all())?redirect('/guide'):"找kevin，也许他已经不在了！！";
        }

    }

    /*
     * 显示门票信息
     */
    public function show(){
        $t = new Guide();
        $data = $t->all();
        return view('guide.show',['data'=>$data]);
    }

    /*
    修改门票信息
    */
    public function edit(Guide $g,Request $r){
        if(empty($_POST)){
            //显示编辑页面
            return view('guide.edit',['d'=>$g]);
        }else{
            return $g->update($r->all())?redirect('/guide'):"修改失败，有bug, pls contact Mr.kevin";
        }

    }
}
