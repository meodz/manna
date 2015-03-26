category = {}

category.expand = function (id) {
    framework.ajax({
        service: '/category/getchild',
        data: {
            id: id
        },
        success: function (rs) {
            if (rs.status) {
                $.each(rs.data, function (i) {
                    var tmp = '';
                    for (var i = 0; i < this.level; i++) {
                        tmp += '---';
                    }
                    var expand = '<p class="expand fa fa-toggle-right" onclick="category.expand(' + this.id + ')"></p> ';
                    if (this.leaf == 1)
                        expand = '';
                    var stt = this.published == 1 ? 'fa-check-circle' : 'fa-times-circle';
                    $('.table tr[data-key=' + id + ']').after('<tr data-key="' + this.id + '" parentId="' + id + '">\
                                                                    <td>' + this.id + '</td>\
                                                                    <td>' + tmp + expand + this.name + '</td>\
                                                                    <td><input type="text" value="' + this.priceMultiple + '"/></td>\
                                                                    <td><input type="text" value="' + this.priceAddition + '"/></td>\
                                                                    <td><a onclick="category.expand(' + this.id + ')"></a></td>\
                                                                    <td><p class="fa ' + stt + ' "></p></td>\
                                                                    <td><a onclick="category.edit(' + this.id + ')">Edit</a> | <a onclick="category.del(' + this.id + ')">Remove</a></td>\
                                                                </tr>');
                });
                $('.table tr[data-key=' + id + '] .expand').attr('class', 'expand fa fa-toggle-down');
                $('.table tr[data-key=' + id + '] .expand').attr('onclick', 'category.collapse(' + id + ')');
            }
        }
    });
}

category.collapse = function (id) {
    category.removeChirld(id);
    $('tr[data-key=' + id + '] .expand').attr('class', 'expand fa fa-toggle-right');
    $('tr[data-key=' + id + '] .expand').attr('onclick', 'category.expand(' + id + ')');
}

category.removeChirld = function (id) {
    $.each($('tr[parentid=' + id + ']'), function () {
        $(this).attr('class', '_remove');
        category.removeChirld($(this).attr('data-key'));
    });
    $('._remove').remove();
}

category.create = function () {
    popup.open('category-form', 'Định nghĩa quyền mới', framework.template('/category/form.html', {
        data: null
    }), [
        {
            title: 'Create',
            fn: function () {
                framework.submit({
                    id: 'category-form',
                    service: '/category/create',
                    success: function (result) {
                        popup.msg(result.message);
                        popup.close('category-form');
                        location.reload();
                    }
                });
            }
        },
        {
            title: 'Cancel',
            fn: function () {
                popup.close('category-form');
            }
        }
    ]);
}

category.edit = function (id) {
    framework.ajax({
        service: '/category/get',
        data: {
            id: id
        },
        success: function (result) {
            popup.open('category-form', 'Sửa quyền', framework.template('/category/form.html', {
                data: result.data
            }), [
                {
                    title: 'Update',
                    fn: function () {
                        framework.submit({
                            id: 'category-form',
                            service: '/category/edit',
                            success: function (rs) {
                                popup.msg(rs.message);
                                popup.close('category-form');
                                location.reload();
                            }
                        });
                    }
                },
                {
                    title: 'Cancel',
                    fn: function () {
                        popup.close('category-form');
                    }
                }
            ]);
        }
    });
}

category.del = function (id) {
    popup.confirm("Are you sure?", function () {
        framework.ajax({
            service: '/category/delete',
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