function popup(id) {

    $('#popup').fadeIn();
   
   $('#lienadd').attr('onclick', 'addtocart(' + id + ');');
//    $('#lienadd').click(function () {
//        addtocart(id);
//    });
}

$().ready(function() {
    $('.close').click(function (event)
    {
        $('#popup').fadeOut();
    });

   
});

function addtocart(id) {

    $.ajax({
        url: "/addtocart/" + id,
        dataType: 'json',
  complete : function(result){

cartnb=result.responseJSON.cartnb;
    $('.cart').html("");
$('.cart').append(cartnb);

}    });
    $('#popup').fadeOut();
    }
    
//Vider + contenu panier en popup
    
    
function mycart() {

    $('#mycart').fadeIn();


    $.ajax({
        url: "/listcart",
        dataType: 'json',
  complete : function(listcart){
$('#listcart').html("");
listcart=listcart.responseJSON;
for(var i= 0; i < listcart.length; i++)
{
    $('#listcart').append("<p>" + listcart[i] + "</p>");
}

}
    });
    
        var closecart = $('.closecart');
    closecart.click(function (event)
    {
        $('#mycart').fadeOut();
    });
    
}

function emptycart() {

    $.ajax({
        url: "/emptycart",
        dataType: 'json',
  complete : function(emptycart){
//
//cartnb=emptycart.responseJSON.cartnb;
$('p').remove('.cart');
$('.cart').html("");

}
    });

    $('#mycart').fadeOut();
    }

function deletepizza(id) {

    $.ajax({
        url: "/backend/deletepizza/" + id,
        dataType: 'json',
        complete : function(){
location.reload();

}
    });
    }
    
    function setpizofday(id) {

    $.ajax({
        url: "/backend/setpizofday/" + id,
        dataType: 'json',
        complete : function(){
location.reload();

}
    });
    }
    
    function setaumenu(id) {

    $.ajax({
        url: "/backend/setaumenu/" + id,
        dataType: 'json',
        complete : function(){
location.reload();

}
    });
    }
    
       function unsetmenu(id) {

    $.ajax({
        url: "/backend/unsetmenu/" + id,
        dataType: 'json',
        complete : function(){
location.reload();

}
    });
    }
    
    