// JavaScript for deleting product
$(document).on('click', '.delete-product-button', function(){
 
    var id = $(this).attr('data-id');
 
    bootbox.confirm({
        message: "<h4>Are you sure?</h4>",
        buttons: {
            confirm: {
                label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="glyphicon glyphicon-remove"></span> No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
 
            if(result==true){
                $.post('https://rest-api-angeline80.c9users.io/product/delete.php', {
                    id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            }
            
        }
    });
 
    return false;
});