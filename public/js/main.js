window.addEventListener("DOMContentLoaded", () => {
    hideMsg ();
    showMessages();
});


function hideMsg () {
    var element = document.getElementById('msg');

    if(element !== null){

        setTimeout(() => {
            element.style.display = "none";
        }, "3000");     

    }
}

function showMessages() {
    let msg = getParameterByName('msg');
    if(msg) {
        $('#msg-text').text(msg);
        $('#msg').show();
    }
}

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

$("body").off("click", '#importBtn');
$("body").on("click", '#importBtn', function (e) {
   
    if($('#importSection').is(':visible')) {
        $('#importSection').hide();
    } else {
        $('#importForm').attr("action", $(this).attr('action'));
        $('#importSection').show();
    }

});