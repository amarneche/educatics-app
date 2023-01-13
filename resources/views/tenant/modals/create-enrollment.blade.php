
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<form action="{{route('tenant.enrollments.store')}}" method="post">
@csrf
@method('post')

<div class="modal fade" id="modal-create-enrollment" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="enrollmentTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollmentTitle">{{__("Create new enrollment")}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="student_id" class="form-label">{{__("Student")}}</label>
                    <select class="form-select " name="student_id" id="student_id" required>
                        <option selected>Select one</option>
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="course_id" class="form-label">{{__("Course")}}</label>
                    <select class="form-select " name="course_id" id="course_id">
                        <option selected>Select one</option>
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="batch_id" class="form-label">{{__("Batch")}}</label>
                    <select class="form-select " name="batch_id" id="batch_id">
                        <option selected>Select one</option>
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="enrollment_date" class="form-label">{{__("Date")}}</label>
                  <input type="date"
                    class="form-control" name="enrollment_date" id="enrollment_date" aria-describedby="enrollment_date_help_id" placeholder="date">
                  <small id="enrollment_date_help_id" class="form-text text-muted">{{__("Enter enrollment date")}}</small>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("Close")}}</button>
                <button type="submit" class="btn btn-primary">{{__("Create")}}</button>
            </div>
        </div>
    </div>
</div>
</form>


@if($errors->any())
@section('scripts')
<script>
    $('document').ready(function(){
        $('#modal-create-enrollment').modal('show')
    });
</script>
@endsection
@endif