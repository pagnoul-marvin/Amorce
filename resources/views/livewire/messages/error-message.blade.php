<div class="error_message_modal flex"
     x-data="{ open: @entangle('visible'), startTimer() {
            setTimeout(() => {
                this.open = false;
            }, 3000);
        } }"
     x-show="open"
     x-transition:enter="success-message-transition"
     x-transition:enter-start="success-message-enter"
     x-transition:enter-end="success-message-enter-active"
     x-transition:leave="success-message-transition"
     x-transition:leave-start="success-message-leave"
     x-transition:leave-end="success-message-leave-active"
     x-on:start-error-message-timer="startTimer()">

    <p class="error_message_modal_text hel_reg">{{$text}}</p>

</div>

