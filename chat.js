var showChat = function(json) {
    console.log(json);
    for (var i in json) {
        // lähdetään sisältä ulos
        var title = document.createTextNode(json[i].teksti);
        
        var p = document.createElement('p');
        
        p.classList.add("message");
        p.appendChild(title);
        
        if (json[i].kayttaja == json[i].kayttaja1){
            p.classList.add("message_sent");
        }
        else{
            p.classList.add("message_recived");
        }
        
        var div = document.createElement('div');
        div.classList.add("braker");
        div.appendChild(p);
		
        var chat_area = document.querySelector('.chat_area');
        chat_area.appendChild(div);
    }
}

fetch('creatingChat.php',{
  credentials: 'same-origin'
}).then(function(response) {
    // Convert to JSON

    return response.json();
}).then(function(j) {
    console.log(j);
    // Yay, `j` is a JavaScript object
    showChat(j);
});
