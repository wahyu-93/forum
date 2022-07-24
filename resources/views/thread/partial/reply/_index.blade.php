@forelse ($replies as $reply)
    <div class="d-flex mb-4">
        <div>
            <img 
                width="40" height="40"
                class="rounded-circle"
                style="object-fit: cover; object-position: center"
                src="{{ $reply->user->avatar() }}" 
                alt="...">
        </div>
        
        <div class="flex-grow-1 ms-2">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>{{ $reply->user->name }} 
                        <span class="text-secondary" style="font-size: 12px">Reply {{ $reply->created_at->diffForhumans() }}</span>
                    </h5>
                </div>

                <div>
                    <span class="text-success">Mars as answer</span>
                </div>
            </div>
            
            <div>
                {!! nl2br($reply->body) !!}
            </div>
        </div>
    </div>
@empty
    <p class="text-center text-secondary fs-5">No Comments On This Thread !</p>
@endforelse