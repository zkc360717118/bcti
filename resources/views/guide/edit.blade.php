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
                <input type="text" name="city" class="form-control" placeholder="请输入导游所在的城市" value="{{$d->city}}" list="citylist">
                <datalist id="citylist">
                    <option value="北京">北京</option>
                    <option value="上海">上海</option>
                    <option value="西安">西安</option>
                    <option value="杭州">杭州</option>
                    <option value="广州">广州</option>
                    <option value="成都">成都</option>
                    <option value="西藏">西藏</option>
                    <option value="桂林">桂林</option>
                </datalist>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">名称：</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="请输入导游名称" value="{{$d->name}}">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">联系电话一：</label>
            <div class="col-sm-10">
                <input type="text" name="telone" class="form-control"  value="{{$d->telone}}" placeholder="联系电话1" >
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">联系电话二：</label>
            <div class="col-sm-10">
                <input type="text" name="teltwo" class="form-control"  value="{{$d->teltwo}}" placeholder="旺季的价格" >
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">语种：</label>
            <div class="col-sm-10">
                <select name="lan">
                    <option value="1"<?php if($d['lan']==1){echo ‘selected’;}?>>英语</option>
                    <option value="2" <?php if($d['lan']==2){echo ‘selected’;}?>>越南语</option>
                    <option value="3" <?php if($d['lan']==3){echo ‘selected’;}?>>泰语</option>
                    <option value="4" <?php if($d['lan']==4){echo ‘selected’;}?>>法语</option>
                    <option value="5" <?php if($d['lan']==5){echo ‘selected’;}?>>马来西亚语</option>
                    <option value="6" <?php if($d['lan']==6){echo ‘selected’;}?>>日语</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">提交</button>
    </form>
</div>
</body>
</html>