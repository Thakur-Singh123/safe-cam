<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Chat</h2>
    <select id="user-list">
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <div id="chat-box" style="height: 400px; overflow-y: scroll; border: 1px solid black; padding: 10px;">
    </div>

    <input type="text" id="message" placeholder="Type a message...">
    <button id="send-message">Send</button>

    <script>
        var selectedUser = $('#user-list').val();

        function loadMessages() {
            $.post('/get-messages', { user_id: selectedUser }, function(messages) {
                $('#chat-box').html('');
                messages.forEach(function(message) {
                    $('#chat-box').append('<p><b>' + (message.from_user == {{ Auth::id() }} ? 'You' : 'Them') + ':</b> ' + message.message + '</p>');
                });
            });
        }

        $('#user-list').change(function() {
            selectedUser = $(this).val();
            loadMessages();
        });

        $('#send-message').click(function() {
            var message = $('#message').val();
            if (message.trim() == '') return;
            
            $.post('/send-message', { to_user: selectedUser, message: message }, function() {
                $('#message').val('');
                loadMessages();
            });
        });

        // Pusher Real-time Listening
        var pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
            cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
            encrypted: true
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('new-message', function(data) {
            if (data.to_user == {{ Auth::id() }} || data.from_user == {{ Auth::id() }}) {
                loadMessages();
            }
        });

        // Load messages initially
        loadMessages();
    </script>

</body>
</html>
