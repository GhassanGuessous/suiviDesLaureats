jQuery.validator.addMethod("verifMdp", function(value, element) {

  var pass = $("#pass").val();
  var passC = $("#passConfirm").val();

  if(pass != passC){
    return false;
  }
  return true;

}, "Veuillez confirmer votre mot de passe");

// $(function () {
//   $.ajaxSetup({
//       headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
//   });
// });

// jQuery.validator.addMethod("verifEmail", function(value, element) {
//   $.ajax({
//     url: 'verify',
//     type: 'POST',
//     data: {email: $('#email').val(), '_token': $('#_token').val()},
//     beforeSend: function() {
//     },
//     complete: function(){
//     },
//     success: function(data) {
//       // if(data == 'exist'){
//       //   return false;
//       // }else{
//       //   return true;
//       // }
//       alert("succes")
//       console.log('succes:');
//     },
//     error: function (data)
//         {
//           alert(data);
//         console.log('Error:', data.responseText);
//         }
// });

// }, "Cet email existe deja");

$("#formInscriptionEtudiant").validate({
  rules: {
    cne: {
      required: true
    },
	  nom: {
      required: true
    },
    prenom: {
      required: true
    },
    dateNaiss: {
      required: true
    },
    email: {
      required: true
    },
    login: {
      required: true
    },
    pass: {
      required: true
    },
    passConfirm: {
      required: true,
      verifMdp: true
    },
    promo: {
      required: true
    }
  }
});

$("#formInscrireEnseignant").validate({
  rules: {
	  nom: {
      required: true
    },
    prenom: {
      required: true
    },
    email: {
      required: true
    },
    login: {
      required: true
    },
    pass: {
      required: true
    },
    passConfirm: {
      required: true,
      verifMdp: true
    }
  }
});