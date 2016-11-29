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
                <input type="text" name="city" class="form-control" placeholder="请输入导游所在的城市" value="北京">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">名称：</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="请输入导游名称" value="潘继恩">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">联系电话一：</label>
            <div class="col-sm-10">
                <input type="text" name="telone" class="form-control"  value="15200231803" placeholder="联系电话1" >
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">联系电话二：</label>
            <div class="col-sm-10">
                <input type="text" name="teltwo" class="form-control"  value="18500231801" placeholder="旺季的价格" >
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">语种：</label>
            <div class="col-sm-10">
                <select name="lan">
                    <option value="1">英语</option>
                    <option value="2">越南语</option>
                    <option value="3">泰语</option>
                    <option value="4">法语</option>
                    <option value="5">马来西亚语</option>
                    <option value="6">日语</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">提交</button>
    </form>
</div>
</body>
</html>