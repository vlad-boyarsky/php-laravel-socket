const connect = new WebSocket('ws://127.0.0.1:8888');

connect.onopen = (e) => {
    console.log('Connected');
}

connect.onmessage = (e) => {
    console.log('Get data ' + e.data);
}

function send() {
    let message = "hello for you ";
    connect.send(message);
    console.log(' ' + message + ' was send');
}
