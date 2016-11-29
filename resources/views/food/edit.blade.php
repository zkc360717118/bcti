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
    <form class="bs-example bs-example-form" role="form" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">城市：</label>
            <div class="col-sm-10 ">
                <input type="text" name="city" class="form-control" placeholder="请输入餐厅所在的城市" value="{{$data->city}}">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">餐厅名：</label>
            <div class="col-sm-10">
                <input type="text" name="resname" class="form-control"  placeholder="请输入餐厅名称" value="{{$data->resname}}">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">联系人1；</label>
            <div class="col-sm-10">
                <input type="text" name="personone" class="form-control"  value="{{$data->personone}}" placeholder="第一联系人" >
                <input type="text" name="telone" class="form-control"  value="{{$data->telone}}" placeholder="第一联系人的电话" >

            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">联系人2；</label>
            <div class="col-sm-10">
                <input type="text" name="persontwo" class="form-control"  value="{{$data->persontwo}}" placeholder="第二联系人" >
                <input type="text" name="teltwo" class="form-control"  value="{{$data->teltwo}}" placeholder="第二联系人的电话" >
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">备注：</label>
            <div class="col-sm-10">
                <textarea name="note" class="form-control" rows="3" placeholder="比如：gala多少钱？餐厅特点？">{{$data->note}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">午餐：</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">团队</span>
                    <input type="text" name="groupn"  class="form-control" value="{{$data->groupn}}" placeholder="" >
                    <span class="input-group-addon">散客</span>
                    <input type="text" name="sn"  class="form-control" value="{{$data->sn}}" placeholder="" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">晚餐：</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">团队</span>
                    <input type="text" name="groupd"  class="form-control" value="{{$data->groupd}}" placeholder="" >
                    <span class="input-group-addon">散客</span>
                    <input type="text" name="sd"  class="form-control" value="{{$data->sd}}" placeholder="" >
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-primary">提交</button>
    </form>
</div>
</body>
</html>