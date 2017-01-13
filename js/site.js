$(document).ready(function () {
  
});

//$(document).on("click", ".require-check", function() {
function validateInput() {
  console.log("Checking required fields...");
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
  
  //if (errors !== "") {
    //$("#errorDisplay").html("<div class='bg-danger ft-error'>" + errors + "</div>");
  //  $(this).before("<div class='bg-danger ft-error'>" + errors + "</div>");
  //}
  
  return errors;
}
//});