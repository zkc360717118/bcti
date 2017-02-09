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
        .container input{ padding-left:6px;}
        .container label{ margin-top:7px; }
        textarea{ resize: none;}
        .container button{ margin-top:10px; margin-right:8px; }
         body{ background: #000; height:100%;}
        #bg{ width:100%;  font-size:12px; background: #000; opacity:0.3;  filter:alpha(opacity=30);}
        .left{ width:450px; font-size:12px;  background: #ccc; position:absolute; top:50px; left:20px; padding-bottom:10px; border-radius: 10px; clear:both;}
        .left .container{ width:450px; }
        .right{ width:800px; background: #ccc; position:absolute; top:10px; left:500px; border-radius: 10px;  clear:both;}
        .right .container{width:700px; }
       .right .hotel div{ padding:1px; padding-right:2px;}
        .right button{ margin-left:38%;}
        .right .panel{ width:100%; overflow:hidden; font-size:12px; padding-bottom:24px; margin-bottom: 0;}
        .right tr input{ width:80px;}
    </style>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>

<body >
   <!-- <div id="bg"></div>-->



    <div class="right">
        <form class="form-horizontal" role="form" action="/maketour" method="post">
            {{csrf_field()}}
            <div class="panel panel-primary">
                <div class="panel-heading bg-info">报价单</div>
                <div class="panel-body">
                        <div>
                            <h5 class="bg-info">行程</h5>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>第几天</th>
                                    <th>日期</th>
                                    <th>地点</th>
                                    <th>餐标</th>
                                    <th>行程</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="qDay">
                                        <td>第一天</td>
                                        <td><input type="text" name="date[]" placeholder="请输入行程日期" value="1th Jan"/></td>
                                        <td><input type="text" name="address[]" placeholder="请输入行程的地点" value="beijing"/></td>
                                        <td><input type="text" name="meal[]" placeholder="餐标" value="BLD"/></td>
                                        <td><textarea name="iti[]"  cols="35" rows="2">arrive at beijing</textarea></td>
                                    </tr>
                                    <tr class="qDay">
                                        <td>第2天</td>
                                        <td><input type="text" name="date[]" placeholder="请输入行程日期" value="2th Jan"/></td>
                                        <td><input type="text" name="address[]" placeholder="请输入行程的地点" value="beijing"/></td>
                                        <td><input type="text" name="meal[]" placeholder="餐标" value="BLD"/></td>
                                        <td><textarea name="iti[]"  cols="35" rows="2">tian an men ssqure , forbidden city</textarea></td>
                                    </tr>
                                    <tr class="qDay">
                                        <td>第3天</td>
                                        <td><input type="text" name="date[]" placeholder="请输入行程日期" value="3th Jan"/></td>
                                        <td><input type="text" name="address[]" placeholder="请输入行程的地点" value="beijing"/></td>
                                        <td><input type="text" name="meal[]" placeholder="餐标" value="BLD"/></td>
                                        <td><textarea name="iti[]"  cols="35" rows="2">take to train station , and wish u good luck</textarea></td>
                                    </tr>
                                    <tr class="qDay">
                                        <td>第4天</td>
                                        <td><input type="text" name="date[]" placeholder="请输入行程日期" value="4th Jan"/></td>
                                        <td><input type="text" name="address[]" placeholder="请输入行程的地点" value="beijing"/></td>
                                        <td><input type="text" name="meal[]" placeholder="餐标" value="BLD"/></td>
                                        <td><textarea name="iti[]"  cols="35" rows="2">pearl tv tower,2th flow, dinner at no where</textarea></td>

                                    </tr>
                                    <tr class="qDay">
                                        <td>第5天</td>
                                        <td><input type="text" name="date[]" placeholder="请输入行程日期" value="5th Jan"/></td>
                                        <td><input type="text" name="address[]" placeholder="请输入行程的地点" value="beijing"/></td>
                                        <td><input type="text" name="meal[]" placeholder="餐标" value="BLD"/></td>
                                        <td><textarea name="iti[]"  cols="35" rows="2">flight to india ,say goodbye</textarea></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="bg-info">酒店</h5>
                        <div class="container">
                            <div class="col-md-12 ">
                                <label class="col-md-2"></label>
                                <div class="col-md-3">
                                    三星级
                                </div>
                                <div class="col-md-3">
                                    四星级
                                </div>
                                <div class="col-md-3">
                                   五星级
                                </div>
                            </div>
                            <div class="col-md-12 hotel">
                                <label class="col-md-2">beijing:</label>
                                <div class="col-md-3">
                                    <input type="hidden" value="beijing" name="location[]">
                                    <input type="hidden" value="3" name="star[]">
                                    <input type="text" class="form-control" placeholder="酒店1" name="hotel1[]" value="bj1 hotel"/>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店2" name="hotel2[]" value="bj2" hotel "/>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店2" name="hotel3[]" value="bj3 hotel "/>
                                </div>

                                <label class="col-md-2">shanghai:</label>
                                <div class="col-md-3">
                                    <input type="hidden" value="shanghai" name="location[]">
                                    <input type="text" class="form-control" placeholder="酒店1" name="hotel1[]" value="sh1 hotel"/>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店2" name="hotel2[]" value="sh2 hotel "/>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="酒店2" name="hotel3[]" value="sh1 hotel "/>
                                </div>


                            </div>

                        </div>
                        <div>
                            <h5 class="bg-info">注意事项</h5>
                        </div>
                </div>
                <input type="text" name="adult" value="20">
                <input type="text" name="children" value="3">
                <button type="submit" class="btn btn-primary btn-sm col-md-3">提交</button>
            </div>
        </form>
    </div>
</body>
</html>