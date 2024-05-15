<div>
<!-- Modal -->
    <div  wire:ignore.self class="modal fade " id="backDropModal" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-body d-flex justify-content-center mt-4 align-items-center ">
                <span class="text-primary">
                    <i class="float-center bx bx-info-circle bx-lg"></i>
                        <span class="h5 text-muted">Update status ?</span>
                </span>
            </div>
            <form wire:submit.prevent="update">
                @csrf
                <input type="hidden" name="" wire:model.defer="requestId">
                <div class="modal-footer d-flex justify-content-between align-items-center">
                    <button type="reset" wire:click="cancel()" class="btn btn-outline-secondary float-end" data-bs-dismiss="modal">
                    Batal
                    </button>
                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
