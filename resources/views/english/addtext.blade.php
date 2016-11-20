<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- 可选的Bootstrap主题文件（一般不使用） -->
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap-theme.min.css"></script>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<body>

<form class="form-horizontal" role="form" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label  class="col-sm-2 control-label">行程内容：</label>
        <div class="col-sm-10">
            <textarea name="contents" id="" cols="130" rows="10" placeholder="write down the itinerary"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">代码：</label>
        <div class="col-sm-6">
            <input type="text" name="code" class="form-control" placeholder="比如：tt 表示 temple of heaven">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">行程所指城市：</label>
        <div class="col-sm-6">
            <input type="text" name="city" class="form-control" list="citylist">
            <datalist id="citylist">
                <option value="北京"></option>
                <option value="上海"></option>
                <option value="西安"></option>
                <option value="桂林"></option>
                <option value="成都"></option>
                <option value="重庆"></option>
                <option value="湖北"></option>
                <option value="深圳"></option>
                <option value="香港"></option>
                <option value="澳门"></option>
                <option value="杭州"></option>
                <option value="苏州"></option>
                <option value="广州"></option>
            </datalist>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-lg btn-primary">Add it!</button>
        </div>
    </div>
</form>
</body>
</html>