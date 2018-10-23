function inline_results(){
			new Ajax.updater('function_description', 
			base_url+'aplication/ajaxsearch',){method:'post', postBody:'description=true&'}	
}