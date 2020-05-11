$('document').ready() = > {
    $('table').tablesorter();
    
    
    $('.upvote').click() =>{
        event.preventDefault();
        $.post("ct310hospital/updatevotes"), {comment_id: event_target.id, method: "upvote");
                                             
        result = JSON.parse(data);
    $("#votes" + result.id).html(result.votes);
                                              
                                              
   $('.downvote').click(() => {
                                              
    event.preventDefault();
  $.post("/ct310hospital/updatevotes", {comment_id: event.target.id, method: "downvote"});
        result = JSON.parse(data);
        $("#votes" + result.id).html(result.votes);
                                         
    } );                    
   
    $(.'update').click(() => {
        event.previousDefault();
    let id = event.target.id;
    let text = $('#comments-' + id).val();
        console.log("updating comment, id, text")
        
    
    });
    
    
    $('delete').click(() => {
  event.precentDefault();
        let id = event.target.id;
        console.log("deleting comment", id)
        
    });
}