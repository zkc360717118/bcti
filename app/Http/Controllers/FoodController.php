<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

use App\Http\Requests;

class FoodController extends Controller
{
    /*
    餐厅添加页面的显示，处理post提交
    */
    public function add(Request $r){
        if(empty($_POST)){
            return view('food.add');
        }else{
            $f = new Food();
            return $f->create($r->all())? redirect('/food'): "添加失败，请询问程序员小二";
        }
    }

    /*
     * 餐厅页面的展示
     */
    public function show(){
        $f = new Food();
        $data = $f->all();
        return view('food.show',['data'=>$data]);
    }

    /*
    餐厅修改和保存
    */
    public function edit(Food $f,Request $r){
        if(empty($_POST)){
            return view('food.edit',['data'=>$f]);
        }else{
            return $f->update($r->all())?redirect('/food') : "更改失败，联系程序猿吧";
        }

    }


}

