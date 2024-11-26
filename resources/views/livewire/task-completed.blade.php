<li class="todo_list_section_content_list_item flex">

    <a href="" title="{{__('texts.see_details')}} {{$task->title}}"
       class="todo_list_section_content_list_item_link hel_reg">{{$task->title}}</a>

    <ul class="todo_list_section_content_list_item_profile_pictures_list flex">

        @foreach($task->users->take(3) as $user)

            <li class="todo_list_section_content_list_item_profile_pictures_list_item">
                <img
                    class="todo_list_section_content_list_item_profile_pictures_list_item_img"
                    src="{{asset($user->picture)}}" alt="{{__('texts.profile_photo')}} {{$user->firstname}}"
                    title="{{$user->firstname}} {{$user->lastname}} {{$user->email}}">
            </li>

        @endforeach

        @if(count($task->users) > 3)

            <li><p class="hel_reg">...</p></li>

        @endif

    </ul>

    <form wire:submit="save">

        <input type="hidden" wire:model.blur="form.completed">

        <x-buttons.submit-button button_or_link="button_submit" type="checked"
                                 :title="__('texts.make_this_task_completed')"/>

    </form>

</li>


