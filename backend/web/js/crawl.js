crawl = {}

crawl.create = function () {
    popup.open('crawl-form', 'Định nghĩa quyền mới', framework.template('/crawl/form.html', {
        data: null
    }), [
        {
            title: 'Create',
            fn: function () {
                framework.submit({
                    id: 'crawl-form',
                    service: '/crawl/create',
                    success: function (result) {
                        popup.msg(result.message);
                        popup.close('crawl-form');
                        location.reload();
                    }
                });
            }
        },
        {
            title: 'Cancel',
            fn: function () {
                popup.close('crawl-form');
            }
        }
    ]);
}

crawl.edit = function (id) {
    framework.ajax({
        service: '/crawl/get',
        data: {
            id: id
        },
        success: function (result) {
            popup.open('crawl-form', 'Sửa quyền', framework.template('/crawl/form.html', {
                data: result.data
            }), [
                {
                    title: 'Update',
                    fn: function () {
                        framework.submit({
                            id: 'crawl-form',
                            service: '/crawl/edit',
                            success: function (rs) {
                                popup.msg(rs.message);
                                popup.close('crawl-form');
                                location.reload();
                            }
                        });
                    }
                },
                {
                    title: 'Cancel',
                    fn: function () {
                        popup.close('crawl-form');
                    }
                }
            ]);
        }
    });
}

crawl.run = function (id) {
    framework.ajax({
        service: '/crawl/runcrawl',
        data: {
            id: id
        },
        success: function (data) {
            popup.msg(data.message);
        }
    });
}


crawl.getModel = function (id) {
    framework.ajax({
        service: '/crawl/getmodel',
        data: {
            id: id
        },
        success: function (result) {
            popup.open('crawl-form', 'Sửa quyền', framework.template('/crawl/model.html', {
                data: result.data,
                id: id
            }), [
                {
                    title: 'Update',
                    fn: function () {
                        framework.submit({
                            id: 'crawl-form',
                            service: '/crawl/updatemodel',
                            success: function (rs) {
                                popup.msg(rs.message);
                                popup.close('crawl-form');
                                location.reload();
                            }
                        });
                    }
                },
                {
                    title: 'Cancel',
                    fn: function () {
                        popup.close('crawl-form');
                    }
                }
            ], 800, 400);
//            framework.editor('model-content', {width: 600});
            setTimeout(function () {
                var e = document.getElementsByTagName('textarea')[0];
                var gui = Gui.start(true);
                gui.enableDnD();
                gui.setPaddingTop(4);
                window.onresize = function (e) {
                    gui.resize((window.innerWidth - 40), (window.innerHeight));
                }.bind(this);
            }, 800);
        }
    });
}

crawl.del = function (id) {
    popup.confirm("Are you sure?", function () {
        framework.ajax({
            service: '/crawl/delete',
            data: {
                id: id
            },
            success: function (result) {
                popup.msg(result.message);
                $('table tr[data-key=' + id + ']').remove();
            }
        });
    });
}

crawl.config = function (id) {
    framework.ajax({
        service: '/crawl/getconfig',
        data: {
            id: id
        },
        success: function (result) {
            popup.open('config-form', 'Config', framework.template('/crawl/config.html', {
                data: result.data,
                id: id
            }), [
                {
                    title: 'Update',
                    fn: function () {
                        framework.submit({
                            id: 'config-form',
                            service: '/crawl/updateconfig',
                            success: function (rs) {
                                popup.msg(rs.message);
                                popup.close('crawl-form');
                                location.reload();
                            }
                        });
                    }
                },
                {
                    title: 'Cancel',
                    fn: function () {
                        popup.close('config-form');
                    }
                }
            ], 800, 400);
        }
    });
}