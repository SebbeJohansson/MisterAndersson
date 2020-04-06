/**
 * Created by Sebastian on 2018-03-16.
 */
console.log("yey");

function toggleOverlay(){
    console.log("wow");
    $("#overlay").toggle();
    $("#showbutton").toggle();
}

function toggleCallbackPop(){
    $("#callback").toggle();
}

function closeLightBoxPop(){
    console.log("lightbox close.");
    $("#lightbox").toggle(false);
}

function toggleLightboxPop(){
    console.log("lightbox toggle.");
    $("#lightbox").toggle();
}

$( document ).ready(function() {
    /*$('#clickimage').on("mouseup","a", function (e) {
     e.preventDefault();
     if(e.which === 1){
     toggleLightboxPop();
     }

     console.log("lightbox");
     });*/

    console.log("wow");

    $('*[id*=clickimage]').each(function() {
        $(this).click(function (e) {
            e.preventDefault();
            if(e.which === 1){
                console.log($(this).find("a").attr('href'));
                $("#lightbox-image img").attr("src",$(this).find("a").attr('href'));

                console.log("lightbox");
                toggleLightboxPop();
            }

        });
    });

    $('#lightbox').click(function(e){

        e.preventDefault();
        if(e.which === 1){
            closeLightBoxPop();
        }

    });


    $('#menu-button').click(function(e){
        console.log("Clicked on menu button");
        e.preventDefault();
        if(e.which === 1){
            //$('#menupop').toggle();
            $('#menupop').animate({opacity: 'toggle'})
        }

    });

});

/* On key up: */
$(document).keyup(function(e) {

    switch(e.which){
        case 27:
            $("#lightbox").toggle(false);
            $("#callback").toggle(false);
            $("#overlay").toggle(false);
            $("#showbutton").toggle(false);
            $('#menupop').toggle(false);
            break;
        case undefined:
            break;
        default:
            console.log("key pressed: " + e.which);
            break;
    }
});
