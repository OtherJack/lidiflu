$(document).ready(function(){
 
    // show html form when 'update product' button was clicked
    $(document).on('click', '.update-product-button', function(){
          var id = $(this).attr('data-id');
          $(".row").hide();
          $("h1").html("Update Product");
      
        // read one record based on given product id
        $.getJSON("https://lidiflu-otherjack.c9users.io/php/rest/readOne.php?id=" +id, function(data){
 
        // values will be used to fill out our form
       var name = data.name;
       var description = data.description;
       var price = data.price;
       var image_path = data.image_path;
    
        // we used the 'required' html5 property to prevent empty fields
        var update_product = "";
        update_product +="<form id='update-product-form' action='#' method='post' border='0'>";
        update_product +="<table id='update-table' class='table'>";
 
        // name field
        update_product +="<tr>";
        update_product +="<td>Name</td>";
        update_product +="<td><input value=\"" + name + "\" type='text' name='name' class='form-control' required /></td>";
        update_product +="</tr>";
 
        // price field
        update_product +="<tr>";
        update_product +="<td>Price</td>";
        update_product +="<td><input value=\"" + price + "\" type='number' min='1' name='price' class='form-control' required /></td>";
        update_product +="</tr>";
 
        // description field
        update_product +="<tr>";
        update_product +="<td>Description</td>";
        update_product +="<td><textarea name='description' class='form-control' required>" + description + "</textarea></td>";
        update_product +="</tr>";
 
        
        // image_path
        update_product +="<tr>";
        update_product +="<td>The image path</td>";
        update_product +="<td><input value=\"" + image_path + "\" type='text'  name='image_path' class='form-control' required readonly /></td>";
        update_product +="</tr>";
 
        // hidden 'product id' to identify which record to delete
        update_product +="<tr>";
        update_product +="<td><input value=\"" + id + "\" name='id' type='hidden' /></td>";
 
        // button to submit form
        update_product +="<td>";
        update_product +="<button type='submit' class='btn btn-info'>";
        update_product +="Update Product";
        update_product +="</button>";
        update_product +="</td>";
        update_product +="</tr>";
 
        update_product +="</table>";
        update_product +="</form>";
    
        $("#app").append(update_product);
        
    });
        
});

   
     // will run if 'update product' form was submitted
    $(document).on('submit', '#update-product-form', function(){
     
         var form_data = JSON.stringify($(this).serializeObject());
         // submit form data to api
         $.ajax({
          url: "https://lidiflu-otherjack.c9users.io/php/rest/update.php",
         type: "POST",
         contentType: 'application/json',
         data: form_data,
         success: function(result) {
         // product was created, go back to products list
         $(".row").show();
         $("h1").html("Product Inventory");
         $("#update-product-form").remove();
         $("#update-table").remove();
         showProducts();
            },
         error: function(xhr, resp, text) {
        // show error to console
        console.log(xhr, resp, text);
           }
    });
     
    return false;
    });

    
});