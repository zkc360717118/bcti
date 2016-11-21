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
<script>
    $(function(){
        $('.btn-default').hide();
        $('.btn-info').click(function () {
            $(this.parentNode).children("input").clone(true).insertBefore(this);
            $(this).hide();
            //取消按钮显示
            $(this).next().show();

            //更改内容
            $(this.parentNode).children().first().attr('placeholder','上半月团队价格');
            $(this.parentNode).children().eq(1).attr('placeholder','上半月散客价格');
            $(this.parentNode).children().eq(2).attr('placeholder','下半月团队价格');
            $(this.parentNode).children().eq(3).attr('placeholder','下半月散客价格');
        });
        //取消回原样
        $('.btn-default').click(function() {
            $(this.parentNode).children().eq(2).remove();
            $(this.parentNode).children().eq(2).remove();
            $(this.parentNode).children().eq(0).attr('placeholder','团队价格');
            $(this.parentNode).children().eq(1).attr('placeholder','散客价格');
            $(this).hide();
            $(this).prev().show();
        });
    })
</script>
<body>
@include('common.header')
<div class="container">
    <form class="form-horizontal" role="form" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">酒店名</label>
            <div class="col-sm-10">
                <input type="text" name="hname" class="form-control" placeholder="请输入酒店名字" value="龙鼎">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">电话</label>
            <div class="col-sm-10">
                <input type="text" name="tel" class="form-control"  placeholder="=请输入电话号码" value="0817-2232221">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">城市</label>
            <div class="col-sm-10">
                <input type="text" name="city" class="form-control"  value="北京" placeholder="=请输入电话号码" value="0817-2232221">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">星级</label>
            <div class="col-sm-10">
                <select name="star" class="form-control">
                    <option value="★★★" selected>★★★</option>
                    <option value="★★★☆">★★★☆</option>
                    <option value="★★★★">★★★★</option>
                    <option value="★★★★☆">★★★★☆</option>
                    <option value="★★★★★">★★★★★</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">备注</label>
            <div class="col-sm-10">
                <textarea name="note" class="form-control" rows="3">没有16免1</textarea>
            </div>
        </div>
        <hr class="mbm">
        <h3 class="text-center">下面请输入酒店每月对应的价格</h3>

        <div class="form-group">
            <label  class="col-sm-2 control-label">一月</label>
            <div class="col-sm-10">
                <input type="text" name="jan[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="jan[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default " >取消</button>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">二月</label>
            <div class="col-sm-10">
                <input type="text" name="feb[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="feb[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">三月</label>
            <div class="col-sm-10">
                <input type="text" name="mar[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="mar[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">四月</label>
            <div class="col-sm-10">
                <input type="text" name="apr[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="apr[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">五月</label>
            <div class="col-sm-10">
                <input type="text" name="may[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="may[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">六月</label>
            <div class="col-sm-10">
                <input type="text" name="june[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="june[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default">取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">七月</label>
            <div class="col-sm-10">
                <input type="text" name="july[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="july[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">八月</label>
            <div class="col-sm-10">
                <input type="text" name="aug[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="aug[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">九月</label>
            <div class="col-sm-10">
                <input type="text" name="sep[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="sep[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">十月</label>
            <div class="col-sm-10">
                <input type="text" name="oct[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="oct[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default" >取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">十一月</label>
            <div class="col-sm-10">
                <input type="text" name="nov[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="nov[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default"  >取消</button>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">十二月</label>
            <div class="col-sm-10">
                <input type="text" name="dec[]" class="col-sm-2 input-sm" placeholder="团队价格" value="180">
                <input type="text" name="dec[]" class="col-sm-2 input-sm" placeholder="散客价格" value="280">
                <button type="button" class="btn btn-info">增加特殊情况</button>
                <button type="button" class="btn btn-default"  >取消</button>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">提交</button>
    </form>
</div>
</body>
</html>