layui.config({
    base : "js/"
}).use(['layer','form','jquery'],function(){
    var layer = layui.layer;
    var inValidate = false;
    $ = layui.$;

    $('#layer-form-create').on('afterValidateAttribute', function (event, attribute, messages) {
        var indexOld = $('#'+attribute.id).attr("layer-index");
        if(messages.length > 0 && !inValidate){
            var msg = '<i class="layui-icon layui-icon-face-cry" style="font-size:30px;color:#dd4b39;display:block;float:left;margin-left:-10px;margin-right: 5px;"></i> '+messages.join(';')
            layer.close(indexOld);
            var index = layer.tips(msg, '#'+attribute.id, {
                tips: [3, '#FFB800'],
                tipsMore: false,
                time:36000000,
                area: ['auto', 'auto']
            });

            $('#'+attribute.id).attr("layer-index", index);
            return false;
        } else {
            layer.close(indexOld);
        }
    });

    $('#layer-form-create').on('beforeValidate', function (event) {
        inValidate = true;
    });


    $('#layer-form-create').on('afterValidate', function (event) {
        inValidate = false;
        var firstObj = $(".form-group.has-error").first().find('.layui-input');
        firstObj.focus();
        firstObj.blur();
        firstObj.focus();
    });

});