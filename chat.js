


var chat = {}



chat.getMessages = function () {


	$.ajax({
		url: 'updateMessages.php',
		type: 'POST',
		success: function(data){
			$('#history').html(data);
		}
	});
}


chat.scrollDown = function (){
	// Scroll down
	var objDiv = document.getElementById("history");
	objDiv.scrollTop = objDiv.scrollHeight;
}

chat.initiate = function () {
	chat.getMessages();
	//chat.scrollDown();
	chat.getMaximum();
}



chat.interval = setInterval(chat.initiate, 2000);





