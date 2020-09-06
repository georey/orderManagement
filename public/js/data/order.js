$(function(){
    const $order_detail = $(".order_detail");
    const $modal_info = $("#modal_info");

    const setDetailInfo = function(){
        $order_detail.click(function(){
            let data = JSON.stringify($(this).data('json')[0], undefined, 4);
            var obj = {
                "prop_1": {
                    "prop_11": "val_11",
                    "prop_12": "val_12"
                },
                "prop_2": "val_2",
                "prop_3": "val_3"
            };

            //$modal_info.html(JSON.stringify(obj, undefined, 4));
            $modal_info.html(data);
        });
    };

    const init = function () {
        setDetailInfo();
    };

    init();
});
