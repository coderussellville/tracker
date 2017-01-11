$(document).ready(function () {
  
});

$(document).on("click", ".require-check", function() {
  console.log("Checking required fields...");
  var errors = "";
  $(".ft-error").empty(); // may have to rethink this if more than one error is possible on the screen at a time
  
  $(".required").each(function(index) {
    var elem = $(this);
    
    if (elem.val() === "") {
      elem.addClass("input-error");
      
      var elemText = elem.attr('placeholder');
      if (elemText !== undefined && elemText.length > 0) { 
        errors = errors + elemText + "<br/>";
      }
      else {
        var dataText = elem.data("label");
        
        if (dataText !== undefined && dataText.length > 0) {
          errors = errors + dataText + "<br/>";
        }
      }
    }
    else {
      elem.removeClass("input-error");
    }
  });
  
  if (errors !== "") {
    $(this).before(("<div class='bg-danger ft-error'>" + errors + "</div>"));
  }
  
});