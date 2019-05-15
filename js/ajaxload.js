//合作伙伴LOGO上传
$(function(){
    $.ajax({
        //请求方式为get
        type:"GET",
        //json文件位置
        url:"data/data.json",
        //返回数据格式为json
        dataType: "json",
        //请求成功完成后要执行的方法
        success: function(data){
            //使用$.each方法遍历返回的数据date,插入到id为#result中
            //goods->商品列表
            var str = '';
            $.each(data.supplier, function (i,n) {
                str += '<div class="sponsor" title="Click to flip">'+
					        '<div class="sponsorFlip">'+
                                '<img src="'+n["image"]+'" alt="'+n["desc"]+'" name-id="'+n["id"]+'" />'+
                            '</div>'+
					    '</div>'
            });
            $("#suppliers").append(str);

        }
    });
});

