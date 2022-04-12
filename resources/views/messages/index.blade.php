<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">ChatBox</h3>
    </div>
    <div class="panel-body">
        <div class="messages-wrapper">
            <ul class="messages">
            
                @foreach($messages as $message)
                <li class="message clearfix">
                    <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                        <p>{{ $message->message }}</p>
                        <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                    </div>
                </li> <br>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="panel-footer">
        <div class="input-text">
            <input type="text" name="message" class="submit" placeholder="Ketik disini..">
        </div>
    </div>
</div>