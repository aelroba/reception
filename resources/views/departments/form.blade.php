<div class="mb-3">
    <label for="name" class="form-label">{{__('departments.name')}}</label>
    {!!  Form::text('name', null, array_merge(['class' => 'form-control', 'id' => 'name']))  !!}
</div>
<div class="mb-3">
    <label for="key" class="form-label">{{__('departments.key')}}</label>
    {!!  Form::text('key', null, array_merge(['class' => 'form-control', 'id' => 'key']))  !!}
</div>
<div class="mb-3">
    <label for="manager_id" class="form-label">{{__('departments.manager')}}</label>
    {{ Form::select('manager_id', $users, null, ['class' => 'form-control', 'id' => 'direct_manager']) }}
</div>
<div class="mb-3">
    {{ Form::submit(__('fields.save'), ['class' =>'btn btn-primary']) }}
</div>
