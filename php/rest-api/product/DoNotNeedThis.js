$(document).ready(function(){

    // show html form when 'create product' button was clicked
    $(document).on('click', '#create-product-button', function(){
		
        $(".row").hide();
        $("h1").html("Create Product");
        
        
        //Create Product Form 
        var create_product ="<form id='create-product-form' action='#' method='post' enctype='multipart/form-data' border='0'>";
        create_product +="<table class='table' id='create-product-table'>";
        
        
        // name field 
        create_product +="<tr>";
        create_product +="<td> Name </td>";
        create_product +="<td><input type='text' name='name' class='form-control' required /></td>";
        create_product +="</tr>";
        
         // description field
        create_product +="<tr>";
        create_product +="<td>Description</td>";
        create_product +="<td><textarea name='description' class='form-control' required></textarea></td>";
        create_product +="</tr>";
        
        
          // price field
        create_product +="<tr>";
        create_product +="<td>Price</td>";
        create_product +="<td><input type='number' min='1' name='price' class='form-control' required /></td>";
        create_product +="</tr>";
     
     
        // image_path field
        create_product +="<tr>";
        create_product +="<td>image_path</td>";
        create_product +="<td><input type='file'  name='image_path' class='form-control' required /></td>";
        create_product +="</tr>";
     
     
     // button to submit form
        create_product +="<tr>";
        create_product +="<td></td>";
        create_product +="<td>";
        create_product +="<button type='submit' class='btn btn-primary'>";
        create_product +="<span class='glyphicon glyphicon-plus'></span> Create Product";
        create_product +="</button>";
        create_product +="</td>";
        create_product +="</tr>";
     
        
       create_product +="</table>";
       create_product +="</form>";
       
       
       // inject html to 'app' of our app
     $("#app").append(create_product);
       
    });



	
	
	// will run if create product form was submitted
   $(document).on('submit', '#create-product-form', function(){
    
         // get form data
         var form_data = JSON.stringify($(this).serializeObject());
   
         // (Send Data to the server) submit form data to api
         $.ajax({
         url: "https://rest-api-angeline80.c9users.io/product/create.php",
         type: "POST",
         contentType: 'application/json',
         data: form_data,
         success: function(result) {
         // product was created, go back to products list
         showProducts();
         location.reload();
               },
         error: function(xhr, resp, text){
         // show error to console
         console.log(xhr, resp, text);
               }
       });
 
     return false;
    
});
	
});