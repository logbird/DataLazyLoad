Data Lazy Load Plugin for jQuery
============
Lazy Load delays loading of data in long web pages like sina weibo.

How to Use?
============
Load jQuery and jquery.lazyload.min.js
```
<script src="jquery.js" type="text/javascript"></script>
<script src="DataLazyLoad.min.js" type="text/javascript"></script>
```
Add the HTML code
```
<ul class = 'list'>
<li>aaaa</li>
<li>bbbb</li>
<li>cccc</li>
<li>dddd</li>
<li>eeee</li>
<li>ffff</li>
<li>gggg</li>
</ul>
```
Call DataLazyLoad
```
//Call DataLazyLoad
$(function(){
  $(".list").DataLazyLoad({load : function(page, unLocked)
  {
      var html = '';
      var max = 10;
      //Generate the data
      for (var i = 0; i < 10; i++)
      {
           html += '<li>Page: ' + page + ', Data Index: ' + i + ' </li>';
      }
      $(html).appendTo('.list');
      //Check whether to end
      page = page >= max ? 0 : page + 1;
      //You must call after loading the data, To prevent repeated load, The first parameter to the next page, No page is 0
      unLocked(page);
      if (page == 0)
      {
          $("<li class = 'h2'>The End!</li>").appendTo('.list');
      }
  }});
});
```

DEMO && EXAMPLES
============
> [EXAMPLES](https://github.com/logbird/DataLazyLoad/tree/master/examples) 

> [DEMO](http://datalazyload.sinaapp.com/)

Options
============
```
$(".list").DataLazyLoad(options);
```
|parameter|type|default|description|
|---|:---|:---:|:---:|---:|
|offset|int|`200`|When less than offset distance at the bottom of the page to load data.|
|load|function|`function(page, unLocked){}`|The load data handler. Parameters: `page` is Need to load the page, `unLocked` is a function. After loading the data must be called ` unLocked ` function, and pass nextPage parameters.|
|page|int|2|Loading page Numbers for the first time|

License
============
All code licensed under the MIT License. All images licensed under Creative Commons Attribution 3.0 Unported License. In other words you are basically free to do whatever you want. Just don’t remove my name from the source.
