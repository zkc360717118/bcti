<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Document</title>
</head>
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<body>

<ul id="myTab" class="nav nav-tabs"  style="margin-top: 10px; padding: 0;">
    <li class="active"><a href="#bjing" data-toggle="tab">bjing</a></li>
    <li><a href="#shanghai" data-toggle="tab">Shanghai</a></li>
    <li><a href="#xian" data-toggle="tab">Xian</a></li>
    <li><a href="#guilin" data-toggle="tab">guilin</a></li>
    <li><a href="#others" data-toggle="tab">其他</a></li>
</ul>
<div id="myTabContent" class="tab-content" style="margin-top: 20px;">
    <div class="tab-pane fade in active" id="bjing">
        {{--北京碎片化行程遍历  begin--}}
        @foreach($alltour as $b)
            @if($b->city=="北京")
                <div class="jumbotron text-center">
                    <h1>{{$b->city}}</h1>
                    <h3>code:{{$b->code}}</h3>
                    <p>{{$b->content}}</p>
                    <p><a class="btn btn-primary btn-lg" href='{{url("/modifyiti/$b->itid")}}' role="button">修改</a></p>
                </div>
            @endif
        @endforeach
        {{--北京碎片化行程遍历  end--}}

    </div>

    <div class="tab-pane fade " id="shanghai">
        {{--上海碎片化行程遍历  end--}}
        @foreach($alltour as $b)
            @if($b->city=="上海")
                <div class="jumbotron text-center">
                    <h1>{{$b->city}}</h1>
                    <h3>code:{{$b->code}}</h3>
                    <p>{{$b->content}}</p>
                    <p><a class="btn btn-primary btn-lg" href='{{url("/modifyiti/$b->itid")}}' role="button">修改</a></p>
                </div>
            @endif
        @endforeach
        {{--上海碎片化行程遍历  end--}}
    </div>
    <div class="tab-pane fade " id="xian">
        {{--西安碎片化行程遍历  end--}}
        @foreach($alltour as $b)
            @if($b->city=="西安")
                <div class="jumbotron text-center">
                    <h1>{{$b->city}}</h1>
                    <h3>code:{{$b->code}}</h3>
                    <p>{{$b->content}}</p>
                    <p><a class="btn btn-primary btn-lg" href='{{url("/modifyiti/$b->itid")}}' role="button">修改</a></p>
                </div>
            @endif
        @endforeach
        {{--西安碎片化行程遍历  end--}}
    </div>
    <div class="tab-pane fade " id="guilin">
        {{--桂林碎片化行程遍历  end--}}
        @foreach($alltour as $b)
            @if($b->city=="桂林")
                <div class="jumbotron text-center">
                    <h1>{{$b->city}}</h1>
                    <h3>code:{{$b->code}}</h3>
                    <p>{{$b->content}}</p>
                    <p><a class="btn btn-primary btn-lg" href='{{url("/modifyiti/$b->itid")}}' role="button">修改</a></p>
                </div>
            @endif
        @endforeach
        {{--桂林碎片化行程遍历  end--}}
    </div>
    <div class="tab-pane fade " id="others">
        {{--其他城市碎片化行程遍历  end--}}
        @foreach($alltour as $b)
            @if($b->city==""&&$b->city!="北京"&&$b->city!="上海"&&$b->city!="西安"&&$b->city!="桂林")
                <div class="jumbotron text-center">
                    <h1>{{$b->city}}</h1>
                    <h3>code:{{$b->code}}</h3>
                    <p>{{$b->content}}</p>
                    <p><a class="btn btn-primary btn-lg" href='{{url("/modifyiti/$b->itid")}}' role="button">修改</a></p>
                </div>
            @endif
        @endforeach
        {{--其他城市碎片化行程遍历  end--}}
    </div>
</div>

</body>
</html>
