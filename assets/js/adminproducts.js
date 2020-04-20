$(document).ready(function(){
    const BaseUrl = "http://localhost:8080/phppraktikums/" 
    function err(xhr, statusTxt, error){
        var status = xhr.status;
        switch(status){
            case 500:
                alert("Error on server. It is currently not possible to update users.");
                break;
            case 404:
                alert("Page not found");
                break;
            default:
                alert("Greska: " + status + " - " + statusTxt);
                break;
        }
    }
    Update()
 del();
 
function del(){
    $('.delete-pro').click(function(e){
        e.preventDefault();
        var id = $(this).data('pro');
        // alert(id);

        $.ajax({
            method: 'POST',
            url: BaseUrl + "models/admin/adminproduct/deleteproduct.php",
            dataType: 'json',
            data: {
                id : id
            },
            success: function(data){
                alert("The game was successfully deleted");
            },
            error: err
        });
})
}
$('#upProform').hide();
function Update(){
    $('.update-pro').click(function(){
       // e.preventDefault();
        $('#upProform').show();
        var id = $(this).data('pro');
        // alert(id);

        $.ajax({
            method: 'POST',
            url: BaseUrl + "models/admin/adminproduct/get_product.php",
            dataType: 'json',
            data: {
                id : id
            },
            success: function(data,status,jqXHR){
                console.log(jqXHR.status)
                $('#upproname').val(data.name);
                $('#upproimg').val(data.src);
                $('#upprodesc').val(data.description);
                $('#upproprice').val(data.price);
               $('#upprobrend').val(data.comp_id);
               $('#upproyear').val(data.year);
                      $('#hiddenProId').val(data.user_id);
               
            },
            error: err
        });
})
}



})