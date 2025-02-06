<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
    <h2>Real-time Chat</h2>
    <label>Select User:</label>
    <select id="userSelect">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <div id="chat-box"></div>
    <input type="text" id="message" placeholder="Type a message">
    <button id="sendMessage">Send</button>

    <script>
        var selectedUser = $("#userSelect").val();

        function loadMessages() {
            $.get("/fetch-messages/" + selectedUser, function(data) {
                $("#chat-box").html("");
                data.forEach(function(msg) {
                    $("#chat-box").append("<p><strong>" + (msg.from_user == "{{ auth()->id() }}" ? "You" : "Them") + ":</strong> " + msg.message + "</p>");
                });
            });
        }

        $("#userSelect").change(function() {
            selectedUser = $(this).val();
            loadMessages();
        });

        $("#sendMessage").click(function() {
            let message = $("#message").val();
            $.post("/send-message", {
                _token: "{{ csrf_token() }}",
                to_user: selectedUser,
                message: message
            }, function() {
                $("#message").val('');
                loadMessages();
            });
        });

        Pusher.logToConsole = true;
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
        });

        var channel = pusher.subscribe("chat-channel");
        channel.bind("message-event", function(data) {
            if (data.to_user == "{{ auth()->id() }}" || data.from_user == "{{ auth()->id() }}") {
                loadMessages();
            }
        });

        loadMessages();
    </script>
</body>
</html>
