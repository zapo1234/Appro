$(document).ready(function() {
    $('.annuler').click(function() {
        $('#pak').css('display','none');
        $('.form').css('display','none');
       });

// delete toto
$(document).on('click','.suprimer', function(){
    // recupere la variable
    var id = $(this).data('id');
   // affiche les differentes
   $('.form').css('display','block');
   $('#pak').css('display','block');
   $('#token_id').val(id);
   
   $(document).on('click','.btns', function(){
   // request ajax 
   var id = $('#token').val();
    $.ajax({
   type:'POST', // on envoi les donnes
   url: '/toto_delete',
   data:{id:id},
   success:function(data) { // on traite le fichier recherche apres le retour
    $('#result').html(data);
  }
});
   
    setInterval(function(){
        $('#result').html('');
        location.reload(true);
    },4000);

});
});

});