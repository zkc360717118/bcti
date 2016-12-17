<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<body>
@include('common.header')
<div class="container">
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>城市</th>
            <th>名称</th>
            <th>淡季价格</th>
            <th>旺季价格</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        {{--餐厅价格循环 begin--}}
        @foreach($data as $h)
            <tr>
                <td>{{$h->city}}</td>
                <td>{{$h->tname}}</td>
                <td>{{$h->dprice}}</td>
                <td>{{$h->wprice}}</td>
                <td>{{$h->note}}</td>
                <td>
                    <a href="/ticketEdit/{{$h->tiid}}" class="btn btn-primary btn-xs">修改</a>
                </td>
            </tr>
        @endforeach
        {{--酒店价格循环 end--}}
        </tbody>
    </table>
</div>
</body>
</html>