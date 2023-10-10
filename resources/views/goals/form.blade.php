<div class="mb-3">
    <label for="title" class="form-label">{{__('goals.title')}}</label>
    {!!  Form::text('title', null, array_merge(['class' => 'form-control', 'id' => 'title']))  !!}
</div>
<div class="mb-3">
    <label for="percentage" class="form-label">{{__('goals.percentage')}}</label>
    {!!  Form::text('percentage', null, array_merge(['class' => 'form-control', 'id' => 'percentage']))  !!}
</div>
<div class="mb-3">
    <label for="static_or_dynamic" class="form-label">{{__('goals.static_or_dynamic')}}</label>
    {!!  Form::select('static_or_dynamic', ['static' => __('goals.static'), 'dynamic' => __('goals.dynamic')], null, array_merge(['class' => 'form-control', 'id' => 'static_or_dynamic']))  !!}
</div>
<div class="mb-3">
    {{ Form::submit(__('fields.save'), ['class' =>'btn btn-primary']) }}
</div>
