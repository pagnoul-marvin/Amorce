<x-layout.main>

    <x-page-title-and-description :title="__('texts.home_page_title')" :description="__('texts.home_page_description')" :model="$user->firstname"/>

    <ul>
    @foreach($tasks as $task)

        <li class="test">{{$task->title}} {{$task->description}} {{$task->date}}

            @foreach($task->users as $user)

                {{$user->firstname}}

            @endforeach

        </li>


    @endforeach
    </ul>

</x-layout.main>

