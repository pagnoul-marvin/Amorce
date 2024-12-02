<li class="todo_list_section_content_list_item flex">

    <a href="" title="{{__('texts.see_details')}} {{$task->title}}"
       class="todo_list_section_content_list_item_link hel_reg">{{$task->title}}</a>

    <ul class="todo_list_section_content_list_item_profile_pictures_list flex">

        @foreach($task->users->take(3) as $user)

            <li class="todo_list_section_content_list_item_profile_pictures_list_item" wire:key="task-user-{{$user->id}}">
                @if($user->picture)
                    <img
                        class="todo_list_section_content_list_item_profile_pictures_list_item_img"
                        srcset="
                        {{asset('users/'.$user->id.'/large/'.basename($user->picture))}} 720w,
                {{asset('users/'.$user->id.'/medium/'.basename($user->picture))}} 500w,
                {{asset('users/'.$user->id.'/small/'.basename($user->picture))}} 300w"
                        sizes="(max-width: 800px) 300px,(max-width: 1000px) 500px, 720px"
                        src="{{asset($user->picture)}}" alt="{{__('texts.profile_photo')}} {{$user->firstname}}"
                        title="{{$user->firstname}} {{$user->lastname}} {{$user->email}}">
                @else

                    <img class="profile_form_section_profile_picture_container_img" srcset="
                        {{asset('img/photo_720.jpg')}} 720w,
                {{asset('img/photo_500.jpg')}} 500w,
                {{asset('img/photo_300.jpg')}} 300w"
                         sizes="(max-width: 800px) 300px,(max-width: 1000px) 500px, 720px"
                         src="{{ asset('img/photo_720.jpg') }}"
                         alt="{{ __('texts.profile_photo') }} {{ $user->firstname }}" title="{{$user->firstname}} {{$user->lastname}} {{$user->email}}">
                @endif

            </li>

        @endforeach

        @if(count($task->users) > 3)

            <li><p class="hel_reg">...</p></li>

        @endif

    </ul>

    <form wire:submit="save">

        <input type="hidden" wire:model.blur="form.completed">

        <x-buttons.submit-button type="checked" :title="__('texts.make_this_task_completed')"/>

    </form>

</li>


