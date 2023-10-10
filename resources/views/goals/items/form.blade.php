<div class="mb-3">
    {!!  Form::hidden('goal_id', $goal_id)  !!}
    <label for="title" class="form-label">{{__('goals.items.title')}}</label>
    {!!  Form::text('title', null, array_merge(['class' => 'form-control', 'id' => 'title']))  !!}
</div>
