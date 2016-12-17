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
            <th>酒店名称</th>
            <th>星级</th>
            <th>1月</th>
            <th>2月</th>
            <th>3月</th>
            <th>4月</th>
            <th>5月</th>
            <th>6月</th>
            <th>7月</th>
            <th>8月</th>
            <th>9月</th>
            <th>10月</th>
            <th>11月</th>
            <th>12月</th>
            <th>电话</th>
            <th>城市</th>
            <th>修改</th>
        </tr>
        </thead>
        <tbody>
        {{--酒店价格循环 begin--}}
        @foreach($allhotel as $h)
        <tr>
            <td>{{$h->hname}}</td>
            <td>{{$h->star}}</td>
            <td>{!! $h->jan !!}</td>
            <td>{!! $h->feb !!}</td>
            <td>{!! $h->mar !!}</td>
            <td>{!!$h->apr!!}</td>
            <td>{!!$h->may!!}</td>
            <td>{!!$h->june!!}</td>
            <td>{!!$h->july!!}</td>
            <td>{!!$h->aug!!}</td>
            <td>{!!$h->sep!!}</td>
            <td>{!!$h->oct!!}</td>
            <td>{!!$h->nov!!}</td>
            <td>{!!$h->dec!!}</td>
            <td>{!!$h->tel !!}</td>
            <td>{!!$h->city!!}</td>
            <td>
                <a href="/hotelEdit/{{$h->hid}}" class="btn btn-primary btn-xs">修改</a>
            </td>
        </tr>
        @endforeach
        {{--酒店价格循环 end--}}
        </tbody>
    </table>
</div>
</body>
</html>