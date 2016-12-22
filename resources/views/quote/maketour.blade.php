<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .container input{ padding-left:6px;}
        .container label{ margin-top:7px; }
        textarea{ resize: none;}
        .container button{ margin-top:10px; margin-right:8px; }
         body{ background: #000; height:100%;}
        #bg{ width:100%;  font-size:12px; background: #000; opacity:0.3;  filter:alpha(opacity=30);}
        .left{ width:450px; font-size:12px;  background: #ccc; position:absolute; top:50px; left:20px; padding-bottom:10px; border-radius: 10px; clear:both;}
        .left .container{ width:450px; }
        .right{ width:800px; background: #ccc; position:absolute; top:10px; left:500px; border-radius: 10px;  clear:both;}
        .right .container{width:700px; }
       .right .hotel div{ padding:1px; padding-right:2px;}
        .right button{ margin-left:38%;}
        .right .panel{ width:100%; overflow:hidden; font-size:12px; padding-bottom:24px; margin-bottom: 0;}
        .right tr input{ width:80px;}
    </style>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            var numDay=1;
            var arr=['一','二','三','四','五','六','七','八','九','十','十一','十二','十三','十四','十五','十六','十七','十八','十九','二十'];
            var oH=document.body.style.height;
            $('#bg').css('height',oH);

            //点击增加行程,numDay为天数
            $('.addDay').click(function(){
                numDay++;
                var oDay=$('#day').clone(true);
                oDay.children('label').html('第'+arr[numDay-1]+'天');
                oDay.children().eq(1).children().eq(0).attr('name','address'+numDay);
                oDay.children().eq(2).children().eq(0).attr('name','meal'+numDay);
                oDay.children().eq(3).children().eq(0).attr('name','tourCode'+numDay);
                oDay.find('input').val('');
                oDay.insertBefore($('.deleteDay'));

               //报价单跟着numDay增加天数
                var oqDay=$('#qDay').clone(true);
                oqDay.children().eq(0).html('第'+arr[numDay-1]+'天');
                oqDay.children().eq(1).children().eq(0).attr('name','date'+numDay);
                oqDay.children().eq(2).children().eq(0).attr('name','address'+numDay);
                oqDay.children().eq(3).children().eq(0).attr('name','meal'+numDay);
                oqDay.children().eq(4).children().eq(0).attr('name','tourCode'+numDay);
                oqDay.find('input,textarea').val('');
                $('tbody').append(oqDay);
            });

            //点击减少行程,numDay为天数
            $('.deleteDay').click(function(){
                if(numDay==1){
                    alert('最后一天！');
                    return;
                }
                numDay--;
                document.title=numDay;
                var aDay=$('.day');
                aDay.eq(aDay.length-1).remove();

                //报价单跟着numDay较少天数
                $('tbody tr:last-child').remove();

            });

            //点击增加酒店个数
            $('.addHotel').click(function(){
                var n=$('#hotel1').children().length;
                if(n>=3 && n<4){
                    $('.hotel').append('<div class="col-md-3">' +
                            '<input type="text" class="form-control" placeholder="酒店3" name=""/>' +
                            '</div>')
                }else{
                    alert('酒店最少两个最多三个！')
                }
            });

            //点击删除酒店个数
            $('.dltHotel').click(function(){
               var n=$('#hotel1').children().length;
                if(n==4){
                    $('.hotel div:last-child').remove();
                }else{
                    alert('酒店最少两个最多三个！')
                }
            });

            //获取第一天的日期
            $('input[name=firstDay]').change(function(){
                var m=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Spt","Oct","Nov","Dec");
                var d=new Array("st","nd","rd","th");
                //20161010
                 var firstDay=$('input[name=firstDay]').val();
                //前四位为年

                 var year=firstDay.substring(0,4);  //2016
                 var month=firstDay.substring(4,6);  //12
                 var date=firstDay.substring(6,8);   //23
                 var dns;
                    if(((date)<1) ||((date)>3)){
                        dns=d[3];
                    }
                    else
                    {
                        dns=d[(date)-1];
                        if((date==11)||(date==12)){
                            dns=d[3];
                        }
                    }
                 var dateEnglish=date+dns+' '+m[month-1]+','+year;
                $('input[name=date1]').val(dateEnglish);
            });

               /*  //调用行程码
                $('input[name=tourCode1]').change(function(){
                     var tourCode=$(this).val();

                      code2content(tourCode);
                });

                function code2content(n){
                   $.get('/getpiece/'+n,function(data){
                         var json=eval('('+data+')');
                        $('textarea[name=qtourCode1]').html(json.content);
                    })
                }*/

                $('.day').on('change','input',function(){
                         var name=$(this).attr('name');
                         var tourCode=$(this).val();
                        $.get('/getpiece/'+tourCode,function(data){
                              alert(1);
                              var json=eval('('+data+')');
                              console.log(json);
                              console.log($('textarea[name='+name+']'));
                              $('textarea[name='+name+']').html(json.content);
                        })

                  })
        })
    </script>
</head>

<body >
   <!-- <div id="bg"></div>-->

    <div class="left">
        <h4 class="bg-info">行程</h4>
        <div class="container tour">
            <div class="col-md-12">
                    <label class="col-md-3">时间：</label>
                    <div class="col-md-9">
                      <input type="text" class="date form-control" name="firstDay" placeholder="团到中国的日期如20161010" />
                   </div>
            </div>
            <div class="col-md-12 day" id="day">
                <label class="col-md-3">第一天:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="地点" name="address1"/>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="餐标" name="meal1"/>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="行程码" name="tourCode1"/>
                </div>
            </div>
            <button class="btn btn-primary btn-xs pull-right deleteDay">删除行程</button>
            <button class="btn btn-primary btn-xs pull-right addDay">增加行程</button>
        </div>
        <hr class="mbm"/>
        <h4 class="bg-info">酒店</h4>
        <div class="container">
            <div class="col-md-12 hotel" id="hotel1">
                <label class="col-md-3">北京酒店:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="酒店1" name=""/>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="酒店2" name=""/>
                </div>
            </div>
            <div class="col-md-12 hotel">
                <label class="col-md-3">上海酒店:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="酒店1" name=""/>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="酒店2" name=""/>
                </div>
            </div>
            <button class="btn btn-primary btn-xs pull-right dltHotel">删除酒店</button>
            <button class="btn btn-primary btn-xs pull-right addHotel">增加酒店</button>
        </div>
        <hr class="divider"/>
        <div class="container">
            <div class="col-md-12">
                <label class="col-md-3">总人数:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="总人数" name=""/>
                </div>
            </div>
        </div>
    </div>

    <div class="right">
        <form class="form-horizontal" role="form" action="" method="get">
            <div class="panel panel-primary">
                <div class="panel-heading bg-info">报价单</div>
                <div class="panel-body">
                        <div>
                            <h5 class="bg-info">行程</h5>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>第几天</th>
                                    <th>日期</th>
                                    <th>地点</th>
                                    <th>餐标</th>
                                    <th>行程</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="qDay" id="qDay">
                                        <td>第一天</td>
                                        <td><input type="text" name="date1" placeholder="请输入行程日期"/></td>
                                        <td><input type="text" name="address1" placeholder="请输入行程的地点"/></td>
                                        <td><input type="text" name="meal1" placeholder="餐标"/></td>
                                        <td><textarea name="tourCode1"  cols="35" rows="2"></textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="bg-info">酒店</h5>
                        <div class="container">
                            <div class="col-md-12 ">
                                <label class="col-md-2"></label>
                                <div class="col-md-3">
                                    三星级
                                </div>
                                <div class="col-md-3">
                                    四星级
                                </div>
                                <div class="col-md-3">
                                   五星级
                                </div>
                            </div>
                            <div class="col-md-12 hotel">
                                <label class="col-md-2">北京:</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店1" name=""/>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店2" name=""/>
                                </div>

                            </div>
                            <div class="col-md-12 hotel">
                                <label class="col-md-2">上海:</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店1" name=""/>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店2" name=""/>
                                </div>

                            </div>
                        </div>
                        <div>
                            <h5 class="bg-info">注意事项</h5>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm col-md-3">提交</button>
            </div>
        </form>
    </div>
</body>
</html>