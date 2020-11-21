

var items = [];
function addToCard(name,price,id,isAdd=1) {
  
   if(!items[id]){
    items[id] = {count:1, price:price, id:id} 
     console.log(items);
    
    $('#bell').prepend( "<p><span>"+name+"</span>"
    // +`<input type='number' id=${products[i].product_Id} name='quantity' min='1' max='100' value=${value}>`
    +`<span id="qty-${id}" style='margin: 5px;width: 60px; padding: 0 13px; background: white;'>${items[id].count}</span>`
    +`<i style='margin-right:5px;' onclick='addToCard("${name}","${price}","${id}")' class='fas fa-plus'></i>`
    +`<i style='margin-right:5px;' onclick='addToCard("${name}","${price}","${id}",0)' class='fas fa-minus'></i>`
    +"<span>EGP: </span>"
    +`<span id="price-${id}"> ${price}</span> </p>`)

        

        
        } else {
            if(isAdd){
                    items[id].count = items[id].count+1
            } else {
                    items[id].count=  items[id].count-1
            }
            
            $('#qty-'+id).html(items[id].count)

            $('#price-'+id).html((items[id].count)*parseInt(price))
        }
        var sum = 0;
        items.forEach(item => {
            sum += item.count * item.price
        });
        console.log(sum);
        $('#totalPrice').html("EGP: "+sum)
        }



function save() {
    $.ajax({

        type: "POST",
        url: "confirm.php",
        data: {data:items, userId:userSelect.value},
        // dataType: "dataType",
        success: function (response) {
            
        }
    });
}

$('.form-input').change(function(evt){

    $('#sendData').submit()

})


function ayhaga (Id) {
   
    $.ajax({
        type: "GET",
        url: "orderFetch.php",
        data: {id:Id}, 
        success: function (response) {
           
           console.log(response);
            $('#productFetch').html(
               response
            )
        }
    });
}
