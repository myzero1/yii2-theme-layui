layui.config({
    base : "js/"
}).use(['form','layer','jquery', 'table', 'laypage'],function(){
    $ = layui.$;
    var layer = layui.layer;
    var tableId = 'z1gridview-laytable';
    //第一个实例
    var table = layui.table;
    var limit = $("#"+tableId).attr("limit");
    var curr = $("#"+tableId).attr("curr");
    var initSortStr = $("#"+tableId).attr("initSortStr");
    var count = $("#"+tableId).attr("count");
    var subSelectors = $("#"+tableId).attr("subSelectors");
    var subHeight = $("#"+tableId).attr("subHeight");
    subSelectors = eval('(' + subSelectors + ')');
    var laytableopts = $("#"+tableId).attr("laytableopts");
    laytableopts = eval('(' + laytableopts + ')');

    var options = {
        'page': true
        ,'height': 'full-0'
        ,'autoSort': false
    };

    $.extend(options, laytableopts);

    if (initSortStr != '') {
        options['initSort'] = eval('(' + initSortStr + ')');
    }

    options['height'] = 'full-' + getSubHeight(subSelectors);

    options['limit'] = limit;

    //初始化表格

    table.init(tableId, options);

    $(window).resize(function() {
        options['height'] = 'full-' + getSubHeight(subSelectors);

        // table.init(tableId, options);
        table.reload(tableId, options);
     });

    function getSubHeight(subSelectors){
        var subHeightT = 0;
        if (subSelectors instanceof Array) {
            for (var i = subSelectors.length - 1; i >= 0; i--) {
                subHeightT = subHeightT + $(subSelectors[i]).outerHeight(true);
            }
        }

        subHeightT = subHeightT + parseInt(subHeight);

        return Math.abs(subHeightT);;
    }

    //排序
    table.on('sort('+tableId+')', function(obj){
        var sortStr = 'sort='+obj.field;
        var sortStr2 = 'sort=-'+obj.field;

        var sortUrl = '';
        $(".gridview-table-list a").each(function(){
            var href = $(this).attr('href');
            if(href.indexOf(sortStr) != -1 || href.indexOf(sortStr2) != -1 ){
                sortUrl = href;
            }
        });

        // $(".layui-table-view").hide();
        layer.load();
        location.href=sortUrl;
        return false;
    });

    //数据表格导航
    var laypage = layui.laypage
      laypage.render({
        elem: $(".layui-table-page"),
        count: count,
        curr: curr,
        limit: limit,
        limits: [10,20,50,100],
        groups: 3,
        layout: ['prev', 'page', 'next', 'skip', 'count', 'limit'],
        prev: '<i class="layui-icon">&#xe603;</i>',
        next: '<i class="layui-icon">&#xe602;</i>',
        jump: function(obj, first){
            var parseQuery = function(query){
                var reg = /([^=&\s]+)[=\s]*([^=&\s]*)/g;
                var obj1 = {};
                while(reg.exec(query)){
                    obj1[RegExp.$1] = RegExp.$2;
                }
                return obj1;
            }
            var search = decodeURI(location.search);
            var uri = location.href.replace(location.search,'');
            var params = parseQuery(search.substring(1,search.length));
            params['per-page'] = obj.limit;
            params['page'] = obj.curr;
            var paramStr = $.param(params);
            var url = uri + '?' + paramStr

            if(url != location.href && !first){
                // $(".layui-table-view").hide();
                layer.load();
                location.href=url;
            }
        }
    });

    $("#delete-selected").mouseenter(function(){
        var target = $(this);
        var checked = table.checkStatus(tableId);
        var checkedValue = new Array();
        for (var i = checked['data'].length - 1; i >= 0; i--) {
            checkedValue.push(checked['data'][i]['id']);
        }
        var checkedValueStr = checkedValue.join(',');

        var url = target.attr('url');
        var base = url.split('z1selected=');
        var urlNew = base[0] + 'z1selected=' + checkedValueStr
        target.attr('url', urlNew);
        return false;
    });

    $(".layui-btn-search").click(function(){
        layer.load();
    });
});