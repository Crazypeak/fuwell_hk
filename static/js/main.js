/**
 * Created by Crazypeak on 2017-01-21.
 */

// requirejs(["DOM"], function () {
// });

/*
 * orderPrevBtn 删除订单 驳回订单 测试完成
 * 导入
 * import orderList
 * import orderEdit
 * 审核
 * verify orderList
 * verify orderEdit
 *
 * */
orderPrevBtn.click(function () {
    var thisClssName = $(this).prop("class").toString();
    if ($(this).hasClass("single")) {
        console.log("单个删除");
        var orderId = $(this).data("orderid");

        switch (true) {
            case /(orderVerify)/.test(thisClssName):
                //单个订单撤回
                swal({
                        title: "驳回订单",
                        text: "请填写驳回订单的原因",
                        confirmButtonText: "确认",
                        cancelButtonText: "取消",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        animation: "slide-from-top",
                        inputPlaceholder: ""
                    },
                    function (inputValue) {
                        if (inputValue === false) return false;

                        if (inputValue === "") {
                            swal.showInputError("还没填写驳回原因!");
                            return false
                        }
                        //数据push
                        var formData = new IsSelect();
                        formData.ids.push(orderId);
                        formData.desc = inputValue.toString();
                        formPost(jQuery.param(formData), orderRevUrl);
                    });

                break;

            case /(orderBarn)/.test(thisClssName):
                //单个栏目驳回订单
                // AlertConfirm("栏目确定要驳回该订单吗?", "栏目确定要驳回该订单吗?", "驳回", function () {
                //     var delData = new IsSelect();
                //     delData.ids.push(orderId);
                //     formPost(jQuery.param(delData), orderRevUrl);
                // });

                break;

            case /(navDel)/.test(thisClssName):
                //单个删除单条导航
                AlertConfirm("删除导航?", "删除导航?", "删除", function () {
                    var delData = new IsSelect();
                    delData.id = orderId;
                    console.log(delData);
                    formPost(jQuery.param(delData), navDelUrl);
                });
                break;

            case /(barnDel)/.test(thisClssName):
                //单个删除栏目
                AlertConfirm("删除栏目?", "删除栏目?", "删除", function () {
                    var delData = new IsSelect();
                    delData.id = orderId;
                    console.log(delData);
                    formPost(jQuery.param(delData), barnDelUrl);
                });
                break;


            case /(buyIn)/.test(thisClssName):
                //单个删除采购入库单
                AlertConfirm("删除采购入库单?", "删除采购入库单?", "删除", function () {
                    var delData = new IsSelect();
                    delData.id = orderId;
                    console.log(delData);
                    formPost(jQuery.param(delData), buyInDelUrl);
                });
                break;


            case /(purchaseVerify)/.test(thisClssName):
                //单个入库单驳回
                swal({
                        title: "驳回入库单",
                        text: "请填写驳回入库单的原因",
                        confirmButtonText: "确认",
                        cancelButtonText: "取消",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        animation: "slide-from-top",
                        inputPlaceholder: ""
                    },
                    function (inputValue) {
                        if (inputValue === false) return false;

                        if (inputValue === "") {
                            swal.showInputError("还没填写驳回原因!");
                            return false
                        }

                        //数据push
                        var formData = {};
                        formData.id = orderId;
                        formData.desc = inputValue.toString();
                        formPost(jQuery.param(formData), purchaseVerifyBackUrl);
                    });


                break;
            case /(purchaseDel)/.test(thisClssName):
                //单个入库单删除按钮
                AlertConfirm("删除入库单?", "确定要删除入库单?", "删除", function () {
                    var delData = new IsSelect();
                    delData.id = orderId;
                    console.log(delData);
                    formPost(jQuery.param(delData), purchaseDelUrl);
                });
                break;

            case /(backOrderDie)/.test(thisClssName):
                //单个订单作废按钮
                AlertConfirm("作废订单?", "确定要作废订单?", "作废", function () {
                    var delData = new IsSelect();
                    delData.id = orderId;
                    console.log(delData);
                    formPost(jQuery.param(delData), backOrderDieUrl);
                });
                break;

            case /(contacts)/.test(thisClssName):
                //单个删除客户
                AlertConfirm("删除客户?", "确定要删除客户?", "删除", function () {
                    var delData = new IsSelect();
                    delData.ids = orderId;
                    console.log(delData);
                    formPost(jQuery.param(delData), contactDelUrl);
                });
                break;

            case /(Supplier)/.test(thisClssName):
                //单个删除供应商
                AlertConfirm("删除供应商?", "确定要删除供应商?", "删除", function () {
                    var delData = new IsSelect();
                    delData.ids = orderId;
                    console.log(delData);
                    formPost(jQuery.param(delData), SupplierDelUrl);
                });
                break;
            default :
                //单个订单删除
                AlertConfirm("你确定要删除该订单吗?", "你确定要删除该订单吗?", "删除", function () {
                    var delData = new IsSelect();
                    delData.ids.push(orderId);
                    formPost(jQuery.param(delData), orderDelUrl);
                });
        }
    } else {
        console.log("checkbox选择删除");
        switch (true) {
            case /(orderVerify)/.test(thisClssName):
                //订单批量驳回
                if ($("td input[type='checkbox']").serialize() == "") {
                    AlertWarn("你还没有选择要驳回的订单!", "你还没有选择要驳回的订单!");
                    return;
                }
                swal({
                        title: "驳回订单",
                        text: "请填写驳回订单的原因",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        animation: "slide-from-top",
                        inputPlaceholder: ""
                    },
                    function (inputValue) {
                        if (inputValue === false) return false;

                        if (inputValue === "") {
                            swal.showInputError("还没填写驳回原因!");
                            return false
                        }
                        var formData = new IsSelect();
                        $("td input[type='checkbox']:checked").each(function (i, e) {
                            formData.ids.push($(e).val());
                        });
                        formData.desc = inputValue.toString();
                        formPost(jQuery.param(formData), orderRevUrl);
                    });
                break;


            case /(orderBarn)/.test(thisClssName):
                //栏目批量驳回订单
                if (checkForm.serialize() == "") {
                    AlertWarn("你还没有选择要驳回的订单!", "你还没有选择要驳回的订单!");
                    return;
                }
                swal({
                        title: "驳回订单",
                        text: "请填写驳回订单的原因",
                        confirmButtonText: "确认",
                        cancelButtonText: "取消",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        animation: "slide-from-top",
                        inputPlaceholder: ""
                    },
                    function (inputValue) {
                        if (inputValue === false) return false;

                        if (inputValue === "") {
                            swal.showInputError("还没填写驳回原因!");
                            return false
                        }
                        //数据push
                        var formData = new IsSelect();
                        $("td input[type='checkbox']:checked").each(function (i, e) {
                            formData.ids.push($(e).val());
                        });
                        formData.desc = inputValue.toString();
                        formPost(jQuery.param(formData), orderRevUrl);
                    });

                break;

            case /(contacts)/.test(thisClssName):
                //客户批量删除
                if (checkForm.serialize() == "") {
                    AlertWarn("你还没有选择要删除的客户!", "你还没有选择要删除的客户!");
                    return;
                }
                AlertConfirm("你确定要批量删除客户吗？", "你确定要批量删除客户吗？", "删除", function () {
                    formPost(checkForm.serialize(), contactDelUrl);
                });
                break;

            case /(Supplier)/.test(thisClssName):
                //供应商批量删除
                if (checkForm.serialize() == "") {
                    AlertWarn("你还没有选择要删除的供应商!", "你还没有选择要删除的供应商!");
                    return;
                }
                AlertConfirm("你确定要批量删除供应商吗？", "你确定要批量删除供应商吗？", "删除", function () {
                    formPost(checkForm.serialize(), SupplierDelUrl);
                });
                break;


            default :
                //订单批量删除
                if (checkForm.serialize() == "") {
                    AlertWarn("你还没有选择要删除订单!", "你还没有选择要删除订单!");
                    return;
                }
                AlertConfirm("你确定要批量删除订单吗？", "你确定要批量删除订单吗？", "删除", function () {
                    formPost(checkForm.serialize(), orderDelUrl);
                });
        }

    }
});

/*
 * orderNextBtn 提交订单 审核订单 测试完成
 * 导入
 * import orderList
 * import orderEdit
 * 审核
 * verify orderList
 * verify orderEdit
 *
 * */
orderNextBtn.click(function () {
    var thisClssName = $(this).prop("class").toString();
    if ($(this).hasClass("single")) {
        console.log("单个提交");
        var orderId = $(this).data("orderid");
        switch (true) {
            case /(orderVerify)/.test(thisClssName):
                //审核订单
                console.log("审核订单");
                AlertConfirm("审核订单", "你确定要审核该订单吗？", "审核", function () {
                    var formData = new IsSelect();
                    formData.ids.push(orderId);
                    formPost(jQuery.param(formData), orderVerUrl);
                });
                break;
            case /(orderSupply)/.test(thisClssName):
                //下发订单
                console.log("下发订单");
                AlertConfirm("你确定要下发订单吗？", "你确定要下发订单吗？", "下发", function () {
                    var formData = new IsSelect();
                    formData.ids.push(orderId);
                    formPost(jQuery.param(formData), orderSupUrl);
                });
                break;
            case /(orderBarn)/.test(thisClssName):
                //栏目审核订单
                console.log("栏目审核订单");
                AlertConfirm("栏目确定要审核订单吗？", "栏目确定要审核订单吗？", "审核", function () {
                    var formData = new IsSelect();
                    formData.ids.push(orderId);
                    formPost(jQuery.param(formData), orderVerUrl);
                });
                break;
            case /(navAdd)/.test(thisClssName):
                //新增导航
                console.log("新增导航");
                AlertConfirm("要新增一个导航吗？", "要新增一个导航吗？", "新增", function () {
                    var formData = $("form.navAdd").serialize();
                    console.log(formData);
                    formPost(formData, navAddUrl);
                });
                break;
            case /(orderPack)/.test(thisClssName):
                //栏目完成拣货
                console.log("栏目拣货");
                AlertConfirm("拣货完成", "确定要完成该订单的拣货吗？", "是", function () {
                    formPost(jQuery.param({id: orderId}), orderPackNextUrl);
                });
                break;
            case /(orderShip)/.test(thisClssName):
                //栏目发货
                console.log("栏目发货");
                AlertConfirm("发货", "确定要完成该订单的发货吗？", "是", function () {
                    formPost(jQuery.param({ids: orderId}), orderSendUrl);
                });
                break;
            case /(inventoryVerify)/.test(thisClssName):
                //盘点单审批
                console.log("盘点单审批");
                AlertConfirm("入库审批", "确定要审批该入库记录吗？", "是", function () {
                    formPost(jQuery.param({id: orderId}), inventoryVerifyUrl);
                });
                break;

            case /(goodsVerify)/.test(thisClssName):
                //入库审核单 商品审核
                console.log("入库审核单 商品审核");
                AlertConfirm("商品审核", "确定要审核该商品吗？", "是", function () {
                    formPost(jQuery.param({id: orderId}), goodsVerifyUrl);
                });
                break;

            case /(backOrderSub)/.test(thisClssName):
                //驳回订单的订单重新提交按钮
                console.log("驳回订单的订单重新提交");
                AlertConfirm("提交订单", "确定要重新提交该订单吗？", "是", function () {
                    formPost(jQuery.param({id: orderId}), backOrderSubUrl);
                });
                break;

            // case /(orderVerify)/.test(thisClssName):
            //     //订单审核
            //     console.log("订单审核");
            //     AlertConfirm("审核订单", "确定要审核该订单吗？", "是", function () {
            //         formPost(jQuery.param({id: orderId}), orderVerUrl);
            //     });
            //     break;


            case /(purchaseVerify)/.test(thisClssName):
                //审核商品入库提交按钮
                console.log("审核商品入库");
                AlertConfirm("审核商品入库", "确定要审核商品入库吗？", "是", function () {
                    formPost(jQuery.param({id: orderId}), purchaseVerifyUrl);
                });
                break;


            case /(activePurchase)/.test(thisClssName):
                //入库单单个商品更改为未完成
                console.log("入库单单个商品更改为未完成");
                AlertConfirm("更改商品状态", "确定要更改商品为未完成吗？", "是", function () {
                    formPost(jQuery.param({id: orderId}), activationUrl);
                });
                break;


            case /(groupPerm)/.test(thisClssName):
                //员工组修改
                console.log("员工组修改");
                AlertConfirm("员工组修改", "确定要修改该员工组权限吗？", "是", function () {
                    var formData = {
                        id: null,
                        rule: []
                    };
                    formData.id = $(".userGroupPermid").val();
                    $('form input[type="checkbox"]:checked').each(function () {
                        formData.rule.push($(this).val());
                    });
                    console.log(formData);
                    formPost(formData, groupPermEditUrl);
                });
                break;
            default :
                //上传提交
                console.log("上传提交");
                AlertConfirm("你确定要提交订单吗？", "你确定要提交订单吗？", "提交", function () {
                    var formData = new IsSelect();
                    formData.ids.push(orderId);
                    formPost(jQuery.param(formData), orderSubUrl);
                });
        }


    } else {
        //orderNextBtn
        console.log("checkbox选择提交");
        console.log(checkForm.serialize());
        switch (true) {
            case /(orderVerify)/.test(thisClssName):
                //批量审核提交
                if (checkForm.serialize() == "") {
                    AlertError("你还没有选择要审核的订单!", "你还没有选择要审核的订单!");
                    return;
                }
                AlertConfirm("你确定要批量审核订单？", "你确定要批量审核订单？", "审核", function () {
                    formPost(checkForm.serialize(), orderVerUrl);
                });

                break;
            case /(orderSupply)/.test(thisClssName):
                //批量下发操作
                if (checkForm.serialize() == "") {
                    AlertError("你还没有选择要下发的订单!", "你还没有选择要下发的订单!");
                    return;
                }
                AlertConfirm("你确定要批量下发订单？", "你确定要批量下发订单？", "下发", function () {
                    formPost(checkForm.serialize(), orderSupUrl);
                });
                break;
            case /(orderBarn)/.test(thisClssName):
                //批量栏目审核操作
                if (checkForm.serialize() == "") {
                    AlertError("你还没有选择要审核的订单!", "你还没有选择要审核的订单!");
                    return;
                }
                AlertConfirm("栏目确定要批量审核订单？", "栏目确定要批量审核订单？", "审核", function () {
                    formPost(checkForm.serialize(), orderVerUrl);
                });
                break;
            case /(orderShip)/.test(thisClssName):
                //批量栏目发货
                console.log("批量栏目发货");
                if (checkForm.serialize() == "") {
                    AlertError("发货失败!", "你还没有选择要发货的订单或订单已发货!");
                    return;
                }
                AlertConfirm("发货", "确定要完成该订单的发货吗？", "是", function () {
                    formPost(checkForm.serialize(), orderSendUrl);
                });
                break;
            default :
                //批量上传提交
                if (checkForm.serialize() == "") {
                    AlertError("你还没有选择要提交订单!", "你还没有选择要提交订单!");
                    return;
                }
                AlertConfirm("你确定要批量提交订单？", "你确定要批量提交订单？", "提交", function () {
                    formPost(checkForm.serialize(), orderSubUrl);
                });
        }

    }
});

//添加删除事件
$(".goodsAddOneDel").click(function () {
    //新增订单新增商品 删除按钮
    //找到对应行的id
    var del = $.trim($(this).closest("tr").find(".goodsBatch").text());
    console.log("要删除的商品：" + del);
    //删除在记录的id
    addGoodsMark.remove(del.toString());
    $(this).closest("tr").remove();
    console.log(addGoodsMark);
});


//新建采购入库单  商品搜索 Selete2Init 初始化
function buyInGoodsSelete2Init() {

    $(".goodsAddCodeSelect").select2({
        placeholder: "输入 商品名称、条形码 搜索",
        minimumInputLength: 2,
        language: "zh-CN",
        cache: true,
        escapeMarkup: function (markup) {
            //console.debug(markup);
            return markup;
        },
        ajax: {
            url: goodsEditSearchUrl,
            dataType: 'json',
            delay: 100,
            cache: true,
            data: function (params) {
                return {
                    key: params.term
                };
            },
            processResults: function (data) {
                //console.log(data);
                var processData = [];
                for (key in data) {
                    var b = new SearchResult();
                    b.id = data[key].id;
                    b.name = data[key].name;
                    b.bar_code = data[key].bar_code;
                    b.selling_price = data[key].selling_price;
                    b.supply_price = data[key].supply_price;
                    b.currency = data[key].currency;
                    b.model = data[key].model;
                    b.unit = data[key].unit;

                    processData.push(b);
                    //console.log(b);
                    //console.log(data[key]);
                    //console.log(processData);//返回查询出来的数组
                }
                return {
                    results: processData
                };
            }
        },
        templateResult: formatGoodsList,
        templateSelection: buyInGoodsListSelection
    });
    $(".select2-selection__placeholder").text("输入 商品名称、条形码 搜索");
    $(".goodsAddCodeSelect").on('select2:select', function () {
        $(".goodsAddCodeSelect").val('').trigger("change");
    })

}

//新增采购入库单 Select2下拉数据填充
function formatGoodsList(repo) {
    console.log(repo);
    if (repo.id == undefined || repo.bar_code == undefined) {
        return;
    }
    // return '<ul class="list-unstyled">' + '<li>' + '正在搜索中…' + '</li>' + '</ul>';

    var markup =
        '<ul class="list-unstyled">' +
        '<li>' + '条形码：' + repo.bar_code +
        '&nbsp;&nbsp;&nbsp;&nbsp;规格：' + repo.model +
        '&nbsp;&nbsp;&nbsp;&nbsp;单位：' + repo.unit + '</li>' +
        '<li>' + '商品名称：  ' + repo.name + '</li>' +
        '<li>' + '参考销售价：&#65509;' + repo.selling_price +
        '&nbsp;&nbsp;&nbsp;&nbsp;参考供货价：&#65509;' + repo.supply_price +
        '&nbsp;&nbsp;&nbsp;&nbsp;币种：' + repo.currency + '</li>' +
        '</ul>';
    return markup;
}

//入库单采购商品搜索  Select2选择处理
function buyInGoodsListSelection(repo) {
    console.log(repo);
    if (repo.id == '') {
        return;
    }
    //每条选择的显示内容
    //goodsid
    $("#NewgoodsId").val(repo.id);
    //供货价 销售价 input:text
    $("#Newselling_price").val(repo.selling_price);
    $("#Newsupply_price").val(repo.supply_price);
    //币种
    switch (repo.currency) {
        case "CNY":
            $("#NewgoodsCurrency").find("option[value='CNY']").prop("selected", true);
            break;
        case "AUD":
            $("#NewgoodsCurrency").find("option[value='AUD']").prop("selected", true);
            break;
        case "HKD":
            $("#NewgoodsCurrency").find("option[value='HKD']").prop("selected", true);
            break;
        case "NZD":
            $("#NewgoodsCurrency").find("option[value='NZD']").prop("selected", true);
            break;
        default:

    }
    //$("#NewgoodsCurrency").val(repo.currency);
    //条形码 品名
    $("#NewgoodsBar_code").text(repo.bar_code);
    $("#NewgoodsName").text(repo.name);
    //规格单位
    $("#NewgoodsModel").text(repo.model);
    $("#NewgoodsUnit").text(repo.unit);


    return;

}

/*
 *
 * 订单功能
 *
 *
 * */

//新建订单 的商品搜索 Selete2Init 初始化
function orderAddSelete2Init() {
    //编辑商品，记录订单本来存在的id
    $("tr.goodsTableTr").each(function (i, e) {
        //oldMark 只用来记录原来有的 识别id 只有删不会多
        oldMark.push($.trim($(e).find(".oldId").text()));
        //oldMark 只用来记录原来有的 识别id 只有删不会多
        addGoodsMark.push($.trim($(e).find(".goodsBatch").text()));
    });
    console.log("旧的识别id: " + oldMark);
    console.log("新的识别id: " + addGoodsMark);
    //oldMark 只用来记录原来有的 识别id 只有删不会多
    $("tr.goodsTableTr").each(function (i, e) {
        oldMark.push($.trim($(e).find(".oldId").text()));
    });


    //初始化搜索器
    $("#addGoodsModal .goodsAddCodeSelect").select2({

        placeholder: "输入 商品名称、条形码搜索",
        minimumInputLength: 2,
        language: "zh-CN",
        cache: true,
        escapeMarkup: function (markup) {
            return markup;
        },
        ajax: {
            url: goodsSearchUrl,
            dataType: 'json',
            delay: 100,
            data: function (params) {
                // console.log(params);
                // console.log(select_depot_id);
                return {
                    key: params.term,
                    depot_id: select_depot_id
                };
            },
            processResults: function (data) {
                //console.log(data);
                var processData = [];
                for (key in data) {
                    var b = {};
                    b.id = key;
                    b.bar_code = data[key].bar_code;
                    b.product_code = data[key].product_code;
                    b.name = data[key].name;

                    b.model = data[key].model;
                    b.unit = data[key].unit;

                    b.currency = data[key].currency;
                    b.selling_price = data[key].selling_price;
                    b.supply_price = data[key].supply_price;
                    //批次号 生产/过期日期 与识别id
                    b.batch = data[key].batch;
                    processData.push(b);
                    //console.log(b);
                    //console.log(data[key]);
                    console.log(processData);//返回查询出来的数组
                }
                return {
                    results: processData
                };
            }
        },
        templateResult: formatNewOrderGoodsList,
        templateSelection: formatNewOrderGoodsListSelection
    });
    $("#addGoodsModal .select2-selection__placeholder").text("输入 商品名称、条形码搜索");
    $("#addGoodsModal .goodsAddCodeSelect").on('select2:select', function () {
        $("#addGoodsModal .goodsAddCodeSelect").val('').trigger("change");
    })

}

//新增订单商品 Select2下拉数据填充
function formatNewOrderGoodsList(repo) {
    //console.log(repo);
    if (repo.id == undefined || repo.bar_code == undefined) {
        return;
    }
    // return '<ul class="list-unstyled">' + '<li>' + '正在搜索中…' + '</li>' + '</ul>';
    // '&nbsp;&nbsp;&nbsp;&nbsp;规格：' + repo.model +
    // '&nbsp;&nbsp;&nbsp;&nbsp;单位：' + repo.unit +
    // '参考销售价：&#65509;' + repo.selling_price +
    // '&nbsp;&nbsp;&nbsp;&nbsp;参考供货价：&#65509;' + repo.supply_price +
    // '&nbsp;&nbsp;&nbsp;&nbsp;币种：' + repo.currency +
    var markup;
    markup =
        '<ul class="list-unstyled">' +
        '<li>' +
        '条形码：' + repo.bar_code +
        '</li>' +
        '<li>' +
        '货号：' + repo.product_code +
        '</li>' +
        '<li>' +
        '商品名称：  ' + repo.name +
        '</li>' +
        '</ul>';

    return markup;
}

//新增订单商品  Select2选择处理
function formatNewOrderGoodsListSelection(repo) {
    console.log(repo);
    if (repo.id == '') {
        return;
    }

    if (repo.batch == '') {
        AlertWarn("不能添加", "你所选定的商品没有库存！");
        return;
    }

    // b.id = key;
    // b.bar_code = data[key].bar_code;
    // b.product_code = data[key].product_code;
    // b.name = data[key].name;
    //
    // b.model = data[key].model;
    // b.unit = data[key].unit;
    //
    // b.currency = data[key].currency;
    // b.selling_price = data[key].selling_price;
    // b.supply_price = data[key].supply_price;
    // //批次号 生产/过期日期 与识别id
    // b.batch = data[key].batch;

    //每条选择的显示内容
    //条形码 品名
    $("#NewgoodsBar_code").text(repo.bar_code);
    $("#NewgoodsProduct_code").text(repo.product_code);
    $("#NewgoodsName").text(repo.name);


    //供货价 销售价
    //$("#Newgoodsselling_price").text(repo.selling_price);
    //币种
    //$("#Newgoodscurrency").text(repo.currency);
    //$("#Newgoodssupply_price").text(repo.supply_price);

    //规格单位
    $("#NewgoodsModel").text(repo.model);
    $("#NewgoodsUnit").text(repo.unit);
    //选择商品后，在没有现在批次前清空批次数据
    $("#NewgoodsMfg").text("");
    $("#NewgoodsExp").text("");
    $("#Newgoodsselling_price").text("");
    $("#Newgoodscurrency").text("");
    // //销售库存  实际库存
    $("#NewgoodsStock_false").text("");
    $("#NewgoodsStock_true").text("");
    //选择商品后，在没有现在批次前清空批次数据

    //批次下拉处理
    var batch = repo.batch;
    console.log(batch);
    //清空
    $("#NewgoodsBatch").find('option')
        .remove()
        .end()
        .append('<option value="" selected="selected">选择批次号</option>')
        .val("");
    //填充批次下拉菜单
    for (var key in batch) {
        console.log();
        $(batch[key]).each(function (i, e) {
            console.log($(e)[0]);

            var mfg = $(e)[0].mfg_date;
            var exp = $(e)[0].exp_date;
            var code = $(e)[0].batch_code;
            var id = $(e)[0].id;
            //'<option disabled >' '</option>'
            $("#NewgoodsBatch")
                .append(
                    '<option value="' +
                    id +
                    '">' +
                    code +
                    '</option>')
                .val('');
        });
    }

    //填充到批次下拉列表后监听 下拉选择

    $('#NewgoodsBatch').change(function () {

        var Batch_code = {
            id: $(this).val()
        };

        $.ajax({
            type: "POST",
            data: Batch_code,
            url: goodsBatchSearchUrl,
            success: function (data) {
                if (data) {
                    console.log(data);
                    $("#NewgoodsMfg").text(data.mfg_date);
                    $("#NewgoodsExp").text(data.exp_date);
                    $("#Newgoodsselling_price").text(data.selling_price);
                    $("#Newgoodscurrency").text(data.currency);

                    // //销售库存  实际库存
                    $("#NewgoodsStock_false").text(data.stock_false);
                    $("#NewgoodsStock_true").text(data.stock_true);

                }
            },
            error: function () {
                console.warn("草泥马没有查询到数据")
            }
        });


    });


}


//客户搜索器 Selete2Init 初始化
function contactSelectInit(url) {
    var S2 = $(".contactAddSelect");
    //初始化搜索器
    S2.select2({
        placeholder: "输入客户信息进行搜索",
        minimumInputLength: 2,
        language: "zh-CN",
        cache: true,
        escapeMarkup: function (markup) {
            return markup;
        },
        ajax: {
            url: url,
            dataType: 'json',
            delay: 800,
            data: function (params) {
                // console.log(params);
                // console.log(select_depot_id);
                return {
                    key: params.term
                };
            },
            processResults: function (data) {
                console.log(data);
                var processData = [];
                for (var key in data) {
                    var b = {};
                    b.id = key;
                    b.name = data[key].name;
                    b.phone = data[key].phone;
                    b.address = data[key].address;

                    processData.push(b);
                    //console.log(b);
                    //console.log(data[key]);
                    console.log(processData);//返回查询出来的数组
                }
                return {
                    results: processData
                };
            }
        },
        templateResult: contactSelectList,
        templateSelection: contactSelection
    });
    S2.find(".select2-selection__placeholder").text("输入客户信息进行搜索");
    S2.on('select2:select', function () {
        $(this).val('').trigger("change");
    })
}

//Select2下拉数据填充
function contactSelectList(repo) {
    //console.log(repo);
    if (repo.id === undefined) {
        return;
    }
    var markup;
    markup =
        '<ul class="list-unstyled">' +
        '<li>' +
        '客户：' + repo.name + '&nbsp;&nbsp;&nbsp;&nbsp;' + '电话：' + repo.phone +
        '</li>' +
        '<li>' +
        '地址：  ' + repo.address +
        '</li>' +
        '</ul>';
    return markup;
}

//Select2选择处理
function contactSelection(repo) {
    console.log(repo);
    if (repo.id === undefined) {
        return;
    }
    //每条选择的显示内容
    $("input[name='cg_name']").val(repo.name);
    $("input[name='cg_phone']").val(repo.phone);
    $("input[name='cg_address']").val(repo.address);
}


//新增商品弹窗确认按钮
goodsAddContinueBtn.click(function () {
    //禁用
    $(this).prop("disabled", true);


    // //读取当前批次号
    //var barch_code = $("#NewgoodsBatch").val();
    var canAddtoTable = true;

    function orderAddtemplate() {

        //单个商品模板

        // <th>商品名称</th>
        //     <th width="190px">平台货号</th>
        //         <th width="190px">条形码</th>
        //<th width="190px">平台货号</th>
        //         <th width="100px">销售价</th>
        //         <th width="75px">币种</th>
        //         <th width="75px">数量</th>
        //         <th width="75px">规格</th>
        //         <th width="75px">单位</th>
        //         <th width="75px">操作</th>

        //日期
        // '<td class="mfg_date">' + $("#MfgDatepicker").val() + '</td>' +
        // '<td class="exp_date">' + $("#ExpDatepicker").val() + '</td>' +

        var template =
            '<tr class="goodsTableTr">' +
            //NewgoodsBatch goodsBatch 用于判断 商品批次号是否冲突的
            '<td style="display: none;" class="goodsBatch">' + $("#NewgoodsBatch").val() + '</td>' +
            '<td style="display: none;" class="product_code">' + $("#NewgoodsProduct_code").text() + '</td>' +
            '<td>' + $("#NewgoodsName").text() + '</td>' +
            //选中的批次号text
            '<td class="batch_code">' + $("#NewgoodsBatch option:selected").text() + '</td>' +
            '<td>' + $("#NewgoodsProduct_code").text() + '</td>' +
            '<td>' + $("#NewgoodsBar_code").text() + '</td>' +

            //销售价
            '<td class="selling_price">' + Number($("#Newgoodsselling_price").val()).toFixed(2) + '</td>' +
            //币种
            '<td class="currency">' + $("#NewgoodsCurrency").val() + '</td>' +
            '<td class="CNY_rate">' + Number($("#NewgoodsRate").val()).toFixed(4) + '</td>' +

            //数量
            '<td class="amount">' + Number($("#NewgoodsNum").val()) + '</td>' +
            //规格 单位
            '<td>' + $("#NewgoodsModel").html() + '</td>' +
            '<td>' + $("#NewgoodsUnit").html() + '</td>' +

            //操作
            '<td>' +
            '<a href="javascript:void(0);" class="text-danger goodsAddOneDel">' +
            '<i class="fa fa-trash fa-fw"></i>' + '删除' +
            '</a>' + '</td>' + '</tr>';

        return template;

    }


    // //单个商品模板
    // var template =
    //     '<tr>' +
    //     '<td>' + $("#NewgoodsName").text() + '</td>' +
    //     '<td class="OrderGoods">' + $("#NewgoodsProduct_code").text() + '</td>' +
    //     '<td>' + $("#NewgoodsBar_code").text() + '</td>' +
    //     '<td>' + $("#NewgoodsPrice").html() + '</td>' +
    //     '<td>' + $("#NewgoodsNum").val() + '</td>' +
    //     '<td>' + $("#NewgoodsModel").html() + '</td>' +
    //     '<td>' + $("#NewgoodsUnit").html() + '</td>' +
    //     '<td>' + '<a href="javascript:void(0);" class="text-danger NewOrderGoodsSingleDel">' + '<i class="fa fa-trash"></i>' + '&nbsp;&nbsp;删除' + '</a>' + '</td>' +
    //     '</tr>';

    // var goodsProductCode = $.trim($("#NewgoodsProduct_code").text());
    // addTotable.name = $("#NewgoodsName").text();

    //弹窗中找到 批次唯一id 填入记录中
    var markOneId = $.trim($("#NewgoodsBatch").val());
    //数量判断
    var num = Number($("#NewgoodsNum").val());
    var currency = $("#NewgoodsCurrency").val();
    var currencyRate = $("#NewgoodsRate").val();
    var selling_price = Number($("#Newgoodsselling_price").val());
    var markOneName;


    if ($("#NewgoodsBar_code").text() !== "") {
        //判空addGoodsMark
        canAddtoTable = (addGoodsMark.length == 0) ? true : false;
        //当前是否选择了批次号
        console.log("当前批次识别号为" + markOneId);
        if (markOneId == "") {
            AlertWarn("请先选择商品批次号！", "");
            goodsAddContinueBtn.prop("disabled", false);
            return false;
        }

        if (!isInteger(num) || (num <= 0)) {
            //输入的数量判空
            AlertWarn("填写有误", "请准确填写该商品的数量！");
            goodsAddContinueBtn.prop("disabled", false);
            return false;
        }

        if (!Number(currencyRate) || (num <= 0)) {
            //输入的汇率
            AlertWarn("填写有误", "请准确填写汇率！");
            goodsAddContinueBtn.prop("disabled", false);
            return false;
        }

        if (!Number(selling_price) || (selling_price <= 0)) {
            //输入的销售价判空
            AlertWarn("填写有误", "请准确填写该商品的销售价！");
            goodsAddContinueBtn.prop("disabled", false);
            return false;
        }

        if (currency === "") {
            AlertWarn("填写有误", "请选择该商品的币种！");
            goodsAddContinueBtn.prop("disabled", false);
            return false;
        }

        $(addGoodsMark).each(function (i, e) {
            //检查当前增加商品是否在编辑列表中
            if (e == markOneId) {
                canAddtoTable = false;
                //AlertWarn("请注意！ 列表中已有重复的商品", addTotable.name);
                markOneName = $("#NewgoodsName").text();
                console.log("发现相同的商品");
                return false;
            } else {
                canAddtoTable = true;
                console.log("未发现相同的商品");
            }
        });

        console.log(canAddtoTable);
        if (canAddtoTable) {
            //判断重复能否添加
            //增加商品到表格中
            $(orderAddtemplate()).appendTo($("tbody.goodsTable"));
            //清空
            goodsAddModalClear();
            //新增的批次号id 放入增加列表
            addGoodsMark.push(markOneId);
            console.log(addGoodsMark);
            //添加删除事件
            $(".goodsAddOneDel").click(function () {
                //新增订单新增商品 删除按钮
                //找到对应行的id
                var del = $.trim($(this).closest("tr").find(".goodsBatch").text());
                console.log("要删除的商品：" + del);
                //删除在记录的id
                addGoodsMark.remove(del.toString());
                $(this).closest("tr").remove();
                console.log(addGoodsMark);
            });

            if ($(this).hasClass("goodsAddSaveBtn")) {
                goodsAddModalClear();
                //隐藏弹窗
                $('#addGoodsModal').modal('hide');
                $(this).prop("disabled", false);

            } else {
                //继续添加 不关闭窗口 清空内容
                goodsAddModalClear();
                addGoodsTips.show().delay(3000).fadeOut();
                $(this).prop("disabled", false);
            }

        } else {
            //判断重复能否添加
            AlertWarn("列表中已有重复的商品", markOneName);
            //goodsAddModalClear();
            goodsAddContinueBtn.prop("disabled", false);
            console.log(markOneName);
        }


    } else {
        //判空是否搜索了商品
        AlertWarn("请先搜索", "请先搜索选择商品后才能添加！");
        goodsAddContinueBtn.prop("disabled", false);
    }


});
//新增订单新增商品 删除按钮
$(".NewOrderGoodsSingleDel").click(function () {
    var del_product_code = $.trim($(this).closest("tr").find(".OrderGoods").html());
    console.log("要删除的商品：" + del_product_code);
    //删除在记录的平台货号
    addGoodsMark.remove(del_product_code.toString());
    $(this).closest("tr").remove();
    console.log(addGoodsMark);
});

//订单内切换栏目事件监听
$(".newOrderInfo select[name='depot_id'], .editOrderInfo select[name='depot_id']").on('focus', function () {
    old_select_depot_id = $(this).val();
    console.log("旧的值是： " + old_select_depot_id);
}).change(function () {
    if (old_select_depot_id == "") {
        return false;
    } else {
        var this_select = $(this);
        select_depot_id = $(this).val();
        console.log("新的值是： " + select_depot_id);
        AlertConfirm("切换栏目",
            "切换栏目后该订单的数据不会被保存，你确定要这样吗做吗？",
            "切换",
            function () {
                ClearTable("tbody.goodsTable tr:first");
                swal.close();
            },
            function () {
                $(this_select).val(old_select_depot_id);
                swal.close();
            }
        );
    }
});


/*
 *
 *
 * 修改订单信息
 *
 *
 * */
//修改订单信息弹窗
orderEditBtn.click(function () {
    $('#modOrderModal').modal({backdrop: 'static'});
    $('#modOrderModal').find('input').on('keydown', function (event) {
        if (event.keyCode == 13) {
            orderEditConfirmBtn.click();
        }
    });


    provinceSelect.on("select2:select", function (e) {
        console.log(loc.commit);
        $("[name='cg_province']").val($('#loc_province').select2('data')[0].text.toString());
        loc.commit = false;

    });
    citySelect.on("select2:select", function (e) {
        console.log(loc.commit);
        $("[name='cg_city']").val($('#loc_city').select2('data')[0].text.toString());

        loc.commit = false;

    });
    areaSelect.on("select2:select", function (e) {
        console.log(loc.commit);
        $("[name='cg_area']").val($('#loc_town').select2('data')[0].text.toString());
        loc.commit = true;
    });

});
//修改订单信息弹窗确认按钮
orderEditConfirmBtn.click(function () {

    if (loc.commit) {
        var orderEditInfo = $("form.OrderEdit").serialize();
        console.log(orderEditInfo);
        swal({
                title: "确认修改该订单吗?",
                text: "确认修改该订单吗?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "修改",
                closeOnConfirm: false
            },
            function () {
                orderAddPost(orderEditInfo, orderEditUrl);
            });
    } else {
        swal("", "请填写省市区!", "error");
        console.log($('#loc_province').select2('data')[0].text);
        console.log($('#loc_city').select2('data')[0].text);
        console.log($('#loc_town').select2('data')[0].text);

    }

});


//修改订单信息 Post操作
function orderAddPost(orderInfo, PostUrl) {
    console.log(PostUrl);
    $.ajax({
        type: "POST",
        data: orderInfo,
        url: PostUrl,
        async: false,
        success: function (data) {
            orderApiSuccess(data, "请稍等 正在跳转到该订单")
        },
        error: function () {
            swal("操作失败!", "网络链接失败或服务器错误!", "error")
        }
    });

}

//Ajax操作 POST成功回调
function orderApiSuccess(data, SuccessText) {
    console.log(data);
    var returnCode = data.code;
    var returnTime = data.wait;
    var returnMsg = data.msg;
    arguments[1] == undefined ? "请稍等 正在跳转" : SuccessText;
    if (returnCode === 1) {

        swal({
                title: returnMsg,
                type: "success",
                text: arguments[1],
                timer: parseInt((returnTime - 2) * 1000),
                showConfirmButton: false
            },
            function () {
                // setTimeout(function () {
                //     window.location = data.url;
                // }, waitTime);
                if (data.url) {
                    window.location = data.url;
                }


            });
    }
    if (returnCode === 0) {
        console.log(returnCode);
        // if typeof (JSON.parse(data.msg.toString())) == "object"
        //code = 0
        AjaxReturnZero(data);
    }
}

//拣货操作 POST成功回调
function ScanApiSuccess(data, currentPackingNum) {
    var packingBtn = $(".packingBtn");
    var packingTips = $(".packingTips");
    console.log(data);
    if (data.code > 0) {
        var waitTime = (parseInt(data.wait)) * 1000;
        currentProductID = data.code;
        packingTips.text("本次拣货成功！").removeClass("text-red").addClass("text-green");
        var t = setTimeout(function () {
            clearTimeout(t);
            packingTips.text("请进行拣货操作").removeClass("text-green").addClass("text-red");
            packingBtn.prop("disabled", false);
        }, waitTime);
        progressWidthChange(currentProductID, currentPackingNum);
        currentProductID = null;
    }
    if (data.code == 0) {
        AjaxReturnZero(data);
        packingBtn.prop("disabled", false);
        progressWidthCalc();
        orderNextCheck();
    }
}
//订单搜索 Post操作
function orderSearchPost(orderSearchData, Url) {
    $.ajax({
        type: "GET",
        data: orderSearchData,
        url: Url,
        async: false,
        success: function (data) {
            orderApiSuccess(data, "请稍等 正在跳转到搜索结果");
        },
        error: function () {
            swal("操作失败!", "网络链接失败或服务器错误!", "error")
        }
    });
}

/**
 *
 *
 * 拣货函数
 *
 **/

//拣货页面进度条长度计算
function progressWidthCalc() {
    var allProgressBar = $(".table .progress-bar");
    allProgressBar.each(function (index, e) {
        var productPackedCount = $(e).data("productpackedcount");
        var productCount = $(e).data("productcount");
        $(this).attr("style", "width:" +
            Math.ceil(productPackedCount * 10 / productCount * 10) + "%"
        );
    })
}
//拣货页面进度条数据更新
function progressWidthChange(productId, packingNum) {
    var alltr = $(".table tr[data-productID]");
    alltr.each(function (index, e) {
        var id = $(e).data("productid");
        var oldPackedCount = parseInt($(e).find(".progress-bar").data("productpackedcount"), 10);
        var oldCount = parseInt($(e).find(".progress-bar").data("productcount"), 10);
        var packedText = $(e).find(".packedText").html();
        if (id == productId) {
            if (packingNum > (oldCount - oldPackedCount)) {
                alert("范围超出");
                return false;
            } else {
                console.log("原来已拣货数量" + oldPackedCount);
                console.log("现在已拣货数量" + parseInt((oldPackedCount + packingNum), 10));
                $(e).find(".progress-bar").data("productpackedcount", oldPackedCount + packingNum);
                $(e).find(".progress-bar").attr("data-productpackedcount", oldPackedCount + packingNum);
                $(e).find(".packedText").html(parseInt(packedText, 10) + packingNum);
            }
            orderNextCheck();
        }

    });
    progressWidthCalc();

}
//拣货页面 提交按钮检查
function orderNextCheck() {
    var allProgressBar = $(".table .progress-bar");
    var orderNextBtn = $(".orderNextBtn");
    var packingBtn = $(".packingBtn");
    var packingTips = $(".packingTips");


    allProgressBar.each(function (index, e) {
        var productPackedCount = $(e).data("productpackedcount");
        var productCount = $(e).data("productcount");
        if (productPackedCount == productCount) {
            orderNextBtn.addClass("scanFinish");
            orderNextBtn.prop("disabled", false);
            packingBtn.prop("disabled", true);
        } else {
            orderNextBtn.addClass("scanUnFinish");
            orderNextBtn.prop("disabled", true);
            packingBtn.prop("disabled", false);
            console.log("还有未完成的扫描");
            return false;
        }

    });
    if (orderNextBtn.prop("disabled") == false) {

        console.log(orderNextBtn.attr("disabled"));
        var t = setTimeout(function () {
            packingTips.text("已完成所有商品拣货").removeClass("text-red").addClass("text-green");
            packingBtn.attr("disabled", (!(orderNextBtn.attr("disabled"))));
        }, 2000);
    }

}
//ScanPost 拣货一次
function scanPost(formData, Url, currentPackingNum) {
    console.log("进行拣货Post");
    var packingBtn = $(".packingBtn");
    var packingTips = $(".packingTips");
    $.ajax({
        type: "POST",
        url: Url,
        data: formData,
        //async: false,
        success: function (data) {
            ScanApiSuccess(data, currentPackingNum);
            $(".scanCode").val("");
        },
        error: function (data) {
            var waitTime = (parseInt(data.wait)) * 1000;
            packingTips.text("本次拣货失败！");
            var t = setTimeout(function () {
                clearTimeout(t);
                packingTips.text("请进行拣货操作");
                packingBtn.prop("disabled", false);
            }, waitTime);
            AlertError("操作失败!", "网络链接失败 或 服务器错误!");
            $(".scanCode").val("");
        }
    });
}

//清除新增商品弹窗内容
function goodsAddModalClear() {
    var rate = $('#NewgoodsRate').val();

    $('#addGoodsModal .form-group div label').text("");

    $('#addGoodsModal .form-group div input').val("");

    $('#NewgoodsRate').val(rate);

    $("#NewgoodsBatch")
        .find('option')
        .remove()
        .end()
        .append('<option value="" selected>请选择批次号</option>')
        .val('whatever');

}

//清除新增入库单内容
function purchaseAddclear() {

    var rate = $("#NewgoodsRate").val();

    $("form.purchaseAddOne .row:last input").each(function (i, e) {
        $(e).val("");

    });
    $("form.purchaseAddOne .row:last .form-group div label").each(function (i, e) {
        $(e).text("");

    });
    $("form.purchaseAddOne input#NewgoodsNum").val("");
    // $("form.purchaseAddOne input#NewgoodsNum").trigger("focus").val("1");

    $("#NewgoodsRate").val(rate);
}
//清空form内的 input text checkbox select
function formClear(formDOM) {
    console.log(formDOM);
    $(formDOM).find(".form-group div input[type='text']").val("");
    $(formDOM).find(".form-group div input[type='radio']").prop("checked", false);
    $(formDOM).find(".form-group div select").val("").trigger('change');
    $(formDOM).find(".form-group div input[type='radio']").iCheck('uncheck');
    console.log("InputClear");

}

//清除提交表单内的input/label value/// 在入库单和订单 的新增里有用
function formInputClear(formDOM) {
    console.log(formDOM);
    $(formDOM).find(".form-group div input").val("");
    $(formDOM).find(".form-group div select").val("").trigger('change');
    $(formDOM).find(".form-group div label").text("");
    console.log("InputClear");
}


//客户关联的业务员搜索
function userAddSelectInit(data) {
    //console.log("客户关联的业务员搜索");
    userAddSelect.select2({
        placeholder: "输入要关联的业务员名称",
        language: "zh-CN",
        minimumResultsForSearch: Infinity,
        cache: true,
        escapeMarkup: function (markup) {
            return markup;
        },
        data: data
    })
}

// //编辑信息时默认的多选项
// function UserListSetSelect(preData) {
//     console.log(preData);
//     if (preData.length === 0) {
//         return false;
//     }
//     var allVal = [];
//     for (var i in preData) {
//         allVal.push(Number(i));
//     }
//     userEditSelect.val(allVal).trigger('change');
//
// //        var data = [];
// //        var single = {};
// //        for (var i in preData) {
// //            var $option = $("<option selected></option>").val(i).text(preData[i]);
// //            userEditSelect.append($option).trigger('change');
// //            $option.removeData();
// //        }
// }

//设置客户评级
function userRatingSetting(id, score) {
    $.post(contactSetRatingUrl, {id: id, number: score}, function () {
        //AlertSuccess("评价成功", "已成功评价该客户", null);
    }).error(function () {
        AlertError("操作失败!", "网络链接失败 或 服务器错误!", function () {
            location.reload(true);
        });
    })
}