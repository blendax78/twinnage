(function () {
    function load_content() {
        if (sId && sId.length > 0  && aId){
            var xmlhttp;
            if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }else{// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                	var snippets;
                	var elems;
                	if( typeof JSON != "undefined"){
                		snippets = JSON.parse(xmlhttp.responseText);
                	}else{
                		snippets = eval("("+xmlhttp.responseText+")");
            		}
                	
                	if (snippets.length > 0){
                		for (var i = 0; i < snippets.length; i++){
                			switch (snippets[i].snippet_type){
	                			case 3:
	                				var s = document.createElement('style');
	                				s.appendChild(document.createTextNode(snippets[i].content));
	                				document.getElementsByTagName('head')[0].appendChild(s);
	                				break;
	                			case 4:
	                				var s = document.createElement('script');
	                				s.type="text/javascript";
	                				s.appendChild(document.createTextNode(snippets[i].content));
	                				document.getElementsByTagName('head')[0].appendChild(s);
	                				break;
	                			case 5:
	                				var s = document.createElement('link');
	                				s.type = 'text/css';
	                				s.rel = "stylesheet";
	                				s.href = snippets[i].content;
	                				document.getElementsByTagName('head')[0].appendChild(s);
	                				break;
	                			case 6:
	                				var s = document.createElement('script'); 
	                				s.type = 'text/javascript'; 
	                				s.src = snippets[i].content;
	                				document.getElementsByTagName('head')[0].appendChild(s);
	                				break;
	            				default:
	                    			elems = document.getElementsByClassName("tw" + snippets[i].id);
		                        	if (elems.length > 0){
		                        		for (var j = 0; j < elems.length; j++){
		                        			elems[j].innerHTML = snippets[i].content;                			
		                        		}
		                        	}	            					
	            					break;
                			}
                		}
                	}
                }
            }
            xmlhttp.open("GET","http://twinnage_api.aws.af.cm/?account_id=" + aId + "&id=" + sId,true);
            xmlhttp.send();
        }
    }
/*(function () { function async_load() { var s = document.createElement('script'); 
  s.type = 'text/javascript'; s.src = "http://twinnage.localhost.com/js/twinnapp.js"; 
 * var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c); } 
 * if (window.attachEvent) { window.attachEvent('onload', async_load); } 
 * else { window.addEventListener('load', async_load, false); } })();*/

    load_content();

})();