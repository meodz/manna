grouprole = {}

grouprole.edit = function(){
    var grouproles = [];
    var i=0;
    $('input[type=checkbox]').each(function(){
        if($(this).is(':checked')){
            grouproles[i] = {};
            grouproles[i].groupId = parseInt($(this).attr('group'));
            grouproles[i].roleId = parseInt($(this).attr('role'));
            i++;
        }
    });
    
    popup.confirm("Do you want to save it?", function(){
        framework.ajax({
            service: '/grouprole/edit',
            data:{groupRoles:JSON.stringify(grouproles)},
            success: function(result){
                popup.msg(result.message);
            },
            method: 'POST'
        });
    });
}