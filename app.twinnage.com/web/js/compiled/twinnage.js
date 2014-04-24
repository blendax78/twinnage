$(document).ready(function(){
    $('#snippetPreviewBtn').click(function(e){
        e.preventDefault();
        $('#snippetPreviewModal').modal({show:true, backdrop:'static', keyboard:true});
    });

    $("#viewIframeCode").click(function(e){
        e.preventDefault();
        $('#iframeCodeModal').modal({show:true, backdrop:'static', keyboard:true}); 
    });

    $("#viewJavascriptCode").click(function(e){
        e.preventDefault();
        $('#javascriptCodeModal').modal({show:true, backdrop:'static', keyboard:true}); 
    });

    $("#deleteSnippetBtn").click(function(){
       if (confirm('Are you sure?')){
           $.post(getBaseURL() + 'ajax/del/' + $(this).attr('data-id') + '/account/' + $(this).attr('data-account_id'),
        		   function(result){
        			   location.href = getBaseURL() + 'snippet';
        		   });
       }
    });
});

function getBaseURL () {
	   var baseUrl = location.protocol + "//" + location.hostname + 
	      (location.port && ":" + location.port) + "/";
	   
	   if (location.pathname.search('app_dev.php') > 0){
		   baseUrl += 'app_dev.php/'
	   }
	   return baseUrl;
}
