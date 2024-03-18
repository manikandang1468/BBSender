import express, { response } from 'express';
import { Client } from 'whatsapp-web.js';

const client = new Client();
const app = express()

let qrm = '';
let stat = false;

client.on('qr', (qr) => {
    console.log('QR RECEIVED');
    qrm = qr;
});

client.on('ready', () => {
    stat = true;
    console.log('Client is ready!');
});

client.on('message', msg => {
    if (msg.body == 'hello') {
        msg.reply('hello x 2');
    }
});

async function deploy_all(req, res) {

    console.log(true);

    let message = req.params.msg;
    let number = `91${req.params.number}@c.us`;
    const isRegistered = client.isRegisteredUser(number);
    const msg2 = client.sendMessage(number, message);
    console.log(msg2);
}

function logoutde() {
    client.logout(0);
    client.initialize();
    stat = false;
    return true;
}

client.initialize();

app.get('/qr', function (req, res) {
    res.send({qrs: qrm, status: stat})
})

app.post('/msg/:msg/number/:number', function(req, res) {
    deploy_all(req, res);
    res.send(true);
});

app.get('/logout', function(req, res) {
    logoutde();
    console.log(stat);
    res.send({status: stat});
})

app.listen(3000)