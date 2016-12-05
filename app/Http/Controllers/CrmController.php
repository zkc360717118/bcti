<?php

namespace App\Http\Controllers;

use App\Company;
use App\India;
use Illuminate\Http\Request;

use App\Http\Requests;

class CrmController extends Controller
{
    /*
   客户添加页面的显示，处理post提交
   */
    public function add(Request $r){
        if(empty($_POST)){
            return view('company.add');
        }else{
            //company表入库
            $c = new Company();
            $c->cname=$r->cname;
            $c->address=$r->address;
            $c->landline=$r->landline;
            $c->city = $r->city;
            $c->save();

            //获取cid以后，india关系表入库
            $cid = $c->cid;

            for($k=0;$k<count($r->pname);$k++){
                $i = new India();
                $i->cid=$cid;
                $i->pname=$r->input("pname.$k");
                $i->tel1=$r->input("tel1.$k");
                $i->tel2=$r->input("tel2.$k");
                $i->title = $r->input("title.$k");
                $i->note =$r->input("note.$k");
                $i->save();
            }
            return redirect('/company');
        }
    }

    /*
     * 客户信息页面的展示
     */
    public function show(){
        $data = Company::paginate(6);
        return view('company.show',['data'=>$data]);
    }

    /*
     * Author:kevin_zkc@126.com
     * Date:2016-12-05
     * description:
     *          请求： /getcompanycontact/cid     这里cid是公司的主键
     *          如果有联系人返回：[{"id":主键,"cid":所属公司主键,"pname":"联系人名字","tel1":"电话1","tel2":"电话2","title":"职位","note":"备注"},{....},{....}]
     *          如果没有联系人返回：0
     */
    public function contactJson($cid){
        $data = India::where('cid',$cid)->get()->toArray();
       return empty($data)?"0":$data = json_encode($data);
    }


    /*
    餐厅修改和保存
    */
    public function edit(Company $c,Request $r){
        if(empty($_POST)){
            return view('company.edit',['data'=>$c]);
        }else{
            return $c->update($r->all())?redirect('/food') : "更改失败，联系程序猿吧";
        }

    }
}
