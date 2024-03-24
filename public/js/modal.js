
$( document ).ready(function() {

  var modal = document.getElementById("myModal");

  var textModal = document.getElementById("textModal");

  var formModal = document.getElementById("formModal");

  $("body").off("click", ".confirmDelete");
  $("body").on("click", ".confirmDelete", function () {
    $(modal).show();

    textModal.innerText = 'Você tem certeza que deseja excluir este registro?';
    $(formModal).attr("action", $(this).attr('action'));
    $(formModal).attr("method", 'get');
    
  });

  $("body").off("click", '#closeModal');
  $("body").on("click", '#closeModal', function (e) {
    $(modal).hide();
  });

  window.onclick = function(event) {
    if (event.target == modal) {
      $(modal).hide();
    }
  }
  
});