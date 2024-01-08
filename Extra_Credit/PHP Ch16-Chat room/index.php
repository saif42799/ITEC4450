<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;

}

?>

<!DOCTYPE htmi>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room-AH</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
</head>

<body class="w3-theme-14">
    <div class="w3-container w3-center">
        <h1>Chat Room</h1>
        <h2>Current username: <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h2>
    </div>
    <form class="w3-container w3-theme-d2">
        <label>Enter your text</label>
        <input type='text' size="80" id="messageText" />
        <input type='button' id="sendBtn" value="Send" />
        <br> 
    </form>

    <div class="w3-container w3-theme-12" id="chatMessages" rows="10" cols="200">
        Chat messages will appear here
     </div>

     <form class="w3-container w3-theme-d3">

        <input type='button' id="refreshBtn" value="Refresh" /><br>

    </form><br><br><br>

    <div class="w3-container">
        <a href="welcome.php" class="w3-btn w3-theme-d1">Welcome</a>
        <a href="reset-password.php" class="w3-btn w3-theme-d1">Reset Your Password</a> 
        <a href="logout.php" class="w3-btn w3-theme-d2">Sign Out of Your Account</a>

    </div>

    <script>
        document.getElementById('sendBtn').addEventListener('click', sendMessage);
        document.getElementById('refreshBtn').addEventListener('click', loadMessages);
        var listTextColors = ['w3-text-purple', 'w3-text-indigo', 'w3-text-deep-purple', 'w3-text-pink', 'w3-text-blue',
        'w3-text-cyan', 'w3-text-teal', 'w3-text-brown', 'w3-text-green', 'w3-text-red'];

        function sendMessage(e) {
            e.preventDefault();
            var msgText = document.getElementById('messageText').value;
            var params = "message=" + msgText + "&user_id=" + <?php echo $_SESSION["id"]; ?>;
            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'sendMessage.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (this.status == 200) {
                    console.log('Message sent!');
                    console.log(this.responseText);
                }
            }

            xhr.send(params);
        }

        function loadMessages(e) {
            e.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'loadMessages.php', true);

            xhr.onload = function () {
                if (this.status == 200) {
                    var msgList = JSON.parse(this.responseText);
                    var output = "";

                    for (var i in msglist) {
                        var sTime = msglist[i].timeStamp.split(' ')[1];

                        output += "<div class='w3-container'> ";
                        output += sTime + ' | ' + msglist[i].userName + ' | ' + msglist[i].msg;
                        output += "</div>";
                    }
                    document.getElementById('chatMessages').innerHTML = output;
                }
            }
                    
            xhr.send();

        }

        setInterval(refreshMessages, 1000);

        function refreshMessages() {
            var listUserMessagesColors = {};
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'loadMessages. php', true);

            xhr.onload = function () {
                if (this.status == 200) {
                    var msgList = JSON.parse(this.responseText);

                    var curUsername = '<?php echo htmlspecialchars($_SESSION["username"]); ?>';

                    var output = '';

                    for (var i in msglist) {
                        var sTime = msgList[i].timeStamp.split(' ')[1];
                        var msgUsername = msgList[i].userName;

                        if (curUsername == msgUsername) {
                            output += "<div class='w3-container w3-text-black'>";
                            output += "<div class='w3-right' > <b>";
                            output += msgList[i].msg + ' | ' + msglist[i].userName + ' | ' + sTime;
                            output += "</div></b>";
                            output += "</div>";
                        }
                        else {
                            var userColor = "w3-black";
                            if (msgUsername in listUserMessagesColors) {
                                userColor = listUserMessagesColors[msgUsername];
                            }
                            else {
                                var numColorsUsed = Object.keys(listUserMessagesColors).length;

                                var colorIndex = (numColorsUsed) % (listTextColors.length);

                                listUserMessagesColors[msgUsername] = listTextColors[colorIndex];
                                userColor = listUserMessagesColors[msgUsername];

                            }

                            output += "<div class='w3-container " + userColor + " '><b";
                            output += sTime + ' | ' + msgList[i].userName + ' | ' + msgList[i].msg;
                            output += "</b> </div>";
                        }
                    }

                    document.getElementById('chatMessages').innerHTML = output;

                }
            }
                    
            xhr.send();
        }

    </script>
</body>
</html>