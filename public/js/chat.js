const connect = new WebSocket('ws://127.0.0.1:8888');

let messageCount = 0;
let userName = "User" + Math.floor(Math.random() * Math.floor(13));
document.getElementById('user_name').innerHTML = userName;

connect.onmessage = (e) => {
    let dataObject = JSON.parse(e.data);
    let messageBlockHtml = `<div class="d-flex justify-content-start mb-4"><div class="img_cont_msg"><span class="rounded-circle user_img_msg">😇</span></div><div class="msg_cotainer">${dataObject['user_text']} <span class="msg_time">${getDate()}</span></div></div>`;
    let messageBlock = document.getElementById('message-block');
    let messageCounter = document.getElementById('message-counter');

    messageCounter.innerHTML = (dataObject['message_counter']+=1).toString();
    messageBlock.insertAdjacentHTML('beforeend', messageBlockHtml);
    console.log(dataObject['message_counter']);
}

const getDate = () => {
    let today = new Date();
    let date = `${today.getMonth() + 1}-${today.getDate()}`;
    let time = `${today.getHours()}:${today.getMinutes()}`;
    let dateTime = `${date} ${time}`;

    return dateTime;
}

const send = () => {
    let userText = prompt();
    let messageBlockHtml = `<div class="d-flex justify-content-end mb-4"><div class="msg_cotainer_send">${userText} <span class="msg_time_send">${getDate()}</span> </div><div class="img_cont_msg"><span class="rounded-circle user_img_msg">😈</span></div></div>`;
    let messageBlock = document.getElementById('message-block');

    let mainInfo = {
        'message_counter': messageCount,
        'user_text': userText,
    };
    console.log(messageCount);
    messageBlock.insertAdjacentHTML('beforeend', messageBlockHtml);

    connect.send(JSON.stringify(mainInfo));
}
