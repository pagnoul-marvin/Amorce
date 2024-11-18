@props(['text'])
<div class="success_message flex" x-data="{visible : @entangle('visible')}" x-show="visible"
     x-transition:enter="success-message-transition"
     x-transition:enter-start="success-message-enter"
     x-transition:enter-end="success-message-enter-active"
     x-transition:leave="success-message-transition"
     x-transition:leave-start="success-message-leave"
     x-transition:leave-end="success-message-leave-active">

    <p class="success_message_text hel_reg">{{$text}}</p>

    <livewire:icons.close to="success-message" event="closeSuccessMessage"/>

</div>
