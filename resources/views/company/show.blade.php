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
    </style>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $("[data-toggle='popover']").popover();
        })
    </script>
</head>
<body>
@include('common.header')
<div class="container">
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
            <td><button type="button" class="btn btn-warning" title="Popover title"
                        data-container="body" data-toggle="popover" data-placement="right"
                        data-content="右侧的 Popover 中的一些内容">
                    查看
                </button>
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