function addParagraphIDs() {
  $("section").each(function(){
    var section_id = $(this).attr("id");
    var counter = 1;
    $(this).find("p").each(function(){
      var paragraph_id = section_id + "-p-" + counter;
      counter++;
      $(this).attr("id", paragraph_id);
    });
    var counter = 1;
    $(this).find("li").each(function(){
      var paragraph_id = section_id + "-li-" + counter;
      counter++;
      $(this).attr("id", paragraph_id);
    });
  });
}
