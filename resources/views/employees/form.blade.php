
<div class="mb-3">
    <label for="user_id" class="form-label">{{__('employees.name')}}</label>
    {{ Form::select('user_id', $users, null, ['class' => 'form-control', 'id' => 'user_id']) }}
</div>
