<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>

<body onunload="closeConnect()" onbeforeunload="closeConnect()">
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        <li class="active">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <span class="rounded-circle user_img">😀</span>
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span id="user-name"></span>
                                    <p>is online</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer"></div>
            </div></div>
        <div class="col-md-8 col-xl-6 chat">
            <div class="card">
                <div class="card-header msg_head">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <span class="rounded-circle user_img">🤑</span>
                            <span id="user-active" class="online_icon offline"></span>
                        </div>
                        <div class="user_info">
                            <span>New Chat with <b id="user-name-guest"></b><span id="wait-user">😴</span></span>
                            <p><b id="user-name-guest">User</b> Send <b id="message-counter">0</b> Message(-s)</p>
                        </div>
                    </div>
                </div>
                <div class="card-body msg_card_body" id="message-block">

                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <textarea class="form-control type_msg" id="user-text" placeholder="Message..."></textarea>
                        <div class="input-group-append">
                            <span class="input-group-text send_btn" onclick="send();"><i class="fas fa-location-arrow"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/chat.js')}}"></script>
</body>
</html>

