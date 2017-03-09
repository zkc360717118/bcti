<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body >
    <label  class="label label-danger">大人数{{$data['adult']}}</label>
    <label  class="label label-danger">小人数{{$data['children']}}</label>
    <div class="left" style="float: left;width:600px;height:1000px; border:1px solid red">
        <table class="table table-striped">
            @if(isset($data['iti'][0]))
                @foreach($data['iti'] as $k=>$i)
                    <tr>
                        <td>day{{$k+1}}</td>
                        <td>{{$i['meal']}}</td>
                        <td>{{$i['location']}}</td>
                    </tr>
                    <tr>
                        <td>{{$i['iti']}}</td>
                    </tr>
                @endforeach
            @elseif(isset($data['iti2']))
                @foreach($data['iti2'] as $k=>$i)
                    <tr>
                        <td>{{$i}}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        @if(count($data['hotel']['hotel1'])===1)
            <div>option1</div>
                <div>{{$data['hotel']['hotel1']}}</div>
            <div>option2</div>
            <div>{{$data['hotel']['hotel2']}}</div>
            @if($data['hotel']['hotel3']!='')
                <div>option3</div>
                <div>{{$data['hotel']['hotel3']}}</div>
            @endif
        @else
                <div>option1</div>
                @foreach($data['hotel']['hotel1'] as $k=>$v)
                    <div>{{$v}}</div>
                @endforeach
                <div>option2</div>
                @foreach($data['hotel']['hotel2'] as $k=>$v)
                    <div>{{$v}}</div>
                @endforeach
                @if($data['hotel']['hotel3']!='')
                    <div>option3</div>
                    @foreach($data['hotel']['hotel3'] as $k=>$v)
                        <div>{{$v}}</div>
                    @endforeach
                @endif
        @endif
    </div>

    <div class="middle" style="float: left;width:400px; border:1px solid yellow">
        <span class="label label-success" id="">FOC人数为:</span>
        <input type="number" id="focReceiver" class="lastStep" value="{{$data['foc']}}">
        <span class="label label-success" id="">汇率为:</span>
        <input type="number" id="rateReceiver" class="lastStep" value="6.9">
        <hr class="mbm">
    @for($i=0;$i<count($data['location']);$i++)
            <label for="" class="label label-info">{{$data['location'][$i]}}</label>
            <div class="process">
                {{--<input type="text" placeholder="zhengfoc" class="hotel1 test">--}}
                <input type="text" placeholder="酒店1" class="hotel1 test">
                <input type="number" class="foc1 test" placeholder="0表示没有foc,1表示有">
                <input type="text" placeholder="酒店2" class="hotel2 test">
                <input type="number" class="foc2 test" placeholder="0表示没有foc,1表示有">
                <input type="text" placeholder="酒店3" class="hotel3 test">
                <input type="number" class="foc3 test" placeholder="0表示没有foc,1表示有">
                <input type="text" placeholder="该城市住几晚" class="nightcount test" value="2">
                <input type="text" placeholder="餐费"  class="meal test">
                <input type="text" placeholder="车费" class="transport test">
                <input type="text" placeholder="门票" class="ticket test">
                <input type="text" placeholder="导游" class="guide test">
                <input type="text" placeholder="火车票" class="train test">

                <input type="text" placeholder="其他" class="other test" >
                <input type="hidden"  class="anchor" value="{{$i}}">
            </div>
        @endfor

        <input type="text" id="adult" value="{{$data['adult']}}">
        <input type="text" id="children" value="{{$data['children']}}">
    </div>

    <div class="right" style="float: left;width:600px; border:2px solid brown">
        @for($i=0;$i<count($data['location']);$i++)
            <label for="" class="label label-info">{{$data['location'][$i]}}</label>
        <form action="/storequote" method="post" class="form-horizontal">
            {{csrf_field()}}
            <input type="hidden" name="city" value="{{$data['location'][$i]}}">
            <input type="hidden" id="pidanchor" name="pid" value="{{$data['pid']}}"><br>
            酒店1：<textarea name="hotel[]" class="receive1" cols="70" rows="2"></textarea><br>
            酒店2：<textarea name="hotel[]" class="receive2" cols="70" rows="2"></textarea><br>
            酒店3：<textarea name="hotel[]" class="receive3" cols="70" rows="2"></textarea><br>
            <input type="text" class="store1">
            <input type="text" class="store2">
            <input type="text" class="store3">
        </form>

        @endfor
        {{csrf_field()}}
            总报价1：<input type="text" id="finalquote1">
            总报价2：<input type="text" id="finalquote2">
            总报价3：<input type="text" id="finalquote3">
            <button type="button" class="btn btn-lg" id="calculatebutton">提交</button>
    </div>

</body>
<script>
    $(document).ready(function(){
    });
    /*
     封装一个方法判断是否为空和null
     */
    function isNull(data){
        return (data == "" || data == undefined || data == null) ? data=0 : data;
    }

    /*
    *计算表单输入事件
    */
    $('.test').bind('blur',function(){
        //获取报价人数
        var num = eval($('#adult').val()+"+"+$('#children').val());

        //获取对应input框的值
        var parent = (this.parentNode);

        var h1 =$(parent).children(".hotel1").val(); //酒店1
        if(h1==""){h1=0}
		var foc1 =$(parent).children(".foc1").val(); //酒店1 FOC
		if(foc1==""){foc1=0}
        var h2= $(parent).children(".hotel2").val();//酒店2
        if(h2==""){h2=0}
		var foc2 =$(parent).children(".foc2").val(); //酒店2 FOC
		if(foc2==""){foc2=0}
        var h3 = $(parent).children(".hotel3").val();//酒店3
        if(h3==""){h3=0}
		var foc3 =$(parent).children(".foc3").val(); //酒店1 FOC
		if(foc3==""){foc3=0}
        var meal =$(parent).children(".meal").val();//餐
        if(meal==""){meal=0}
        var car=$(parent).children(".transport").val();//交通
        if(car==""){car=0}
        var ticket = $(parent).children(".ticket").val();//票
        if(ticket==""){ticket=0}
        var guide =$(parent).children(".guide").val();//导游
        if(guide==""){guide=0}
        var train = $(parent).children(".train").val();//火车
        if(train==""){train=0}
        var other1 =$(parent).children(".other").val();//其他
        if(other1==""){other1=0}
        var sub ="(" +meal+")+"+"("+car+")/"+num+"+"+ticket+"+"+"("+guide+")/"+num+"+"+train+"+"+other1;

        //获取住几晚
        var nightcount = parseInt($(parent).children(".nightcount").val());

        //获取锚点，确定为后面form表单赋值做准备
        var anchor = $(parent).children('.anchor').val();
        //获取总体foc个数
        var focNum = $('#focReceiver').val();
            if(focNum==''){focNum=0;}
        //酒店1的报价，计算，赋值显示
        if(h1){
            if(foc1==1 && focNum>0){//如果该酒店有FOC，减去多算的酒店foc
				var deductFocCost = Math.round( (h1/2*nightcount*focNum/(num-focNum))*1000)/1000;
				var h1content="("+h1+")*"+nightcount+"/2"+"+"+sub+"-"+deductFocCost;
			}else{//没有foc
				var h1content="("+h1+")*"+nightcount+"/2"+"+"+sub;
            }

			var h1raw=eval(h1content);
            //如果整个行程有foc要求，那么开始计算
            if(focNum>0){
				var focCost = eval(h1raw*focNum/(num-focNum));
				h1raw = eval(focCost+h1raw);
            }

            var h1result = Math.round(h1raw*1000)/1000;
                focCost=Math.round(focCost*1000)/1000;
            $("form").eq(anchor).children('.receive1').val(h1content+"同时： FOC有"+focNum+"个"+focCost+"rmb每人，最后的结果是："+h1result+"元/人");//显示单个地区，第一个酒店选项的报价总和

            //把每个地区第一个酒店等级选项对应的分价 存放在对应form表单的input框里面，方便提交时候触发计算总价
            $("form").eq(anchor).children('.store1').val(h1result);
        }

        //酒店2的报价，计算，赋值显示
        if(h2){
			if(foc2==1 && focNum>0){//如果该酒店有FOC，减去多算的酒店foc
				var deductFocCost = Math.round( (h2/2*nightcount*focNum/(num-focNum))*1000)/1000;
				var h2content="("+h2+")*"+nightcount+"/2"+"+"+sub+"-"+deductFocCost;
			}else{//没有foc
				var h2content="("+h2+")*"+nightcount+"/2"+"+"+sub;
			}

            var h2raw=eval(h2content);
			if(focNum>0){
				var focCost = eval(h2raw*focNum/(num-focNum));
				h2raw = eval(focCost+h2raw);
			}

			var h2result = Math.round(h2raw*1000)/1000;
			focCost=Math.round(focCost*1000)/1000;
			$("form").eq(anchor).children('.receive2').val(h2content+"同时： FOC有"+focNum+"个"+focCost+"rmb每人，最后的结果是："+h2result+"元/人");//显示单个地区，第一个酒店选项的报价总和


            //把每个地区第二个酒店等级选项对应的分价 存放在对应form表单的input框里面，方便提交时候触发计算总价
            $("form").eq(anchor).children('.store2').val(h2result);
        }

        //酒店3的报价，计算，赋值显示
        if(h3){
			if(foc3==1 && focNum>0){//如果该酒店有FOC，减去多算的foc
				var deductFocCost = Math.round( (h3/2*nightcount*focNum/(num-focNum))*1000)/1000;
				var h3content="("+h3+")*"+nightcount+"/2"+"+"+sub+"-"+deductFocCost;
			}else{//没有foc
				var h3content="("+h3+")*"+nightcount+"/2"+"+"+sub;
			}
            var h3raw=eval(h3content);
			if(focNum>0){
				var focCost = eval(h3raw*focNum/(num-focNum));
				h3raw = eval(focCost+h3raw);
			}

			var h3result = Math.round(h3raw*1000)/1000;
			focCost=Math.round(focCost*1000)/1000;
			$("form").eq(anchor).children('.receive3').val(h3content+"同时： FOC有"+focNum+"个"+focCost+"rmb每人，最后的结果是："+h3result+"元/人");//显示单个地区，第一个酒店选项的报价总和


            //把每个地区第一个酒店等级选项对应的分价 存放在对应form表单的input框里面，方便提交时候触发计算总价
            $("form").eq(anchor).children('.store3').val(h3result);
        }


    });

    //单独修改foc以后，重头到尾单独计算一次
    $('.lastStep').bind('blur',function(){
		//获取报价人数
		var num = eval($('#adult').val()+"+"+$('#children').val());

		//获取所有地点
        var allPlace = $('.process');

        //循环每个地点开始计算
        for(var i=0; i<allPlace.length; i++){
        	    //获取每个城市input框的值
			var h1 =$(allPlace).eq(i).children(".hotel1").val(); //酒店1
			if(h1==""){h1=0}
			var foc1 =$(allPlace).eq(i).children(".foc1").val(); //酒店1 FOC
			if(foc1==""){foc1=0}
			var h2= $(allPlace).eq(i).children(".hotel2").val();//酒店2
			if(h2==""){h2=0}
			var foc2 =$(allPlace).eq(i).children(".foc2").val(); //酒店2 FOC
			if(foc2==""){foc2=0}
			var h3 = $(allPlace).eq(i).children(".hotel3").val();//酒店3
			if(h3==""){h3=0}
			var foc3 =$(allPlace).eq(i).children(".foc3").val(); //酒店1 FOC
			if(foc3==""){foc3=0}
			var meal =$(allPlace).eq(i).children(".meal").val();//餐
			if(meal==""){meal=0}
			var car=$(allPlace).eq(i).children(".transport").val();//交通
			if(car==""){car=0}
			var ticket = $(allPlace).eq(i).children(".ticket").val();//票
			if(ticket==""){ticket=0}
			var guide =$(allPlace).eq(i).children(".guide").val();//导游
			if(guide==""){guide=0}
			var train = $(allPlace).eq(i).children(".train").val();//火车
			if(train==""){train=0}
			var other1 =$(allPlace).eq(i).children(".other").val();//其他
			if(other1==""){other1=0}
			var sub ="(" +meal+")+"+"("+car+")/"+num+"+"+ticket+"+"+"("+guide+")/"+num+"+"+train+"+"+other1;

			//获取住几晚
			var nightcount = parseInt($(allPlace).eq(i).children(".nightcount").val());

			//获取锚点，确定为后面form表单赋值做准备
			var anchor = $(allPlace).eq(i).children('.anchor').val();

			//获取总体foc个数
			var focNum = $('#focReceiver').val();
			if(focNum==''){focNum=0;}

			//酒店1的报价，计算，赋值显示
			if(h1){
				if(foc1==1 && focNum>0){//如果该酒店有FOC，减去多算的酒店foc
					var deductFocCost = Math.round( (h1/2*nightcount*focNum/(num-focNum))*1000)/1000;
					var h1content="("+h1+")*"+nightcount+"/2"+"+"+sub+"-"+deductFocCost;
				}else{//没有foc
					var h1content="("+h1+")*"+nightcount+"/2"+"+"+sub;
				}

				var h1raw=eval(h1content);
				//如果整个行程有foc要求，那么开始计算
				if(focNum>0){
					var focCost = eval(h1raw*focNum/(num-focNum));
					h1raw = eval(focCost+h1raw);
				}

				var h1result = Math.round(h1raw*1000)/1000;
				focCost=Math.round(focCost*1000)/1000;
				$("form").eq(anchor).children('.receive1').val(h1content+"同时： FOC有"+focNum+"个"+focCost+"rmb每人，最后的结果是："+h1result+"元/人");//显示单个地区，第一个酒店选项的报价总和

				//把每个地区第一个酒店等级选项对应的分价 存放在对应form表单的input框里面，方便提交时候触发计算总价
				$("form").eq(anchor).children('.store1').val(h1result);
			}

			//酒店2的报价，计算，赋值显示
			if(h2){
				if(foc2==1 && focNum>0){//如果该酒店有FOC，减去多算的酒店foc
					var deductFocCost = Math.round( (h2/2*nightcount*focNum/(num-focNum))*1000)/1000;
					var h2content="("+h2+")*"+nightcount+"/2"+"+"+sub+"-"+deductFocCost;
				}else{//没有foc
					var h2content="("+h2+")*"+nightcount+"/2"+"+"+sub;
				}

				var h2raw=eval(h2content);
				if(focNum>0){
					var focCost = eval(h2raw*focNum/(num-focNum));
					h2raw = eval(focCost+h2raw);
				}

				var h2result = Math.round(h2raw*1000)/1000;
				focCost=Math.round(focCost*1000)/1000;
				$("form").eq(anchor).children('.receive2').val(h2content+"同时： FOC有"+focNum+"个"+focCost+"rmb每人，最后的结果是："+h2result+"元/人");//显示单个地区，第一个酒店选项的报价总和


				//把每个地区第二个酒店等级选项对应的分价 存放在对应form表单的input框里面，方便提交时候触发计算总价
				$("form").eq(anchor).children('.store2').val(h2result);
			}

			//酒店3的报价，计算，赋值显示
			if(h3){
				if(foc3==1 && focNum>0){//如果该酒店有FOC，减去多算的foc
					var deductFocCost = Math.round( (h3/2*nightcount*focNum/(num-focNum))*1000)/1000;
					var h3content="("+h3+")*"+nightcount+"/2"+"+"+sub+"-"+deductFocCost;
				}else{//没有foc
					var h3content="("+h3+")*"+nightcount+"/2"+"+"+sub;
				}
				var h3raw=eval(h3content);
				if(focNum>0){
					var focCost = eval(h3raw*focNum/(num-focNum));
					h3raw = eval(focCost+h3raw);
				}

				var h3result = Math.round(h3raw*1000)/1000;
				focCost=Math.round(focCost*1000)/1000;
				$("form").eq(anchor).children('.receive3').val(h3content+"同时： FOC有"+focNum+"个"+focCost+"rmb每人，最后的结果是："+h3result+"元/人");//显示单个地区，第一个酒店选项的报价总和


				//把每个地区第一个酒店等级选项对应的分价 存放在对应form表单的input框里面，方便提交时候触发计算总价
				$("form").eq(anchor).children('.store3').val(h3result);
			}
		}
    });

    /*
    循环提交form表单
     */
    $('#calculatebutton').bind('click',function(e){
        //先获取表单数量
        var forms = $('form');
        var num = forms.length;
            //循环提交表单
        for(var i=0; i<num; i++){
                 //ajax提交表单
            var options={
                url:'/storequote',
                type:'post',
                dataType:'text',
                data:$('form').eq(i).serialize(),
                success:function(){
                }
            }
            $.ajax(options);
        }

    //获取地区（表单）每个星级酒店报价对应的子报价然后 加成对应的总报价
        var quote1='';
        for(var k=0; k<num; k++){
            quote1=quote1+"+"+$('.store1').eq(k).val();
        }

        var quote2='';
        for(var k=0; k<num; k++){
            quote2=quote2+"+"+$('.store2').eq(k).val();
        }

        var quote3='';
        for(var k=0; k<num; k++){
            quote3=quote3+"+"+$('.store3').eq(k).val();
        }

        var da=new Array();
        if($('.store2').eq(0).val()==''){
            //说明只有1个酒店类型
            $('#finalquote1').val(eval(quote1));
            var deal1 = $('#finalquote1').val();
            da.push(deal1);
        }else if($('.store3').eq(0).val()==''){
            //说明只有2个酒店类型
            $('#finalquote1').val(eval(quote1));
            $('#finalquote2').val(eval(quote2));
            var deal1=$('#finalquote1').val();
            var deal2=$('#finalquote2').val();
            da.push(deal1);
            da.push(deal2);
        }else{
            //说明3个酒店类型都有
            $('#finalquote1').val(eval(quote1));
            $('#finalquote2').val(eval(quote2));
            $('#finalquote3').val(eval(quote3));
            var deal1=$('#finalquote1').val();
            var deal2=$('#finalquote2').val();
            var deal3 =$('#finalquote3').val();

            da.push(deal1);
            da.push(deal2);
            da.push(deal3);
        }

//        console.log(da);

        //把报价用ajax存到数据库
        var pid = $('#pidanchor').val();
        var exRate = $('#rateReceiver').val();
        for(var j=0; j<da.length; j++){

            $.ajax({
                type:'post',
                url:'/finalquote/'+pid,
                data:{'price':da[j],'_token':'{{csrf_token()}}','exRate':exRate},
                async:false,
                success:function(){
                        if(j==eval(da.length-1)){
                            alert('报价计算完成，进入下载页面，不要激动');
                            window.location.href="/word/"+pid;
                        }
                     }
            });
        }
        e.preventDefault();
    });


</script>
</html>