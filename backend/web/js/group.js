group = {}

group.create = function(){
    popup.open('group-form', 'Thêm nhóm người dùng mới', framework.template('/group/form.html', {
        data:null
    }), [

    {
        title:'Create', 
        fn:function(){
            framework.submit({
                id:'group-form',
                service: '/group/create',
                success: function(result){
                    popup.msg(result.message);
                    popup.close('group-form');
                    $('table tbody').append('<tr data-key="'+result.data.id+'"><td>'+$('table tr[data-key]').length+'</td><td>'+result.data.name+'</td><td>'+result.data.description+'</td><td><a onclick="group.edit('+result.data.id+')">Edit</a></td><td><a onclick="group.del('+result.data.id+')"="">Remove</a></td></tr>');
                }
            });
        }
    },
    {
        title:'Cancel',
        fn:function(){
            popup.close('group-form');
        }
    }
    ]);
}

group.edit = function(id){
    framework.ajax({
        service:'/group/get',
        data:{
            id:id
        },
        success: function(result){
            popup.open('group-form', 'Sửa nhóm', framework.template('/group/form.html', {
                data:result.data
            }), 
            [

            {
                title:'Update', 
                fn:function(){
                    framework.submit({
                        id:'group-form',
                        service: '/group/edit',
                        success: function(rs){
                            popup.msg(rs.message);
                            $('table tr[data-key='+rs.data.id+'] td:eq(1)').html(rs.data.name);
                            $('table tr[data-key='+rs.data.id+'] td:eq(2)').html(rs.data.description);
                            popup.close('group-form');
                        }
                    });
                }
            },
            {
                title:'Cancel',
                fn:function(){
                    popup.close('group-form');
                }
            }
            ]);
        }
    });
}

group.del = function(id){
    popup.confirm("Are you sure?", function(){
        framework.ajax({
            service: '/group/delete',
            data:{
                id:id
            },
            success: function(result){
                popup.msg(result.message);
                $('table tr[data-key='+result.data+']').remove();
            }
        });
    });
}