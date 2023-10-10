<div class="mb-3">
    <label for="title" class="form-label">{{__('template.title')}}</label>
    {!!  Form::text('title', null, array_merge(['class' => 'form-control', 'id' => 'title']))  !!}
</div>
<div class="mb-3">
    <label for="key" class="form-label">{{__('template.key')}}</label>
    {!!  Form::text('key', null, array_merge(['class' => 'form-control', 'id' => 'key']))  !!}
</div>
<div class="mb-3">
    {{ Form::submit(__('fields.save'), ['class' =>'btn btn-primary']) }}
</div>
