$(document).ready(function(){
 
         // handle 'read one' button click
        $(document).on('click', '.read-one-product-button', function(){
                  
                  $(".row").hide();
                  $("h1").html("Read One Single Product");
                  var id = $(this).attr('data-id');
                  $.getJSON("https://rest-api-angeline80.c9users.io/product/read_one.php?id=" + id, function(data){
                
                    // start html
                   var read_one_product="";
                   // product data will be shown in this table
                   read_one_product +="<table id='read_one_product' class='table table-bordered table-hover'>";
 
                   // product name
                   read_one_product +="<tr>";
                   read_one_product +="<td class='w-30-pct'>Name</td>";
                   read_one_product +="<td class='w-70-pct'>" + data.name + "</td>";
                   read_one_product +="</tr>";
 
                  // product description
                  read_one_product +="<tr>";
                  read_one_product +="<td>Description</td>";
                  read_one_product +="<td>" + data.description + "</td>";
                  read_one_product +="</tr>";
 
                  // product price
                  read_one_product +="<tr>";
                  read_one_product +="<td>Price</td>";
                  read_one_product +="<td>" + data.price + "</td>";
                  read_one_product +="</tr>";
                 
 
                  read_one_product +="</table>"; 
                   
                   // when clicked, it will show the product's list
                  read_one_product +="<div id='read-products' class='btn btn-primary read-products-button'>";
                  read_one_product +="<span class='glyphicon glyphicon-list'></span> View All Products";
                  read_one_product +="</div>";
                    
                     // inject html to 'app' of our app
                 $("#app").append(read_one_product);
       
               
               
                });
            
          
            
        });
 
 
 
 
// when a 'read products' button is clicked 
$(document).on('click', '.read-products-button', function(){
    $(".row").show();
    $("h1").html("Product Inventory");
    $("#read_one_product").remove();
    $("#read-products").remove();
    showProducts();
    
});

 
 
    
});