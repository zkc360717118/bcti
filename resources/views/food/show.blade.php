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
<div class="container">
    @include('common.header')
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>餐厅名称</th>
            <th>联系人1</th>
            <th>联系人2</th>
            <th>午餐团队</th>
            <th>午餐散客</th>
            <th>晚餐团队</th>
            <th>晚餐散客</th>
            <th>城市</th>
            <th>备注</th>
            <th>修改</th>
        </tr>
        </thead>
        <tbody>
        {{--餐厅价格循环 begin--}}
        @foreach($data as $h)
            <tr>
                <td>{{$h->resname}}</td>
                <td>{{$h->personone}}<br>{{$h->telone}}</td>
                <td>{{$h->persontwo}}<br>{{$h->teltwo}}</td>
                <td>{{$h->groupn}}</td>
                <td>{{$h->sn}}</td>
                <td>{{$h->groupd}}</td>
                <td>{{$h->sd}}</td>
                <td>{{$h->city}}</td>
                <td>{{$h->note}}</td>
                <td>
                    <a href="/foodEdit/{{$h->resid}}" class="btn btn-primary btn-xs">修改</a>
                </td>
            </tr>
        @endforeach
        {{--酒店价格循环 end--}}
        </tbody>
    </table>
</div>
</body>
</html>