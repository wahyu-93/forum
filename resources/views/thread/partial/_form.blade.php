@csrf

<div class="form-group mb-3">
    <label for="title">Title</label>
    <input 
        type="text" name="title" id="title" placeholder="title"
        value="{{ old('title') ?? $thread->title }}" 
        class="form-control @error('title') is-invalid @enderror">

    @error('title')
        <p class="text-danger mt-2">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="tag">Tag</label>
    <select name="tag" id="tag" class="form-control @error('tag') is-invalid @enderror">
        <option disabled selected>Choose Tag</option>
        
        @foreach ($tags as $tag)
            <option {{ $tag->id == $thread->tag_id ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>

    @error('tag')
        <p class="text-danger mt-2">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="body">Body</label>
    <textarea 
        name="body" id="body" rows="10" 
        class="form-control @error('body') is-invalid @enderror" style="resize: none">{{ old('body') ?? $thread->body }}</textarea>
    
    @error('body')
        <p class="text-danger mt-2">{{ $message }}</p>
    @enderror
</div>