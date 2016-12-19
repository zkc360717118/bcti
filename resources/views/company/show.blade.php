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
        .container{ border: 1px solid #ccc;}
        .check{ position:relative;}
       .contacts{ position:absolute; width:200px; padding:15px; border:1px solid #ccc; display:none; left:70px; top:0; border-radius: 5px; background:#d9edf7;}

    </style>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script>
        $(function () {
            var aEl=$('.checkBtn');
            for(var i=0; i<aEl.length; i++){
                aEl[i].onmouseover=function(){
                        var oCId=$(this).next().next().val();
                        var URL='/getcompanycontact/'+oCId;
                        $.get(URL,function(data){
                              if(data==0){
                                $('.contacts').html('本公司还没有联系人哦！');
                              }else{
                              $('.contacts').html('');
                                var arr=eval(data);
                                 for(var i=0; i<arr.length; i++){
                                   $('<ul class="details"><li>--------</li><li>姓名:'+arr[i].pname+'</li><li>职位:'+arr[i].title+'</li><li>电话1:'+arr[i].tel1+'</li><li>电话2:'+arr[i].tel2+'</li><li>备注:'+arr[i].note+'</li></ul>').appendTo($('.contacts'));
                                 }
                              }
                        });
                        $(this).next().show();
                }
                aEl[i].onmouseout=function(){
                      $('.contacts').html('');
                       $(this).next().hide();
                }
            }


        })
    </script>
</head>
<body>
@include('common.header')
<div class="container">
    <a href="/companyadd"  class="btn btn-danger">添加客户</a>
    <table class="table table-striped">
        <caption class="bg-info">展示公司</caption>
        <thead>
        <tr>
            <th>序列</th>
            <th>公司名</th>
            <th>地址</th>
            <th>座机</th>
            <th>城市</th>
            <th>联系人</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
        <tr>
            <td>1</td>
            <td>{{$d->cname}}</td>
            <td>{{$d->address}}</td>
            <td>{{$d->landline}}</td>
            <td>{{$d->city}}</td>
            <td class="check">
                <a href="/companyEdit/{{$d->cid}}" class="btn btn-info" >修改</a>
                <button type="link" class="btn btn-warning checkBtn" >查看</button>
                <div class="contacts"></div>
                <input type="hidden" value="{{$d->cid}}">
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!! $data->links() !!}
    </div>
</div>

</body>
</html>