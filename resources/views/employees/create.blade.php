
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary"
        data-toggle="modal" data-target="#employee_create">
    {{__('employees.create')}}
</button>

<!-- Modal -->
<div class="modal fade goal_item_modal" id="employee_create" tabindex="-1"
     aria-labelledby="employee_createLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('employees.create')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('employees.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{__('fields.close')}}
                </button>
                <button type="button" id="saveGoalItem"
                        onclick="saveEmployee()"
                        class="btn btn-primary">
                    {{__('fields.save')}}
                </button>
            </div>
        </div>
    </div>
</div>
