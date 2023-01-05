

<div class="modal fade" id="deleteModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">{{ __('Suppression') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('Attention la suppresion est irreversible') }}
            </div>
            <div class="modal-footer">

                <form action="" method="post" id="deleteForm">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Confirmer') }}</button>
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
</div>




    <script>
        $(document).ready(function() {
            var deleteForm = $("#deleteForm");
            console.log("Hello")
            $('.delete_link').on('click', function() {
               
                deleteForm.attr('action',$(this).attr('href'));               
            })
        });
    </script>

