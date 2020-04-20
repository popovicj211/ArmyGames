$(document).ready(function(){
    const BaseUrl = "http://localhost:8080/phppraktikums/" 
    function err(xhr, statusTxt, error){
        var status = xhr.status;
        switch(status){
            case 500:
                alert("Error on server. It is currently not possible to update users.");
                break;
                case 404:
                    alert("Page not found.");
                    break;
            default:
                alert("Greska: " + status + " - " + statusTxt);
                break;
        }
    }
    Update()
 del();
 
function del(){
    $('.delete-user').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        // alert(id);

        $.ajax({
            method: 'POST',
            url: BaseUrl + "models/admin/adminuser/ajax_delete_user.php",
            dataType: 'json',
            data: {
                id : id
            },
            success: function(data){
                alert("The user was successfully deleted");
            },
            error: err
        });
})
}
$('#upform').hide();
function Update(){
    $('.update-user').click(function(){
       // e.preventDefault();
        $('#upform').show();
        var id = $(this).data('id');
        // alert(id);

        $.ajax({
            method: 'POST',
            url: BaseUrl + "models/admin/adminuser/ajax_get_user.php",
            dataType: 'json',
            data: {
                id : id
            },
            success: function(data,status,jqXHR){
                console.log(jqXHR.status)
                $('#upusername').val(data.username);
                $('#upemail').val(data.email);
                $('#uppass').val(data.password);
                $('#upverpass').val(data.verifypassword);
               $('#updateReg').val(data.dateregister);
                $('input[name="upactive"]').removeAttr('checked');
                if(data.active == 1){
                    $('input[name="upactive"]').prop('checked',true);
                $('input[name="upactive"]').val(data.active);
                }
               $('#users-list-up').val(data.function_id);
                         
                      $('#hiddenUserId').val(data.user_id);
               
            },
            error: err
        });
})
}



})




