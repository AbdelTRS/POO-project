function getMessages(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "php/handler.php");
  
    requeteAjax.onload = function(){
      const resultat = JSON.parse(requeteAjax.responseText);
      const html = resultat.reverse().map(function(chat){
        return `
          <div class="message">
            <span class="date">[${chat.date_hour.substring(11, 16)}]</span>
            <span class="author">${chat.chatname}:</span> 
            <span class="content">${chat.content}</span>
            <hr>
          </div>
        `
      }).join('');
  
      const messages = document.querySelector('.messages');
  
      messages.innerHTML = html;
      messages.scrollTop = messages.scrollHeight;
    }
    requeteAjax.send();
  }

  function sendMessages(event){

    event.preventDefault();

    const author = document.querySelector('.author');
    const content = document.querySelector('.content');

    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value);

    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("POST", "php/handler.php?task=write");
    
    requeteAjax.onload = function(){
      content.value = '';
      content.focus();
      getMessages();
    }
  
    requeteAjax.send(data);
  }
  
  document.querySelector('form').addEventListener('submit', sendMessages);
  
  const interval = window.setInterval(getMessages, 3000);
  
  getMessages();