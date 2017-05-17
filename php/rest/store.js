$(document).ready(function (){

// show list of products on first load
showProducts();

})

 function showProducts(){
   // Call REST API  to get the list of products
   
   $.getJSON('read.php', function (data){
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
        
        read_products_html+="<td class='item_name'>" + val.name + "</td>";
        read_products_html+="<td>" + val.description +"</td>";
        read_products_html+="<td class='item_price'>£" + val.price + "</td>";
          
        // image's location
        read_products_html+="<td>";
        read_products_html+="<img class='thumnbail' width='75' height='50' src='images/" + val.image_path + "'/>";
        read_products_html +="</td>";
        

        // Add to cart button
        read_products_html+="<td>";
        read_products_html+="<a class='item_add' href='javascript:;'>";
        read_products_html+="<button class='btn btn-info btn-md ' data-id='" + val.id + "'>";
        read_products_html+="Add to basket";
        read_products_html+="</button>";
        read_products_html+="</a>";
        read_products_html+="</td>";
        
        // Download PDF button
        read_products_html+="<td>";
        read_products_html+="<a href='" + val.PDF + "' download>";
        read_products_html+="<button download class='btn btn-primary btn-md' data-id='" + val.PDF + "'>";
        read_products_html+="More Info";
        read_products_html+="</button>";
        read_products_html+="</a>";
        read_products_html+="</td>";
    
           
        read_products_html+="</tr>";
          
      });
        // inject to 'page-content' of the store page
        $("#data").html(read_products_html);
      
     
      
   }
   
   
   