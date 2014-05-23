<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest') {
    //Generate the data
    $page = intval($_GET['page']);
    $max = 10;
    $pageCount = 15;
    $page = $page <= 0 ? 1 : $page;
    $start = ($page - 1) * $pageCount;
    $end = $start + $pageCount;
    $data = $page > $max ? array() : range($start + 1, $end);
    $nextPage = $page + 1 > $max ? 0 : $page + 1;
    $output = array(
        'next' => $nextPage,
        'data' => $data,
    );
    $output = json_encode($output);
    echo $output;
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8">
  <title>Data Lazy Load Simple</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </script>
  <style type="text/css">
    .main {
        width:980px;
        margin:0 auto;
    }
    .list {
        list-style:none;
        width:980px;
    }
    .list .h2 {
        font-size: 2em;
        text-align:center;
    }
    .list li{
        border:1px solid #CCCCCC;
        padding:15px;
    }
  </style>
</head>

<body>
    <div class = 'main'>
        <ul class = 'list'>
        <li class = 'h2'>Data Lazy Load Simple</li>
        <li>aaaa</li>
        <li>bbbb</li>
        <li>cccc</li>
        <li>dddd</li>
        <li>eeee</li>
        <li>ffff</li>
        <li>gggg</li>
        <li>hhhh</li>
        <li>iiii</li>
        <li>jjjj</li>
        <li>kkkk</li>
        <li>llll</li>
        <li>mmmm</li>
        <li>nnnn</li>
        <li>oooo</li>
        <li>pppp</li>
        <li>qqqq</li>
        <li>rrrr</li>
        <li>ssss</li>
        <li>tttt</li>
        <li>uuuu</li>
        <li>vvvv</li>
        <li>wwww</li>
        <li>xxxx</li>
        <li>yyyy</li>
        <li>zzzz</li>
        </ul>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="../DataLazyLoad.min.js"></script>
    <script type="text/javascript" charset="utf-8">
    $(function() {
        //Call DataLazyLoad
        $(".list").DataLazyLoad({load : function(page, unLocked)
        {
            $.get("?page="+page, {}, function(data)
            {
                if (typeof data.data != 'undefined' && data.data.length > 0)
                {
                    var list = data.data;
                    var html = '';
                    $.each(list, function(k, v) {
                        html += '<li>Page: ' + page + ', Data Index: ' + v + ' </li>';
                    });
                    $(html).appendTo('.list');
                }
                //Check whether to end
                page = typeof data.next != 'undefined' ? data.next : 0;
                if (page == 0)
                {
                    $("<li class = 'h2'>The End!</li>").appendTo('.list');
                }
                //To prevent repeated load, The first parameter to the next page, No page is 0
                unLocked(page);
            }, 'json');
        }});
    });
    </script>
</body>
</html>