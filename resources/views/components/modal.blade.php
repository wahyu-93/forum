 <!-- Modal -->
 <div class="modal fade" id="modalDeleteThread" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Delete Thread</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                Are you sure want to delete this thread ?    
            </div>

            <div class="modal-footer">
                <form action="{{ route('thread.destroy', $thread) }}" method="POST">
                    @csrf
                    @method('delete')
                
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete This Thread</button>    
                </form>
               
            </div>
        </div>
    </div>
</div>