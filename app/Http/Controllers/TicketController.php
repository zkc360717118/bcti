<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

class TicketController extends Controller
{
    /*
     * 添加门票
     */
    public function add(Request $r){
        if(empty($_POST)){
            return view('ticket.add');
        }else{
            $t = new Ticket();
           return $t ->create($r->all())?redirect('/ticket'):"找kevin，也许他已经不在了！！";
        }

    }

    /*
     * 显示门票信息
     */
    public function show(){
        $t = new Ticket();
        $data = $t->all();
        return view('ticket.show',['data'=>$data]);
    }

    /*
    修改门票信息
    */
    public function edit(Ticket $t,Request $r){
        if(empty($_POST)){
            //显示编辑页面
            return view('ticket.edit',['d'=>$t]);
        }else{
            return $t->update($r->all())?redirect('/ticket'):"修改失败，有bug, pls contact Mr.kevin";
        }

    }
}

