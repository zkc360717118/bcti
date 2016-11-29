<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<body>
@include('common.header')
<div class="container">
    <form class="form-horizontal" role="form" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">城市：</label>
            <div class="col-sm-10 ">
                <input type="text" name="city" class="form-control" placeholder="请输入门票所在的城市" value="北京">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">名称：</label>
            <div class="col-sm-10">
                <input type="text" name="tname" class="form-control"  placeholder="请输入门票名称" value="印度小厨三里屯店">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">淡季价格：</label>
            <div class="col-sm-10">
                <input type="text" name="dprice" class="form-control"  value="50" placeholder="淡季的价格" >
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">旺季价格：</label>
            <div class="col-sm-10">
                <input type="text" name="wprice" class="form-control"  value="60" placeholder="旺季的价格" >
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">备注：</label>
            <div class="col-sm-10">
                <textarea name="note" class="form-control" rows="3" placeholder="比如：有什么小道消息？"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">提交</button>
    </form>
</div>
</body>
</html>