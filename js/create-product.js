$(document).ready(function(){

    // show html form when 'create product' button was clicked
    $(document).on('click', '#createProduct', function(){
		// categories api call will be here
    
        
        $(".row").hide();
        $("h1").html("Create Product");
        
        
        //Create Product Form 
        var create_product ="<form id='create-product-form' action='#' method='post' border='0'>";
        create_product +="<table class='table'>";
        
        
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

	// 'create product form' handle will be here
});