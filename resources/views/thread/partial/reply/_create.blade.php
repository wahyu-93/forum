@auth
    <div class="d-flex">
        <div>
            <img 
                width="40" height="40"
                class="rounded-circle"
                style="object-fit: cover; object-position: center"
                src="{{ asset(auth()->user()->avatar()) }}" 
                alt="...">
        </div>

        <div class="flex-grow-1">                            
            <div class="text-secondary">
                <form action="{{ route('reply.store', $thread) }}" method="POST">
                    @csrf

                    <textarea 
                        name="body" id="body" 
                        class="form-control border-0 bg-transparent shadow-none"
                        style="resize: none; margin-left: -5px;"  
                        onclick="show('inline', event)"
                        placeholder="Submit Your Comment..."></textarea>
                
                    <div class="float-end">
                        <button class="btn btn-sm btn-outline-secondary" id="batal" style="display: none;" onclick="show('none',event)">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="komentari" style="display: none;">Comment</button>
                    </div>
                </form>
            </div>
        </div>                        
    </div>
@endauth

@guest
    <h5>Please <a href="{{ route('login') }}">Login</a> Before Comment</h5>    
@endguest

<hr>