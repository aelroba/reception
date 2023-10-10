
<div class="mb-3">
    <label for="direct_manager" class="form-label">{{__('fields.direct_manager')}}</label>
    {{ Form::select('direct_manager', $users, null, ['class' => 'form-control', 'id' => 'direct_manager']) }}
</div>

<div class="mb-3">
    <label for="name" class="form-label">{{__('fields.name')}}</label>
    {{ Form::text('name', null, array_merge(['class' => 'form-control', 'id' => 'name'])) }}
</div>
<div class="mb-3">
    <label for="email" class="form-label">{{__('fields.email')}}</label>
    {{ Form::email('email', null, array_merge(['class' => 'form-control', 'id' => 'email'])) }}
</div>
<div class="mb-3">
    <label for="pass" class="form-label">{{__('fields.password')}}</label>
    {{ Form::password('pass', array_merge(['class' => 'form-control', 'id' => 'pass'])) }}
</div>
<div class="mb-3">
    <label for="direct_manager" class="form-label">{{__('fields.status')}}</label>
    {{ Form::select('status', [0 => 'inactive', 1 => 'active'], null, ['class' => 'form-control', 'id' => 'status']) }}
</div>
<div class="mb-3">
    <label for="employee_id" class="form-label">{{__('fields.employee_id')}}</label>
    {{ Form::text('employee_id', null, array_merge(['class' => 'form-control', 'id' => 'employee_id'])) }}
</div>
<div class="mb-3">
    <label for="job_title" class="form-label">{{__('fields.job_title')}}</label>
    {{ Form::text('job_title', null, array_merge(['class' => 'form-control', 'id' => 'job_title'])) }}
</div>
<div class="mb-3">
    <label for="specialization" class="form-label">{{__('fields.specialization')}}</label>
    {{ Form::text('specialization', null, array_merge(['class' => 'form-control', 'id' => 'specialization'])) }}
</div>
<div class="mb-3">
    <label for="qualification" class="form-label">{{__('fields.qualification')}}</label>
    {{ Form::text('qualification', null, array_merge(['class' => 'form-control', 'id' => 'qualification'])) }}
</div>
<div class="mb-3">
    <label for="job_grade" class="form-label">{{__('fields.job_grade')}}</label>
    {{ Form::text('job_grade', null, array_merge(['class' => 'form-control', 'id' => 'job_grade'])) }}
</div>

<div class="mb-3">
    <label for="level_one" class="form-label">{{__('fields.level_one')}}</label>
    {{ Form::text('level_one', null, array_merge(['class' => 'form-control', 'id' => 'level_one'])) }}
</div>
<div class="mb-3">
    <label for="level_two" class="form-label">{{__('fields.level_two')}}</label>
    {{ Form::text('level_two', null, array_merge(['class' => 'form-control', 'id' => 'level_two'])) }}
</div>
<div class="mb-3">
    <label for="level_three" class="form-label">{{__('fields.level_three')}}</label>
    {{ Form::text('level_three', null, array_merge(['class' => 'form-control', 'id' => 'level_three'])) }}
</div>

<div class="mb-3">
    <label for="role" class="form-label">{{__('role')}}</label>
    <div class="form-check">
        <input class="form-check-input" name="role" type="radio" value="admin" {{!empty($user) ? ($user->hasRole('admin') ? 'checked' : '') : null}}>
        <label class="form-check-label">
            Admin
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="role" type="radio" value="hr-manager" {{!empty($user) ? ($user)->hasRole('hr-manager') ? 'checked' : '' : null}}>
        <label class="form-check-label">
            Hr Manager
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" name="role" type="radio" value="reviewer" {{!empty($user) ? ($user)->hasRole('reviewer') ? 'checked' : '' : null}}>
        <label class="form-check-label">
            Reviewer
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="role" type="radio" value="director" {{!empty($user) ? ($user)->hasRole('director') ? 'checked' : '' : null}}>
        <label class="form-check-label">
            Manager/Director
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" name="role" type="radio" value="employee" {{!empty($user) ? ($user)->hasRole('employee') ? 'checked' : '' : null}}>
        <label class="form-check-label">
            Employee
        </label>
    </div>
</div>
<div class="mb-3">
    {{ Form::submit(__('fields.save'), ['class' =>'btn btn-primary']) }}
</div>
