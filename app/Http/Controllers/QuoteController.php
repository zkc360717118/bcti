<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Quotehotel;
use App\Quoteiti;
use App\Quoteitisolo;
use App\Quotepart;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;

class QuoteController extends Controller
{
    /*
     * 报价行程制作1，并保存。
     */
    public function maketour(Request $r){
        if(empty($_POST)){
        return view('quote.maketour');
//            return view('quote.test');
        }else{
                //首先保存总表quote
            $q= new Quote();
            $q->adult=$r->adult;
            $q->children = $r->children;
            $q->save();
            $qid =$q->pid;
               // 保存行程表
            for($i=0;$i<count($r->date);$i++){
                    $im = new Quoteiti();
                    $im->location=$r->input("address.$i");
                    $im->meal = $r->input("meal.$i");
                    $im->iti = $r->input("iti.$i");
//                    $im->date = $r->input("date.$i");
                    $im->pid = $qid;

                    $im->save();
            }
                //保存报价酒店信息
               for($k=0;$k<count($r->location);$k++){
                   $q =new Quotehotel();
                   $q->location = $r->location[$k];
                   $q->qid= $qid;
                   $q->hotel1=$r->hotel1[$k];
                   $q->hotel2=$r->hotel2[$k];
                   if (!empty($r->hotel1[0])&&!empty($r->hotel3[$k])){
                       $q->hotel3=$r->hotel3[$k];
                   }
                   $q->save();
               }
            //把人数，地点，放在cookie
            return redirect("/calculate/$qid")
                ->withCookie(cookie('adult',$r->adult))
                ->withCookie(cookie('children',$r->children))
                ->withCookie(cookie('location',$r->location));
        }

    }

    /*
     * 客户行程已经有了，直接处理，然后跳转到下面calculate方法去计算
     *
     */
	public function maketourHaveIti(Request $r){
		if(empty($_POST)){
			return view('quote.maketourhaveiti');
		}else{
			//首先保存总表quote
			$q= new Quote();
			$q->adult=$r->adult;
			$q->children = $r->children;
			$q->save();
			$qid =$q->pid;

			// 保存行程表

				$im = new Quoteitisolo();
				$im->content=str_replace("\r\n",'&&&',$_POST['content']);
				$im->qid = $qid;
				$im->save();

			//保存报价酒店信息
			for($k=0;$k<count($r->location);$k++){
				$q =new Quotehotel();
				$q->location = $r->location[$k];
				$q->qid= $qid;
				$q->hotel1=$r->hotel1[$k];
				$q->hotel2=$r->hotel2[$k];
				if (!empty($r->hotel1[0])&&!empty($r->hotel3[$k])){
					$q->hotel3=$r->hotel3[$k];
				}
				 $q->save();
			}
//			die;
			//把人数，地点，放在cookie
			return redirect("/calculate/$qid")
				->withCookie(cookie('adult',$r->adult))
				->withCookie(cookie('children',$r->children))
				->withCookie(cookie('location',$r->location));
		}
	}

    /*
     * 报价输入页面
     */
    public function calculate(Quote $qid,Request $r){

        //利用calculate（）括号里面的依赖注入，加上eloquent orm关系查到2个方向的一对多关系（1，对应的酒店 2，对应的行程）
        $a = $qid->load('hotel')->load('iti2')->load('iti')->toArray();
		if(!isset($a['iti'][0])){
			$a['iti2']=explode('&&&',$a['iti2'][0]['content']);
		}
//        dd($a['iti2'][0]['content']);
        $a['adult']=$r->cookie('adult');//团队大人数量
        $a['children']=$r->cookie('children');//小孩数量
        $a['foc']=floor(($a['adult']+$a['children'])/16);//foc数量
        $a['location']=$r->cookie('location');//各个城市
        $cn=count($a['hotel']);
        $x= $a['hotel'];

        switch ($cn){
        	case 1;
				$a['hotel']= array_merge_recursive($x[0]);
				break;
            case 2;
                $a['hotel']= array_merge_recursive($x[0],$x[1]);
                break;
            case 3;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2]);
                break;
            case 4;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3]);
                break;
            case 5;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3],$x[4]);
                break;
            case 6;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3],$x[4],$x[5]);
                break;
            case 7;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3],$x[4],$x[5],$x[6]);
                break;
            case 8;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3],$x[4],$x[5],$x[6],$x[7]);
                break;
            case 9;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3],$x[4],$x[5],$x[6],$x[7],$x[8]);
                break;
            case 10;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3],$x[4],$x[5],$x[6],$x[7],$x[8],$x[9]);
                break;
            case 11;
                $a['hotel']= array_merge_recursive($x[0],$x[1],$x[2],$x[3],$x[4],$x[5],$x[6],$x[7],$x[8],$x[9],$x[10]);
                break;
        }
//		dd($a);
        return view('quote.calculation',['data'=>$a]);
    }

    /*
     * 接收报价页面,主要是jquery 前端提交过来
     */
    public function storeQuote(Request $r ){
        //把各个区域的分报价保存起来
        for ($i=0; $i<count($r->hotel);$i++){
        	if($r->hotel[$i]!=''){
				$q = new Quotepart();
				$q->content=$r->hotel[$i];
				$q->city=$r->city;
				$q->pid=$r->pid;
				$q->save();
			}

        }
    }
    /*
     * ajax更新报价总库
     * @para
     */
    public function storeFinalQuote($pid,Request $re){
        $r = Quote::find($pid);
        $r->quotation = trim($r->quotation,',').','.$re->price;
        $r->update();
    }

    /*
     * 生成报价word文档，利用phpword
     */
    public function word(Quote $qid){
		//第一步 查出所有报价信息,引入对应的模板
		$a = $qid->load('hotel')->load('iti')->load('iti2')->load('quotepart')->toArray();
		if(isset($a['iti'][0])){
			$bcti =new TemplateProcessor(base_path().'/quote_tep1.docx');
		}else{
			$bcti =new TemplateProcessor(base_path().'/quote_tep2.docx');
		}


		//第二步 赋值行程
		if(isset($a['iti'][0])){
			$iticount = count($a['iti']); //行程的天数
			$bcti->cloneRow('day',$iticount);

			foreach ($a['iti'] as $k=>$v){
				$daynum = $k+1;
				$bcti->setValue('day#'.$daynum,'Day'.$daynum);
				$bcti->setValue('city#'.$daynum,$v['location']);
				$bcti->setValue('meal#'.$daynum,$v['meal']);
				$bcti->setValue('body#'.$daynum,$v['iti']);
				$bcti->setValue('time#'.$daynum,'20151101');

			}
		}else{
			$a['iti2']=array_filter(explode('&&&',$a['iti2'][0]['content']));
			$iticount = count($a['iti2']); //行程的天数
//			dd($a['iti2']);
			$bcti->cloneRow('content',$iticount);
			foreach ($a['iti2'] as $k=>$v){
				$daynum = $k+1;
				$bcti->setValue('content#'.$daynum,$v);

			}
		}


        //第三步 赋值大人和小孩数量
        $bcti->setValue('adult',$a['adult']);
        $bcti->setValue('children',$a['children']);
        //第四步 赋值报价酒店部分
		$bcti->setValue('ss',111);
        $hnum = count($a['hotel']);
//        dd($a);
        $hotelprocess1=[];
        for ($i=0; $i<$hnum; $i++){
            $hotelprocess1[$i]['hotel1']=$a['hotel'][$i]['location'].":".$a['hotel'][$i]['hotel1']."or similar";
            if($a['hotel'][$i]['hotel2']){//如果没有酒店2就不处理
                $hotelprocess1[$i]['hotel2']=$a['hotel'][$i]['location'].":".$a['hotel'][$i]['hotel2']."or similar";
            }
            if($a['hotel'][$i]['hotel3']){//如果没有酒店3就不处理
                $hotelprocess1[$i]['hotel3']=$a['hotel'][$i]['location'].":".$a['hotel'][$i]['hotel3']."or similar";
            }
        }


        $hotelprocess2=[];
        foreach($hotelprocess1 as $k=>$v){
            $hotelprocess2['hotel1'][]=$hotelprocess1[$k]['hotel1'];
            if($hotelprocess1[$k]['hotel2']){
                $hotelprocess2['hotel2'][]=$hotelprocess1[$k]['hotel2'];
            }
            if(isset($hotelprocess1[$k]['hotel3'])){
                $hotelprocess2['hotel3'][]=$hotelprocess1[$k]['hotel3'];
            }
        }

        $hotelprocess3=[];
        foreach ($hotelprocess2 as $k=>$v){
            $hotelprocess3[]=implode("<w:br />",$v);
        }


        $hcount = count($hotelprocess3); //报价个数

        $bcti->cloneRow('hotel',$hcount);
        foreach ($hotelprocess3 as $k=>$v){
            $hotelnum = $k+1;
            $bcti->setValue('hotel#'.$hotelnum,$v);
        }

        //第五步 赋值报价
        $finalprices = explode(',',trim($a['quotation'],','));
        foreach ($finalprices as $k=>$v){
            $qnum = $k+1;
            $bcti->setValue('quotation#'.$qnum,$v);
        }

        //第六步 赋值晚餐 和午餐数量
            $meal = '';
        foreach($a['iti'] as $v){
            $meal.=$v['meal'];
        }
		$dinnernum = substr_count($meal,'d')+substr_count($meal,'D');
		$lunchnum = substr_count($meal,'l')+substr_count($meal,'L');
        $bcti->setValue('dinner',$dinnernum);
        $bcti->setValue('lunch',$lunchnum);

        //生成的文档为Word
		date_default_timezone_set('Asia/Shanghai');
		$currentTime = date('Y_m_d_H_i_s',time());
		$name = Auth::user()->email;
		$path = $currentTime.'_'.$name.'kevin.docx';
        $bcti->saveAs($path);

        return view('quote.download',['path'=>$path]);

    }

}
