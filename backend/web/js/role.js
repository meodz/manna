role = {}

role.create = function(){
    popup.open('role-form', 'Định nghĩa quyền mới', framework.template('/role/form.html', {
        data:null
    }), [

    {
        title:'Create', 
        fn:function(){
            framework.submit({
                id:'role-form',
                service: '/role/create',
                success: function(result){
                    popup.msg(result.message);
                    popup.close('role-form');
                    location.reload();
                }
            });
        }
    },
    {
        title:'Cancel',
        fn:function(){
            popup.close('role-form');
        }
    }
    ]);
}

role.edit = function(id){
    framework.ajax({
        service:'/role/get',
        data:{
            id:id
        },
        success: function(result){
            popup.open('role-form', 'Sửa quyền', framework.template('/role/form.html', {
                data:result.data
            }), [

            {
                title:'Update', 
                fn:function(){
                    framework.submit({
                        id:'role-form',
                        service: '/role/edit',
                        success: function(rs){
                            popup.msg(rs.message);
                            popup.close('role-form');
                            location.reload();
                        }
                    });
                }
            },
            {
                title:'Cancel',
                fn:function(){
                    popup.close('role-form');
                }
            }
            ]);
        }
    });
}

role.del = function(id){
    popup.confirm("Are you sure?", function(){
        framework.ajax({
            service: '/role/delete',
            data:{
                id:id
            },
            success: function(result){
                popup.msg(result.message);
                $('table tr[data-key='+id+']').remove();
            }
        });
    });
}