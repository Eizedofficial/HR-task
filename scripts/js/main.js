window.onload = function(){

    var data = JSON.parse(dbRequest("scripts/php/main.php?action=GET_DATA"));

    printProducts(data);

};

function printProducts(data){
    for(i = 0; i < data.length; i++)
    {
        var product = data[i];

        var id = "<td class='products-product-id'>"
                + product['PRODUCT_ID']
            + "</td>";
        var name = "<td class='products-product-name'>"
                + product['PRODUCT_NAME']
            + "</td>";
        var description = "<td class='products-product-description'>"
                + product['PRODUCT_ARTICLE']
            + "</td>";
        var price = "<td class='products-product-price'>"
                + product['PRODUCT_PRICE']
            + "</td>";
        var amount = "<td class='products-product-amount'>"
                + product['PRODUCT_QUANITY']
            + "</td>";
        var dateCreated = "<td class='products-product-date'>"
                + product['DATE_CREATE']
            + "</td>";
        var hideButton = "<td class = 'products-product-hide'>"
                + "<button onclick='hideProduct("
                + product['ID'] +
                ")'></button>"
            + "</td>"

        $('<tr class="products-product" id = "product' + product['ID'] +'">'
           + id + name + description + price + amount + dateCreated + hideButton +
        '</tr>').appendTo("#productsTable");
    }
    $("#productsAmount").text(data.length);
}

function hideProduct(id){
    $("#product" + id).hide();
    dbRequest("scripts/php/main.php?action=REMOVE_PRODUCT&id=" + id);

    var productsCount = $("#productsAmount").text() - 1;
    $("#productsAmount").text(productsCount);
}

function addItem(){
    var visibleItemsAmount = dbRequest("scripts/php/main.php?action=GET_AMOUNT&all_or_visible=visible");
    var limit = Number($("#productsAmount").text());
    
    if(visibleItemsAmount > limit){
        var data = JSON.parse(dbRequest("scripts/php/main.php?action=GET_DATA&limit=" + (limit + 1)));
        $('#productsTable tr').not(":first").remove();
        printProducts(data);
        $("#productsAmount").text(Number(limit + 1));
    }
}

function removeItem(){
    var visibleItemsAmount = dbRequest("scripts/php/main.php?action=GET_AMOUNT&all_or_visible=visible");
    var limit = $("#productsAmount").text() - 1;
    
    if(visibleItemsAmount >= limit && limit >= 0){
        var data = JSON.parse(dbRequest("scripts/php/main.php?action=GET_DATA&limit=" + limit));
        $('#productsTable tr').not(":first").remove();
        printProducts(data);
        $("#productsAmount").text(Number(limit) );
    }
}

function dbRequest(url){
    const requestURL = url;
    const xhr = new XMLHttpRequest();
    var response;

    xhr.open('GET', requestURL, false);
    xhr.onload = () => {
        response = xhr.response;
    }
    xhr.send();

    return response;
}