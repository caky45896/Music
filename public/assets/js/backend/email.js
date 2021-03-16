define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'email/index' + location.search,
                    add_url: 'email/add',
                    edit_url: 'email/edit',
                    del_url: 'email/del',
                    multi_url: 'email/multi',
                    import_url: 'email/import',
                    table: 'email',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'email', title: __('Email')},
                        {field: 'message', title: __('Message')},
                        {field: 'createtime' ,title: __('Createtime') ,operate: 'RANGE' ,addclass: 'datetimerange' ,formatter: Table.api.formatter.datetime}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
        
    };
    return Controller;
});