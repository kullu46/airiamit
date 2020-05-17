function validateFubForm(form, e){
  e.preventDefault();
  var ajaxLoader = jQuery(form).find('.fub-ajax-loader'),
    admin_ajax_url = jQuery(form).find('input[name="admin_ajax_url"]').val()/* ,
    regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
    regExPhone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im,
    name = jQuery(form).find('input[name="fub_name"]').val(),
    email = jQuery(form).find('input[name="fub_email"]').val(),
    phone = jQuery(form).find('input[name="fub_phone"]').val(),
    message = (jQuery(form).find('textarea[name="fub_message"]').length) ? jQuery(form).find('textarea[name="fub_message"]').val() : '',
    tags = jQuery(form).find('input[name="fub_tags"]').val();
    lead_type = jQuery(form).find('input[name="fub_lead_type"]').val() */;
  /* if(name == ''){
    jQuery(form).find('.fub-response').html('<div class="error">Please provide your name.</div>');
  } else if(email == ''){
    jQuery(form).find('.fub-response').html('<div class="error">Please provide your email address.</div>');
  } else if(regExEmail.test(email) !== true){
    jQuery(form).find('.fub-response').html('<div class="error">Please provide a valid email address.</div>');
  } else if(phone == ''){
    jQuery(form).find('.fub-response').html('<div class="error">Please provide your contact number.</div>');
  } else if(regExPhone.test(phone) !== true){
    jQuery(form).find('.fub-response').html('<div class="error">Please provide a valid contact number.</div>');
  } else { */
    jQuery(form).find('.fub-response').html('');
    ajaxLoader.fadeIn();
    jQuery.ajax({
      type: 'post',
      url: admin_ajax_url,
      data: {
        action: 'fub_form_posted',
        formData: jQuery(form).serialize() /* {
          fub_name: name,
          fub_email: email,
          fub_phone: phone,
          fub_message: message,
          fub_lead_type: lead_type,
          fub_tags: tags
        } */
      },
      success: function(response){
        response = JSON.parse(response);
        if(response.success == 1){
          jQuery(form).find('.fub-response').html('<div class="success">'+response.message+'</div>');
          jQuery(form)[0].reset();
        } else {
          jQuery(form).find('.fub-response').html('<div class="error">'+response.message+'</div>');
        }
        ajaxLoader.fadeOut();
        setTimeout(function(){
          jQuery(form).find('.fub-response').html('');
        }, 4000);
      },
      error: function(err){
        ajaxLoader.fadeOut();
        console.log("Err: ", err);
        alert("Unknown error. Please try again!");
      }
    });
  /* } */
}
