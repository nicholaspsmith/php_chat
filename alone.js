

// Do these things when the page loads
window.onload = function() {

    // Scroll to the bottom of the chat history
    scroll();
};

function scroll() {
	document.getElementById("history").scrollTop
        = document.getElementById("history").scrollHeight;
}


var chat = {}

chat.getMessages = function() {
	$.ajax({
		url: 'updateMessages.php',
		type: 'POST',
		success: function(data){
			// replaces html inside history to whatever this func returns
			$('#history').html(data);
		}
	});
}

chat.interval = setInterval(chat.getMessages, 2000);