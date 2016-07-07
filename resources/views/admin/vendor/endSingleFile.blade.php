        {{-- SingleFile --}}
        $('.uploadFile').click(function(){
            var ele = $(this).data('id');
            $.layer({
                    type : 2,
                    shade: [0.5, '#000',true],
                    border: [0],
                    title: false,
                    closeBtn: false,
                    shadeClose: true,
                    fix: false,
                    iframe : {src: '{{ route('admin.mail.getUploadfile') }}?from='+ ele},
                    area : ['600px' , '250px'],
                    offset : ['', ''],
                    success: function(layero){
                        console.log(layero);
                        $(layero['selector'] + ' .xubox_main').css('border-radius','6px');
                        $(layero['selector'] + ' .xubox_iframe').css('border-radius','6px');
                        /*
                        $('#xubox_layer1 .xubox_main').css('border-radius','3px');
                        $('#xubox_layer1 .xubox_iframe').css('border-radius','3px');
                        */
                    },
                    close : function(index){
                        layer.closeAll();
                    },
                    end : function(index){
                        //location.reload();
                    }
                });
        });
        $('.previewPic').hover(function(){
            var ele = $(this).data('id');
            var pic_url = $.trim($('#'+ele).val());
            //如果不是站内域名，不予预览
            if( pic_url.indexOf('{{ url('') }}') === -1)
            {
                tmp = '<div style="max-width:300px;background-color:#000;min-height:10;"><p style="margin:10px;color:#f00;">没有文件地址,或者文件地址为外链,暂时无法预览!</p></div>';
            }
            else
            {
                tmp = '<div style="max-width: 300px;"><a href="' + pic_url + '" width="300">文件下载</a></div>';
            }
            $('#layerPreviewPic').html(tmp);
            $.layer({
                type : 1,
                title : false,
                fix : false,
                border: [0],
                shade: [0],
                offset:['50px' , ''],
                area : ['300px', 'auto'],
                page : {dom : '#layerPreviewPic'}
            });
        });
