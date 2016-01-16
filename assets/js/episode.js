    $(document).on('click', '#close-preview1', function(){ 

              $('.image-preview1').popover('hide');
              // Hover befor close the preview
              $('.image-preview1').hover(
                  function () {
                     $('.image-preview1').popover('show');
                  }, 
                   function () {
                     $('.image-preview1').popover('hide');
                  }
              );    
          });

        $(function() {
              // Create the close button
              var closebtn = $('<button/>', {
                  type:"button",
                  text: 'x',
                  id: 'close-preview1',
                  style: 'font-size: initial;',
              });
              closebtn.attr("class","close pull-right");
              // Set the popover default content
              $('.image-preview1').popover({
                  trigger:'manual',
                  html:true,
                  title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                  content: "There's no image",
                  placement:'bottom'
              });
              // Clear event
              $('.image-preview-clear1').click(function(){
                  $('.image-preview1').attr("data-content","").popover('hide');
                  $('.image-preview-filename1').val("");
                  $('.image-preview-clear1').hide();
                  $('.image-preview-input1 input:file').val("");
                  $(".image-preview-input-title1").text("Browse"); 
              }); 
              // Create the preview image
              $(".image-preview-input1 input:file").change(function (){     
                  var img = $('<img/>', {
                      id: 'dynamic',
                      width:250,
                      height:200
                  });      
                  var file = this.files[0];
                  var reader = new FileReader();
                  // Set preview image into the popover data-content
                  reader.onload = function (e) {
                      $(".image-preview-input-title1").text("Change");
                      $(".image-preview-clear1").show();
                      $(".image-preview-filename1").val(file.name);            
                      img.attr('src', e.target.result);
                      $(".image-preview1").attr("data-content",$(img)[0].outerHTML).popover("show");
                  }        
                  reader.readAsDataURL(file);
                 });  
              });
              

      $(document).on('click', '#close-preview2', function(){ 

              $('.image-preview2').popover('hide');
              // Hover befor close the preview
              $('.image-preview2').hover(
                  function () {
                     $('.image-preview2').popover('show');
                  }, 
                   function () {
                     $('.image-preview2').popover('hide');
                  }
              );    
          });

        $(function() {
              // Create the close button
              var closebtn = $('<button/>', {
                  type:"button",
                  text: 'x',
                  id: 'close-preview2',
                  style: 'font-size: initial;',
              });
              closebtn.attr("class","close pull-right");
              // Set the popover default content
              $('.image-preview2').popover({
                  trigger:'manual',
                  html:true,
                  title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                  content: "There's no image",
                  placement:'bottom'
              });
              // Clear event
              $('.image-preview-clear2').click(function(){
                  $('.image-preview2').attr("data-content","").popover('hide');
                  $('.image-preview-filename2').val("");
                  $('.image-preview-clear2').hide();
                  $('.image-preview-input2 input:file').val("");
                  $(".image-preview-input-title2").text("Browse"); 
              }); 
              // Create the preview image
              $(".image-preview-input2 input:file").change(function (){     
                  var img = $('<img/>', {
                      id: 'dynamic',
                      width:250,
                      height:200
                  });      
                  var file = this.files[0];
                  var reader = new FileReader();
                  // Set preview image into the popover data-content
                  reader.onload = function (e) {
                      $(".image-preview-input-title2").text("Change");
                      $(".image-preview-clear2").show();
                      $(".image-preview-filename2").val(file.name);            
                      img.attr('src', e.target.result);
                      $(".image-preview2").attr("data-content",$(img)[0].outerHTML).popover("show");
                  }        
                  reader.readAsDataURL(file);
                 });  
              });

      $(document).on('click', '#close-preview3', function(){ 

              $('.image-preview3').popover('hide');
              // Hover befor close the preview
              $('.image-preview3').hover(
                  function () {
                     $('.image-preview3').popover('show');
                  }, 
                   function () {
                     $('.image-preview3').popover('hide');
                  }
              );    
          });

        $(function() {
              // Create the close button
              var closebtn = $('<button/>', {
                  type:"button",
                  text: 'x',
                  id: 'close-preview3',
                  style: 'font-size: initial;',
              });
              closebtn.attr("class","close pull-right");
              // Set the popover default content
              $('.image-preview3').popover({
                  trigger:'manual',
                  html:true,
                  title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                  content: "There's no image",
                  placement:'bottom'
              });
              // Clear event
              $('.image-preview-clear3').click(function(){
                  $('.image-preview3').attr("data-content","").popover('hide');
                  $('.image-preview-filename3').val("");
                  $('.image-preview-clear3').hide();
                  $('.image-preview-input3 input:file').val("");
                  $(".image-preview-input-title3").text("Browse"); 
              }); 
              // Create the preview image
              $(".image-preview-input3 input:file").change(function (){     
                  var img = $('<img/>', {
                      id: 'dynamic',
                      width:250,
                      height:200
                  });      
                  var file = this.files[0];
                  var reader = new FileReader();
                  // Set preview image into the popover data-content
                  reader.onload = function (e) {
                      $(".image-preview-input-title3").text("Change");
                      $(".image-preview-clear3").show();
                      $(".image-preview-filename3").val(file.name);            
                      img.attr('src', e.target.result);
                      $(".image-preview3").attr("data-content",$(img)[0].outerHTML).popover("show");
                  }        
                  reader.readAsDataURL(file);
                 });  
              });
    