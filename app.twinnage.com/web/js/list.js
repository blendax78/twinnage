//This will be used when lists are made dynamic/AJAXified
        
if (typeof columnInfo != 'undefined' && typeof listObjects != 'undefined'){

	//google.setOnLoadCallback(drawTable);
	google.load('visualization', '1', {packages:['table']});
	function drawTable(columnInfo, listObjects, divName, options) {
	
		if (typeof options == 'undefined'){
			options = {
				allowHtml: true,
				sortColumn: 0,
				page: 'enable',
				pageSize: 10,
				showRowNumber: false
			};
		}else if(typeof options == 'object'){
			//is defined
			options.allowHtml = (typeof options.allowHtml != 'undefined') ? options.allowHtml : true;
			options.sortColumn = (typeof options.sortColumn != 'undefined') ? options.sortColumn : 0;
			options.page = (typeof options.page != 'undefined') ? options.page : 'enable';
			options.pageSize = (typeof options.pageSize != 'undefined') ? options.pageSize : 10;
			options.showRowNumber = (typeof options.showRowNumber != 'undefined') ? options.showRowNumber : false;
		}
		
	    var data = new google.visualization.DataTable();
	    $.each(columnInfo,function(index,col){
	        data.addColumn(col.type, col.name);
	    });

	    data.addRows(listObjects);

	    var table = new google.visualization.Table(document.getElementById(divName));
	    table.draw(data, {	showRowNumber: options.showRowNumber, 
							allowHtml: options.allowHtml, 
							sortColumn: options.sortColumn, 
							page: options.page, 
							pageSize: options.pageSize,
                    		cssClassNames: {tableRow: 'table', 
    										headerRow: 'table bold', 
    										oddTableRow: 'table table-row-odd', 
    										//hoverTableRow: 'table', 
    										selectedTableRow: 'table'} 
  									});
	}

	function formatDate(d){
		if (typeof d == 'string'){
			d = new Date(d);
		}
		return padZero(d.getMonth()+1) + '/' + padZero(d.getDate()) + '/' + d.getFullYear() + ' ' + padZero(d.getHours()) + ':' + padZero(d.getMinutes()) + ':' + padZero(d.getSeconds());
	}

	function padZero(num){
	if (num < 10){
		return '0' + num.toString();
	}else{
		return num;
	}
}
}