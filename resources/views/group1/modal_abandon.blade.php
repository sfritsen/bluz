<div class="modal fade" id="abandon_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Abandon Chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('g1_submit_abandon') }}">
                @csrf

            <div class="modal-body">

                <p>
                    Here you can log an abandoned chat.  Provide the chat session id and it will be flagged appropriately.
                </p>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="chat_session_id" class="form-control required" placeholder="Chat Session ID" value="{{ old('chat_session_id') }}" required>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn modal_btn">Submit</button> 
                <button type="button" class="btn modal_btn" data-dismiss="modal">Close</button>
            </div>

            </form>
        </div>
    </div>
</div>