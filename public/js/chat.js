const connect = new WebSocket('ws://127.0.0.1:8888');

let userName = prompt('Your name:');

document.getElementById('user_name').innerHTML = userName;

connect.onopen = () => {
    console.log(`New user ${userName} connected`);
}

connect.onmessage = (e) => {
    console.log(`${e.data}`);
}

const getDate = () => {
    let today = new Date();
    let date = `${today.getFullYear()}-${today.getMonth() + 1}-${today.getDate()}`;
    let time = `${today.getHours()}:${today.getMinutes()}:${today.getSeconds()}`;
    let dateTime = `${date} ${time}`;

    return dateTime;
}

const send = () => {
    let userText = prompt();
    let message = `-${userName}: ${userText} [${getDate()}]`;
    let messageBlockHtml = `<div class="d-flex justify-content-end mb-4"><div class="msg_cotainer_send">${userText} <span class="msg_time_send">8:55 AM, Today</span> </div><div class="img_cont_msg"><img src="" class="rounded-circle user_img_msg"></div></div>`;
    let messageBlock = document.getElementById('message-block');

    messageBlock.insertAdjacentHTML('beforeend', messageBlockHtml);

    connect.send(message);
    console.log(message);
}
