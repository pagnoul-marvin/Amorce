<li class="flex task_index_tasks_manager_section_lists_container_section_content_owner_task_archived_list_item">

    <a class="task_index_tasks_manager_section_lists_container_section_content_owner_task_archived_list_item_link hel_reg" href="{{route('tasks.show', $task->id)}}" title="{{__('texts.see_details')}} {{$task->title}}" wire:navigate></a>

    <p class="hel_reg task_index_tasks_manager_section_lists_container_section_content_owner_task_archived_list_item_fake_link">{{$task->title}}</p>

    <button class="modal_btn delete" title="{{__('texts.delete_this_task')}}" wire:click="dispatchTo('messages.task-archived-confirmation-message', 'openModal', [{{$task->id}}])">

        <svg class="modal_btn_icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 21C6.45 21 5.97917 20.8042 5.5875 20.4125C5.19583 20.0208 5 19.55 5 19V6H4V4H9V3H15V4H20V6H19V19C19 19.55 18.8042 20.0208 18.4125 20.4125C18.0208 20.8042 17.55 21 17 21H7ZM17 6H7V19H17V6ZM9 17H11V8H9V17ZM13 17H15V8H13V17Z" fill="#1D1B20"/>
        </svg>

    </button>

</li>
