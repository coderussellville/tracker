$(document).ready(function () {
  
});

function validateInput() {
  //console.log("Checking required fields...");
  var errors = "";
  $(".ft-error").empty().hide(); // may have to rethink this if more than one error section is possible on the screen at a time
  
  $(".required").each(function(index) {
    var elem = $(this);
    
    if (elem.val() === "") {
      elem.addClass("input-error");
      
      var elemText = elem.attr('placeholder');
      if (elemText !== undefined && elemText.length > 0) { 
        errors = errors + elemText + " is required.<br/>";
      }
      else {
        var dataText = elem.data("label");
        
        if (dataText !== undefined && dataText.length > 0) {
          errors = errors + dataText + "is required.<br/>";
        }
      }
    }
    else {
      elem.removeClass("input-error");
    }
  });
  
  return errors;
}

function validatePassword(password) {
  if (password.length < 8) {
    return "Password must be at least 8 characters.";
  } 
  else if (password.length > 30) {
    return "Password cannot exceed 30 characters";
  } 
  else if (password.search(/\d/) == -1) {
    return "Password must contain at least one number.";
  }
  else if (password.search(/[a-z]/) == -1) {
    return "Password must contain at least one lowercase letter.";
  } 
  else if (password.search(/[A-Z]/) == -1) {
    return "Password must contain at least one uppercase letter.";
  } 
  else if (password.search(/[!@#\$%\&\(\)\_\+]/) == -1) { //!, @, #, $, %, &, (, )
    return "Password must contain one of the following: !, @, #, $, %, &, (, )";
  }
  return "";
}

function validateEmailAddress(email) {
  //^\S+@\S+$
  if (email.search(/^[\S\s]+@\S+$/) == -1) {
  //if (email.search(/[A-Z]/) == -1) {
    return "Please enter a valid email address.";
  }
  
  return "";
}

//function 