function getData()
  {
    $('#data-content').fadeIn('slow', function(){
      $('#data-content').load('client/read-client.php', function(){
        $('#bpjs-baru').show();
        $('#loader-wrapper').hide();    
        $('#data-content').fadeIn('slow');
          $('#bpjs-baru').on('click',function(){
            changeModalTitle('Form Pendaftaran BPJS');
          disablePegawaiRegister(false);
            $('#alert-register').hide();
            document.getElementById("register-form").reset();
         });
      });
    }); 
  }