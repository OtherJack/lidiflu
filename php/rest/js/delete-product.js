// JavaScript for deleting product
$(document).on('click', '.delete-product-button', function(){
 
    var id = $(this).attr('data-id');
 
    bootbox.confirm({
        message: "<h4>Are you sure?</h4>",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: 'No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
 
            if(result==true){
                $.post('https://lidiflu-otherjack.c9users.io/php/rest/php/delete.php', {
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