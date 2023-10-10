
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary"
        data-toggle="modal" data-target="#goalItem_{{$goal_id}}">
    {{__('goals.items.create')}}
</button>

<!-- Modal -->
<div class="modal fade goal_item_modal" id="goalItem_{{$goal_id}}" tabindex="-1"
     aria-labelledby="goalItem_{{$goal_id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('goals.items.create')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('goals.items.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{__('fields.close')}}
                </button>
                <button type="button" id="saveGoalItem"
                        onclick="saveGoalItem('{{$goal_id}}')"
                        class="btn btn-primary">
                    {{__('fields.save')}}
                </button>
            </div>
        </div>
    </div>
</div>
