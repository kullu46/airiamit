jQuery(function($){
    var canBeLoaded = true;
    /*if($(document).find('.project-filters').length){
        $(document).find('select[name="project[city]"]').on("change", function(){
            canBeLoaded = true;
            var selected = $(this).find("option:selected").val(),
                ajaxLoader = $(document).find('.vip-projects .ajax-loader'),
                data = {
                    action: "nh_loadmore",
                    total: items_per_page,
                    page: 1,
                    location: selected
                };
            $(document).find('.vip-projects').attr('data-filter-location', selected);
            ajaxLoader.fadeIn();
            $.ajax({
                url : ajaxurl,
                data: data,
                type:"POST",
                success:function(data){
                    data = JSON.parse(data);
                    if(data.html) {
                        $(document).find('.vip-projects .no-results').remove();
                        $(document).find('.vip-projects .vip-projects-list').html(data.html);
                    }
                    ajaxLoader.fadeOut();
                },
                error: function(data){
                    ajaxLoader.fadeOut();
                }
            });
        });
    }
    if($(document).find('.vip-projects').length){
        var ajaxLoader = $(document).find('.vip-projects .ajax-loader'),
            current_page = 2,
            items_per_page = 6,
            bottomOffset = 2000,
            filterLocation = "";

        $(window).scroll(function(){
            if($(document).find('.project-filters').length){
                var selected = $(document).find('.vip-projects').attr('data-filter-location') || "";
                if(selected != ""){
                    filterLocation = selected;
                }
            }
            var data = {
                    action: "nh_loadmore",
                    total: items_per_page,
                    page: current_page,
                    location: filterLocation
                };
            if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
                ajaxLoader.fadeIn();
                $.ajax({
                    url : ajaxurl,
                    data: data,
                    type:"POST",
                    beforeSend: function( xhr ){
                        canBeLoaded = false; 
                    },
                    success:function(data){
                        data = JSON.parse(data);
                        if(data.html) {
                            $(document).find('.vip-projects .vip-projects-list .vc_row:last').after(data.html);
                            if(data.total >= items_per_page){
                                canBeLoaded = true;
                            }
                            current_page++;
                        }
                        ajaxLoader.fadeOut();
                    },
                    error: function(data){
                        ajaxLoader.fadeOut();
                    }
                });
            }
        });
    }*/
});