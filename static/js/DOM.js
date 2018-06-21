/**
 * Created by Crazypeak on 2017-02-10.
 */
//box 中的选择
var checkForm = $(".box-body form ");

var addOrderBtn = $("#addOrderBtn");
var confirmNewOrderBtn = $(".confirmNewOrderBtn");
var orderCodeSearchBtn = $("#orderCodeSearchBtn");

//删除、驳回订单
var orderPrevBtn = $(".orderPrevBtn");
//提交、审核订单
var orderNextBtn = $(".orderNextBtn");
var orderEditBtn = $(".orderEditBtn");
var orderEditConfirmBtn = $(".orderEditConfirmBtn");

//搜搜按钮
var SearchBtn = $("#SearchBtn");
var SearchDatePicker = $(".SearchDatePicker");
var SearchMonthPicker = $(".SearchMonthPicker");
//重设密码
var resetPasswordModal = $("#resetPasswordModal");
var resetPasswordBtn = $(".resetPasswordBtn");
var resetPasswordConfirmBtn = $(".resetPasswordConfirmBtn");


//全选checkBox按钮
var checkAllBtn = $("#checkAllBtn");
var checkAllBtnFalse = $("#checkAllBtnFalse");
//表格内所有checkBox
var AllcheckBox = $("table td input[type=checkbox]");

//初始化所有checkBox状态
var checkAllStatus = true;
var checkAllStatusFalse = false;


//全选
checkAllBtn.on("click", function () {
    if (!checkAllStatus) {
        AllcheckBox.each(function () {
            $(this).prop("checked", true);
        });
        checkAllStatus = !checkAllStatus;
    } else {
        AllcheckBox.each(function () {
            $(this).prop("checked", false);
        });
        checkAllStatus = !checkAllStatus;
    }
});
//全选 反选
checkAllBtnFalse.on("click", function () {
    if (!checkAllStatusFalse) {
        AllcheckBox.each(function () {
            $(this).prop("checked", true);
        });
        checkAllStatusFalse = !checkAllStatusFalse;
    } else {
        AllcheckBox.each(function () {
            $(this).prop("checked", false);
        });
        checkAllStatusFalse = !checkAllStatusFalse;
    }
});


//订单内流水图
var orderImageUploadBtn = $("#orderImageUploadBtn");
var imgFile = $("#imgFile");

//流水凭证图选择后上传
var orderImage = $('#orderImage');
var lookImageBtn = $('#lookImageBtn');


imgFile.change(function () {
    var filePath = $(this).val();
    var fileNameArray = filePath.split('.');
    var fileExtension = fileNameArray[fileNameArray.length - 1];
    console.log(fileExtension);
    if ((fileExtension !== "jpg") &&
        (fileExtension !== "png") &&
        (fileExtension !== "JPG")) {
        AlertWarn("无效的文件", "选择文件的格式不正确");
        $(this).val();
    } else {
        orderImageUploadBtn.click();
        readURL(this);
    }
});

orderImageUploadBtn.click(function () {
    if (imgFile[0].files[0] === undefined) {
        AlertWarn("不能上传", "未选择流水凭证图");
        $(this).prop("disabled", false);
        return false;
    }
    var orderImageData = new FormData();
    orderImageData.append('img', imgFile[0].files[0]);
    //订单详情中的上传需要id
    if (typeof orderid !== 'undefined') {
        orderImageData.append('order_id', orderid);
    }

    var a = originFormPost(orderImageData, orderImageUrl, this);
    if (typeof orderid !== 'undefined') {
        //订单详情中的上传
        a.success(function (data) {
            console.log(data);
            if (data.code === 1) {
                swal("完成!", "流水凭证图已上传成功", "success");
                $(".orderImageSelect").hide();
                $(".articleImg").attr('src', data.msg);
            } else {
                AlertError("失败!", data.msg);
            }
        });
        a.error(function () {
            swal("失败!", "请重新上传", "error");
        });

    } else {
        //新建订单上传
        a.success(function (data) {
            swal("完成!", "流水凭证图已上传成功", "success");
            orderImage.attr('src', data);
            $(".orderImage").attr('src', data);
            lookImageBtn.attr('href', data);
            console.log(data);
        });
        a.error(function () {
            swal("失败!", "请重新上传", "error");
        });
    }


});


lookImageBtn.click(function () {
    if ($(this).attr("href") == "#" || $(this).attr("href") == "") {
        AlertWarn("缺失凭证图", "你还没有上传流水凭证图！");
        return false;
    }

});


//新增订单中的新增商品
var orderGoodsAddBtn = $(".orderGoodsAddBtn");
var goodsEditBtn = $(".goodsEditBtn");
//保存和继续添加按钮
var addGoodsTips = $(".addGoodsTips");
var goodsAddContinueBtn = $(".goodsAddContinueBtn, .goodsAddSaveBtn");
//var goodsAddSaveBtn = $(".goodsAddSaveBtn");
var goodsEditConfirmBtn = $(".goodsEditConfirmBtn");

// var singleGoodsDelBtn = $(".singleGoodsDelBtn");
// var multiGoodsDelBtn = $(".multiGoodsDelBtn");

var singleSubOrderBtn = $("#singleSubOrderBtn");
var multiSubOrderBtn = $("#multiSubOrderBtn");

var buyInAddBtn = $(".buyInAddBtn");

//删除数组中某个元素
Array.prototype.remove = function (val) {
    var index = this.indexOf(val);
    if (index > -1) {
        this.splice(index, 1);
    }
};


//构造 商品删除 或 提交订单 对象
var OrderOfGoodsList = function () {

};
OrderOfGoodsList.prototype = {
    order_id: null,
    ids: []
};


//构造下拉搜索商品信息 原型
//当前采购入库新增商品

function SearchResult(id, name, bar_code, selling_price, supply_price, currency, model, unit) {
    this.id = id;
    this.name = name;
    this.bar_code = bar_code;
    this.selling_price = selling_price;
    this.supply_price = supply_price;
    this.currency = currency;
    this.model = model;
    this.unit = unit;
    //this.product_code = product_code;
}
//不需要原型属性
SearchResult.prototype = {
    // id: null,
    // name: null
};

//订单内单件商品编辑 对象
var goodsdata = function () {

};
goodsdata.prototype = {
    orderId: null,
    productCode: null,
    productName: null,
    productQty: null,
    productId: null
};

//订单编号 按日期模糊搜索 对象
var orderSearchData = function () {
};
orderSearchData.prototype = {
    min_date: "",
    max_date: "",
    order_code: "",
    url: ""
};

//单个订单提交对象
var subOrderData = function () {
};
subOrderData.prototype = {
    ids: []
};

//单选多选  ids 表单原型
function IsSelect(ids) {
    this.ids = ids || [];
}
IsSelect.prototype.ids = [];

//拣货数据提交对象
var packData = function () {
};
packData.prototype = {
    order_id: null,
    bar_code: null,
    qty: 1
};

//导航设置数据
var navData = function () {
};
navData.prototype = {
    id: null,
    name: null,
    url: null,
    pid: null,
    sequence: null,
    hide: null
};


//新入库单
var purchaseAddData = function () {

};
purchaseAddData.prototype = {
    //goods: []
};

//新入库单内商品
var purchaseAddOneData = function () {

};
purchaseAddOneData.prototype = {};
//构造 新订单提交信息原型
var newOrderData = function () {

};
newOrderData.prototype = {
    order_code: null,
    cg_name: null,
    cg_number: null,
    cg_phone: null,
    cg_province: null,
    cg_city: null,
    cg_area: null,
    cg_address: null,
    goods: []
};


//构造 订单编辑信息原型
var editOrderData = function () {

};
editOrderData.prototype = {
    order_id: null,
    order_code: null,
    cg_name: null,
    cg_number: null,
    cg_phone: null,
    cg_province: null,
    cg_city: null,
    cg_area: null,
    cg_address: null,
    goods: []
};


//订单编辑内商品信息
var OrderGoodsData = function () {

};
OrderGoodsData.prototype = {
    product_code: null,
    qty: null
};
//
var AlertText = {
    yes: "是",
    no: "否",
    userInfoEdit: ["修改员工信息", "确定要修改员工信息吗"],
    userDel: ["删除员工信息", "确定要删除员工信息吗"],
    userResetPw: ["重置密码", "你确定要重置员工 ", " 的密码为：  "],

    columnFile: ["删除代码块", "你确定要删除代码块吗"],
    columnUrl: ["删除栏目", "你确定要删除栏目吗"],
    article: ["删除文章", "你确定要删除文章吗"],
    goods: ["删除产品", "你确定要删除产品吗"],
};


/*
 *
 *
 *   Alert 提示框
 *
 *
 * */
//成功提示
function AlertSuccess(msg, text, ConfirmFunction) {
    swal({
        title: msg,
        type: "success",
        text: text,
        confirmButtonText: "确认",
        showConfirmButton: true
    }, function (isConfirm) {
        try {
            ConfirmFunction();
        } catch (err) {

        }
    });
}
//错误提示
function AlertError(msg, text, ConfirmFunction) {
    swal({
        title: msg,
        type: "error",
        text: text,
        confirmButtonText: "确认",
        showConfirmButton: true
    }, function (isConfirm) {
        try {
            ConfirmFunction();
        } catch (err) {

        }
    });
}
//警告提示
function AlertWarn(msg, text, ConfirmFunction) {
    swal({
        title: msg,
        type: "warning",
        text: text,
        confirmButtonText: "确认",
        showConfirmButton: true
    }, function (isConfirm) {
        if (isConfirm) {
            try {
                ConfirmFunction();
            } catch (err) {

            }
        }
    });
}
//操作确认提示
function AlertConfirm(title, text, ConfirmBtnText, ConfirmFunction, CancelFunction) {
    swal({
        title: title,
        text: text,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: ConfirmBtnText,
        cancelButtonText: "取消",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (isConfirm) {
            console.log("Confirm");
            ConfirmFunction();
        } else {
            try {
                console.log("Confirm");
                CancelFunction();
            }
            catch (err) {
            }
        }
    });
}
//data.code = 0 异步操作返回 0 传入返回的data
function AjaxReturnZero(data) {
    console.log(data);
    try {
        //JSON.parse(data.msg);
        var JsonObject = JSON.parse(data.msg);
        var errorText = "";
        for (var code in JsonObject) {
            errorText += "<p>订单：" + code + " " + JsonObject[code] + "<br></p>";
        }
        swal({
            title: "操作失败!",
            type: "error",
            text: errorText,
            confirmButtonText: "确认",
            cancelButtonText: "取消",
            showConfirmButton: true,
            html: true
        }, function (isConfirm) {
            //确认错误后点击按钮刷新页面
            if (isConfirm) {
                location.reload(true);
            }
        });
    } catch (err) {
        if (err instanceof SyntaxError) {
            //是字符串对象时
            AlertError("操作失败!", data.msg);
            if (data.msg == "验证码错误") {
                $("#verifyImg").click();
            }
        }
    }

}


//通用表单提交 表单对象 API接口 按钮DOM
function formPost(formData, Url, btnDOM) {
    if (btnDOM) {
        $(btnDOM).prop("disabled", true);
    }
    $.ajax({
        type: "POST",
        url: Url,
        data: formData,
        //async: false,
        success: function (data) {
            if (btnDOM) {
                $(btnDOM).prop("disabled", false);
            }
            orderApiSuccess(data, "操作成功");
        },
        error: function () {
            if (btnDOM) {
                $(btnDOM).prop("disabled", false);
            }
            AlertError("操作失败!", "网络链接失败 或 服务器错误!", function () {
                location.reload(true);
            });
        },
    });
}

//混合原始表单提交
function originFormPost(formData, url, btnDOM) {
    if (btnDOM) {
        $(btnDOM).prop("disabled", true);
    }
    return $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,

        //async: false,
        success: function (data) {
            if (btnDOM) {
                $(btnDOM).prop("disabled", false);
            }
            orderApiSuccess(data, "操作成功");
        },
        error: function () {
            if (btnDOM) {
                $(btnDOM).prop("disabled", false);
            }
            AlertError("操作失败!", "网络链接失败 或 服务器错误!", function () {
                location.reload(true);
            });
        },
    });

}


//判断是否是整数
function isInteger(obj) {
    return Math.floor(obj) === obj
}

//传入字符串，返回DOM
function parseDom(arg) {
    var objE = document.createElement("div");
    objE.innerHTML = arg;
    return objE.childNodes;
}

//解析Url 返回Url的所有对象数据
function parseURL(url) {
    var a = document.createElement('a');
    a.href = url;
    return {
        source: url,
        protocol: a.protocol.replace(':', ''),
        host: a.hostname,
        port: a.port,
        query: a.search,
        params: (function () {
            var ret = {},
                seg = a.search.replace(/^\?/, '').split('&'),
                len = seg.length,
                i = 0,
                s;
            for (; i < len; i++) {
                if (!seg[i]) {
                    continue;
                }
                s = seg[i].split('=');
                ret[s[0]] = s[1];
            }
            return ret;
        })(),
        file: (a.pathname.match(/\/([^\/?#]+)$/i) || [, ''])[1],
        hash: a.hash.replace('#', ''),
        path: a.pathname.replace(/^([^\/])/, '/$1'),
        relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [, ''])[1],
        segments: a.pathname.replace(/^\//, '').split('/')
    };
}

//关闭表格内输入框
function closeInput(elm) {
    var inline_td = $(elm);
    var inline_tr = $(elm).parent();
    var inline_amount = inline_tr.find(".inline_amount");

    //使用旧的库存来计算差值
    var stock_true_old = inline_tr.find(".inline_stock_true_old").text();

    console.log(stock_true_old);

    //读取 stock_true_new input值
    var stock_true_new = Number(inline_td.find('input').val());
    console.log(stock_true_new);
    // console.log(!isInteger(stock_true_new));
    // console.log((stock_true_new <= 0));

    //判空
    if (inline_td.find('input').val() == "") {
        $(elm).find('input').val("");
        inline_amount.text("");
        $(elm).empty();

        //重新为td bind 一个触发事件
        $(elm).bind("click", function () {
            newInput(elm);
        });
        return false;
    }

    //判断正整数
    if (!isInteger(stock_true_new) || (stock_true_new <= -1)) {
        $(elm).find('input').val("");
        inline_amount.text("");
        $(elm).empty();

    } else {
        $(elm).empty().text(stock_true_new);
        inline_amount.text(stock_true_new - stock_true_old);
    }
    //重新为td bind 一个触发事件
    $(elm).bind("click", function () {
        newInput(elm);
    });
}
//新建一个表格内的输入框
function newInput(elm) {
    $(elm).unbind('click');
    var value = $(elm).text();
    $(elm).empty();
    $("<input>")
        .attr('type', 'text')
        .val(value)
        .blur(function () {
            closeInput(elm);
        })
        .keydown(function (event) {
            if (event.keyCode === 13) {
                closeInput(elm);
            }
        })
        .appendTo($(elm))
        .focus();
}
//删除表格内的行
function ClearTable(dom) {
    $(dom).nextAll().remove();
    //清空当前页面的数据
    addGoodsMark = [];
    oldMark = [];
}


//选择流水图后显示
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#orderImage')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function currencyQueryBtn() {
    $(".currencyQueryBtn").click(function () {
        window.open("http://www.currencydo.com/");
    })
}


//搜索Url解析
//日期选择器初始化
//右上角鼠标悬停下拉
//SearchUrlCheck
(function () {
    currencyQueryBtn();
    var SearchObject = parseURL(location.href).params;
    //上次搜索状态检测
    if ($.isEmptyObject(SearchObject)) {
    } else {
        if ($(".SearchKey").length > 0) {
        } else {
            return false;
        }

        var SearchSelectObject = SearchObject;
        for (var i in SearchSelectObject) {
            var key = i;
            var value = SearchSelectObject[i];

            if ($(".SearchKey [name=" + key + "]").is("input")) {
                $(".SearchKey [name=" + key + "]").val(decodeURIComponent(value));
            }

            if ($(".SearchKey [name=" + key + "]").is("select")) {
                $(".SearchKey [name=" + key + "] option").each(function (i, e) {
                    $(e).val() == value ? $(e).prop("selected", true) : "";
                })
            }
        }
    }


    //搜索按钮
    SearchBtn.click(function () {
        var newUrl = '';
        var key = 0;
        var btn = $(".SearchKey");
        btn.find('input').each(function (index, item) {
            if ($(item).val() != '') {
                if (key == 0) {
                    newUrl += '?';
                } else {
                    newUrl += '&';
                }
                key++;
                newUrl += $(item).prop('name') + '=' + $(item).val();
            }
        });
        btn.find('select').each(function (index, item) {
            if ($(item).val() != '') {
                if (key == 0) {
                    newUrl += '?';
                } else {
                    newUrl += '&';
                }
                key++;
                newUrl += $(item).prop('name') + '=' + $(item).val();
            }
        });
        //location.href = newUrl.replace(/.html/, key);
        if (newUrl == "") {
            location.href = parseURL(location.href).path;
        } else {
            location.href = newUrl;
        }

    });

    //修改密码
    resetPasswordBtn.click(function () {
        resetPasswordModal.modal({backdrop: 'static'});
    });
    //修改密码 确认函数
    resetPasswordConfirmBtn.click(function () {
        var formData = $("form.resetPassword").serialize();
        formPost(formData, resetPasswordUrl);
    });

    //日期选择器初始化
    if (SearchDatePicker.length > 0) {
        SearchDatePicker.datepicker({
            format: "yyyy-mm-dd",
            language: "zh-CN",
            keepEmptyValues: true,
            orientation: "bottom auto"
        });
    }

    if (SearchMonthPicker.length > 0) {
        SearchMonthPicker.datepicker({
            format: "yyyy-mm",
            language: "zh-CN",
            keepEmptyValues: true,
            orientation: "bottom auto",
            startView: 1,
            minViewMode: 1,
            maxViewMode: 1
        });

    }


    //右上角鼠标悬停下拉
    $('.user.dropdown').hover(function () {
            $(this).addClass('open');
        },
        function () {
            $(this).removeClass('open');
        });


    //某些页面不同货币统计

    if ($(".RowCurrency").length) {
        var page = null;
        //读取表格中每行 是否有商品列表存在 RowCurrency

        if ($(".currencyCountInsert.purchase").length) {
            //入库单内商品
            page = "purchase";

        }
        if ($(".currencyCountInsert.order").length) {
            //订单内商品
            page = "order";
        }
        currencyTotalCount(page);

    }
})();


//废弃函数
//去除字符串中所有空格
// 可以用 jQuery的
// $.trim(String);
function Trim(str, is_global) {
    var result;
    result = str.replace(/(^\s+)|(\s+$)/g, "");
    if (is_global.toLowerCase() == "g") {
        result = result.replace(/\s/g, "");
    }
    return result;
}

//unicode转中文
function decode(s) {
    return unescape(s.replace(/\\(u[0-9a-fA-F]{4})/gm, '%$1'));
}

//统计不同货币的合计
function currencyTotalCount(page) {
    var pageName = page;
    if (pageName === null) {
        console.log("不同币种统计没有运行");
        return;
    } else {
        var purchase_currency = $("dl.currencyCountInsert.purchase");
        var order_currency = $("dl.currencyCountInsert.order")

    }

    var a = [];


    $(".RowCurrency .currency").each(function (i, e) {
        a.push("." + e.innerHTML);
    });
    var allCurrency = _.uniq(a);


    console.log(allCurrency);


    //var allCurrency = [".CNY", ".AUD", ".HKD", ".NZD"];
    var data = {
        "CNY": 0,
        "AUD": 0,
        "HKD": 0,
        "NZD": 0
    };
    //console.log(data.CNY);

    function template(currency, total, pre) {
        console.log(currency + "->" + total + "->" + pre);
        if (total === 0 || total === undefined) {
            return "";
        }
        if (pre) {
            return "<dt><p>合计" + "</p></dt>" +
                "<dd><p>" + total.toFixed(2) + "&nbsp;&nbsp;" + currency + "</p></dd><dt>";
        }
        return "<dt><p>" + "</p></dt>" +
            "<dd><p>" + total.toFixed(2) + "&nbsp;&nbsp;" + currency + "</p></dd><dt>";
    }


    function count() {
        $(allCurrency).each(function (i, e) {
            var currency = e.slice(1);
            console.log(i);
            $(e).each(function (ii, ee) {
                //ee = 货币其中一种
                var currency = e.slice(1);
                var price = Number($(ee).text());
                var amount = Number($(ee).parent().find("td.amount").text());
                //console.log(data[currency]);
                data[currency] += (amount * price);
                console.log("币种" + currency + "单件商品价格是 " + price + "，有" + amount + "件，" + "合计" + amount * price + currency);
            });

            if (pageName === "purchase") {
                if (i === 0) {
                    purchase_currency.append(template(currency, data[currency], true));
                } else {
                    purchase_currency.append(template(currency, data[currency], false));
                }


            }
            if (pageName === "order") {
                if (i === 0) {
                    order_currency.append(template(currency, data[currency], true));
                } else {
                    order_currency.append(template(currency, data[currency], false));
                }

            }

        })
    }

    if (pageName === "purchase") {
        console.log("入库单币种统计");
        count();
    }
    if (pageName === "order") {
        console.log("订单币种统计");
        count();
    }


    // $(".AUD").parent().find("td.amount").text();
    // $(".HKD").parent().find("td.amount").text();
    // $(".NZD").parent().find("td.amount").text();


}



