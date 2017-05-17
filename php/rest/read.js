$(document).ready(function (){

// show list of products on first load
showProducts();

});


 function showProducts(){
   // Call REST API  to get the list of products
   
   $.getJSON('https://lidiflu-otherjack.c9users.io/php/rest/read.php', function (data){
       productListSuccess(data);
   });
     
   }
   
   
   function productListSuccess (data){
       var read_products_html = "";
    // Iterate over the collection of data
    // loop through returned list of data
      $.each(data.records, function(key, val) {
        
       // creating new table row per record
        
        read_products_html +="<tr>";
        
        read_products_html+="<td>" + val.name + "</td>";
        read_products_html+="<td>" + val.description +"</td>";
        read_products_html+="<td>£" + val.price + "</td>";
          
          // image's location
        read_products_html+="<td>";
        read_products_html+="<img class='thumnbail' width='75' height='50' src='images/" + val.image_path + "'/>";
        read_products_html +="</td>";
        
        
        // read one product
        read_products_html+="<td>";
        read_products_html+="<button class='btn btn-primary btn-md read-one-product-button' data-id='" + val.id + "'>";
        read_products_html+="Info";
        read_products_html+="</button>";
        read_products_html+="</td>";
        
        
        // edit button
        read_products_html+="<td>";
        read_products_html+="<button class='btn btn-info update-product-button btn-md' data-id='" + val.id + "'>";
        read_products_html+="Edit";
        read_products_html+="</button>";
        read_products_html+="</td>";
        
        // delete button
        read_products_html+="<td>";
        read_products_html+="<button class='btn btn-danger btn-md delete-product-button' data-id='" + val.id + "'>";
        read_products_html+="Delete";
        read_products_html+="</button>";
        read_products_html+="</td>";
           
        read_products_html+="</tr>";
          
      });
        // inject to 'page-content' of our app
        $("#data").html(read_products_html);
      
     
      
   }