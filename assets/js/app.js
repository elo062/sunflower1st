/* ====== Add Smooth effect ===== */
$(function() {
// Rendre les champs du formulaire obligatoire
var $champ = $('.champ'),
    $erreur = $('#erreur');
    $envoi = $('#envoi');

   function verifier(champ){
       if(champ.val() == ""){ // si le champ est vide
         $envoi.click(function(e){
             e.preventDefault();})
           $erreur.css('display', 'block'); // on affiche le message d'erreur
       }
   }

// On fait apparaître le menu sandwich et disparaitre les boutons de navigation sur petit écran
      var windowWidth= $(window).width();
      if(windowWidth < 801){
        $(".op-sectionlist").hide();
        $("#nav-icon3").show();
        // Au clic la rubrique disparaît
        $(".op-sectionlist").click(function( event ) { // on attache la fonction au click
          $(".op-sectionlist").hide('slow');
        });
      }
      // On fait disparaître le menu sandwich sur grand écran
      if(windowWidth > 800){
        $("#nav-icon3").hide();
      }
  // Au clic le menu sandwich se déroule doucement
  $("#nav-icon3").click(function( event ) { // on attache la fonction au click
    $(".op-sectionlist").slideToggle('slow');
  });

  $('#nav-icon3').click(function(){
  		$(this).toggleClass('open');
  	});

});
