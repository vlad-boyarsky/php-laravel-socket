const connect = new WebSocket('ws://127.0.0.1:8888');

let userName = prompt('Your name:');

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
    connect.send(message);
    console.log(message);
}
