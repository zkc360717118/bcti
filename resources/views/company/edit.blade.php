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
        .clearFix:after{ content: ''; clear:both; display:block;}
        label{ text-align: right; padding-top:5px; }
        .container-vertical .form-group{ margin-bottom:15px; }
        input{margin-bottom:10px;}
        .panel{ width:80%; margin:0 auto;}
        textarea{ resize: none; width:100%; }
        i{ font-size: 12px;}
        strong{ font-size: 24px;}
    </style>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        function add(n){
            $('.addC').click(function(){
                //克隆第一个插入到button标签前面
                $(this).prev().clone(true).insertBefore($('.addC'));
                $('.removeC').show();
                var n=$('.contact').length;
                $('#count').html('(共有'+n+'个联系人)')
            });
        }
        function removeContact(n){
            $('.removeC').click(function () {
                if($('.contact').length==1){
                    alert('最后一条了哦！');
                    $('.removeC').hide();
                    return;
                }else{
                    if(!confirm('确定要删除该联系人么？'))return;
                    $(this).parent().remove();
                }
                if($('.contact').length==1){
                    $('.removeC').hide();
                }
                var n=$('.contact').length;
                $('#count').html('(共有'+n+'个联系人)')
            });
        }
        $(function(){
            add();
            //删除联系人
            removeContact();

            //最后一个时减号消失
            if($('.contact').length==1){
                $('.removeC').hide();
            }
        })
    </script>
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading bg-info"><h4>修改公司信息</h4><a href="/company" class="btn btn-danger">回到客户资源页面</a></div>
        <div class="panel-body ">
            <form class="bs-example bs-example-form" role="form" action="" method="post">
                <div class="container-vertical clearFix">
                    <div class="form-group clearFix">
                        <label class="col-md-2 ">公司名<span class="glyphicon glyphicon-home"></span>：</label>
                        <div class="col-md-5">
                            <input type="text" name="cname" class="form-control " required placeholder="请输入公司名" value="{{$data->cname}}"/>
                        </div>
                    </div>
                    <div class="form-group clearFix">
                        <label class="col-md-2 ">地址
                            <span class="glyphicon glyphicon-screenshot"></span>：</label>
                        <div class="col-md-5">
                            <input type="text" name="address" class="form-control " placeholder="请输入地址" value="{{$data->address}}"/>
                        </div>
                    </div>
                    <div class="form-group clearFix">
                        <label class="col-md-2 ">座机<span class="glyphicon glyphicon-phone"></span>：</label>
                        <div class="col-md-5">
                            <input type="tel" name="landline" class="form-control" required placeholder="请输入公司座机" value="{{$data->landline}}"/>
                        </div>
                    </div>
                    <div class="form-group clearFix">
                        <label class="col-md-2 ">城市<span class="glyphicon glyphicon-globe"></span>：</label>
                        <div class="col-md-5">
                            <input type="text" name="city" class="form-control" required placeholder="请输入公司所在城市" value="{{$data->city}}"/>
                        </div>
                    </div>
                    <hr class="mbm"/>
                </div>
                <button type="submit" class="btn btn-primary col-md-4 col-md-push-4"><strong>修改公司 </strong></button>
            </form>

            {{--联系人修改表单--}}
                @foreach($data->contacts as $c)
                <form action="/contactEdit/{{$c->id}}" method="post" class="form-horizontal"  >
                    {{csrf_field()}}
                <div class="form-group clearFix contact" >
                    <p class="col-md-12 bg-info">该公司联系人：</p>
                    <label class="col-md-2 ">人名：</label>
                    <div class="col-md-4">
                        <input type="text" name="pname" class="form-control " placeholder="请输入联系人的姓名" value="{{$c->pname}}"/>
                    </div>
                    <label class="col-md-2 " >电话：</label>
                    <div class="col-md-4">
                        <input type="text" name="tel1" class="form-control " placeholder="请输入联系人的电话" value="{{$c->tel1}}"/>
                    </div>
                    <label class="col-md-2 ">职位：</label>
                    <div class="col-md-4">
                        <input type="text" name="title" class="form-control " placeholder="请输入联系人的职位" value="{{$c->title}}"/>
                    </div>
                    <label class="col-md-2 ">备注：</label>
                    <div class="col-md-4">
                        <textarea class="form-control" name="note">{{$c->note}}</textarea>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary col-md-4 col-md-push-4"><strong>修改联系人 </strong></button>
                </form>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>