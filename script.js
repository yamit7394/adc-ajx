$("#products").on('click','#addToCart',function(e){
    e.preventDefault();
    var id= $(this).val();
    $.ajax({
        url:"configure.php",
        type:"POST",
        data:{
            "prId":id,
            "action":"add",
        },
        datatype:"JSON",
    }).done(function(data){
        displayCart(data);
    });
});

$("#product-table").on('click','.removePr',function(e){
    e.preventDefault();
    var id= $(this).val();
    console.log(id);
    
    $.ajax({
        url:"configure.php",
        type:"POST",
        data:{
            "removeId":id,
            "action":"remove",
        },
        datatype:"JSON",
    }).done(function(data){
        displayCart(data);
    });
});

$("#product-table").on('click','.quantity',function(e){
    e.preventDefault();
    var id= $(this).val();
    var newQty=$('#qty-field'+id+'').val();
    console.log(id);
    console.log(newQty);
    $.ajax({
        url:"configure.php",
        type:"POST",
        data:{
            "updateId":id,
            "newQty":newQty,
            "action":"update",
        },
        datatype:"JSON",
    }).done(function(data){
        console.log(data);
        displayCart(data);
    });
});

function displayCart(data){
    data=$.parseJSON(data);
    var table='<table id="productTable">\
                    <tr>\
                        <th>Image</th>\
                        <th>Id</th>\
                        <th>Name</th>\
                        <th>Price</th>\
                        <th>Quantity</th>\
                        <th>Remove</th>\
                    </tr>';
    var row='';
    for(var i=0;i<data.data.length;i++){
        row +='<tr>\
                <td><img src="images/'+data.data[i].image+'"</td>\
                <td>'+data.data[i].id+'</td>\
                <td>'+data.data[i].name+'</td>\
                <td>'+data.data[i].price+'</td>\
                <td>\
                    <form method="">\
                        <input id="qty-field'+data.data[i].id+'" type="number" value="'+data.data[i].quantity+'">\
                        <button class="quantity" value="'+data.data[i].id+'">Update</button>\
                    </form>\
                </td>\
                <td><button class="removePr" value='+data.data[i].id+'">X</button> </td>\
            </t>';
    }
    $("#product-table").html(table+row+'</table>');
    
    $.ajax({
        url:"configure.php",
        type:"POST",
        data:{
            "action":"total",
        },
        datatype:"JSON",
    }).done(function(data){
        $("#total").html("<h3>Your total cart="+data+"</h3>");
    });
    
}