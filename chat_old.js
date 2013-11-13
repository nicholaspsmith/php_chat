


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

chat.getMaximum = function () {
	echo 'getMaximum';
	$.getJSON("chat.php", function(returnedFromServer){
	//returnedFromServer will be {"firstName":"Alexander","surName":"Danehy"}

	alert(returnedFromServer.firstName); //this will alert "Alexander", without the quotes

});
}

chat.interval = setInterval(chat.initiate, 2000);





