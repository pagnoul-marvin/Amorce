@if($button_or_link === 'button_submit')

    <button class="modal_btn {{$type}}" title="{{$title}}" type="submit">
        @if($type === 'add')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path
                    d="M12,2C11.448,2,11,2.448,11,3v7H4c-0.552,0-1,0.448-1,1s0.448,1,1,1h7v7c0,0.552,0.448,1,1,1s1-0.448,1-1v-7h7c0.552,0,1-0.448,1-1s-0.448-1-1-1h-7V3c0-0.552-0.448-1-1-1z"
                    fill="#1d1b20"/>
            </svg>
        @elseif($type === 'checked')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M9.3,17.7l-4.7-4.7l1.4-1.4l3.3,3.3l7.3-7.3l1.4,1.4L9.3,17.7z" fill="#1d1b20"/>
            </svg>
        @elseif($type === 'delete')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M6,19c-1.1,0-2-0.9-2-2V7H2V5h5V3h6v2h5v2h-1v10c0,1.1-0.9,2-2,2H6z M8,7h8V5H8V7z"
                      fill="#1d1b20"/>
            </svg>
        @elseif($type === 'settings')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path
                    d="M19.14,12.94c0.05-0.32,0.08-0.65,0.08-0.94s-0.03-0.62-0.08-0.94l2.03-1.58c0.19-0.15,0.25-0.42,0.16-0.65l-2.43-4.2c-0.1-0.23-0.34-0.3-0.55-0.22l-2.49,1c-0.34-0.26-0.72-0.48-1.12-0.68l-0.36-2.69C14.97,1.82,14.56,1.5,14,1.5c-0.56,0-1.06,0.32-1.25,0.82l-0.36,2.69c-0.4,0.2-0.78,0.42-1.12,0.68l-2.49-1c-0.22-0.08-0.45-0.01-0.55,0.22l-2.43,4.2c-0.1,0.23-0.03,0.5,0.16,0.65l2.03,1.58c-0.05,0.32-0.08,0.65-0.08,0.94s0.03,0.62,0.08,0.94l-2.03,1.58c-0.19,0.15-0.25,0.42-0.16,0.65l2.43,4.2c0.1,0.23,0.34,0.3,0.55,0.22l2.49-1c0.34,0.26,0.72,0.48,1.12,0.68l0.36,2.69c0.19,0.5,0.69,0.82,1.25,0.82c0.56,0,1.06-0.32,1.25-0.82l0.36-2.69c0.4-0.2,0.78-0.42,1.12-0.68l2.49,1c0.22,0.08,0.45,0.01,0.55-0.22l2.43-4.2c0.1-0.23,0.03-0.5-0.16-0.65L19.14,12.94z M12,15.25c-1.83,0-3.25-1.42-3.25-3.25s1.42-3.25,3.25-3.25s3.25,1.42,3.25,3.25S13.83,15.25,12,15.25z"
                    fill="none" stroke="#1e1e1e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5px"/>
            </svg>
        @elseif($type === 'exchange')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1e1e1e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 7h14l-6-6" />
                <path d="M19 17H5l6 6" />
            </svg>
        @endif
    </button>

@elseif($button_or_link === 'link')

    <a href="{{$href}}" title="{{$title}}" class="modal_btn {{$type}}">

        @if($type === 'add')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path
                    d="M12,2C11.448,2,11,2.448,11,3v7H4c-0.552,0-1,0.448-1,1s0.448,1,1,1h7v7c0,0.552,0.448,1,1,1s1-0.448,1-1v-7h7c0.552,0,1-0.448,1-1s-0.448-1-1-1h-7V3c0-0.552-0.448-1-1-1z"
                    fill="#1d1b20"/>
            </svg>
        @elseif($type === 'checked')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M9.3,17.7l-4.7-4.7l1.4-1.4l3.3,3.3l7.3-7.3l1.4,1.4L9.3,17.7z" fill="#1d1b20"/>
            </svg>
        @elseif($type === 'delete')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M6,19c-1.1,0-2-0.9-2-2V7H2V5h5V3h6v2h5v2h-1v10c0,1.1-0.9,2-2,2H6z M8,7h8V5H8V7z"
                      fill="#1d1b20"/>
            </svg>
        @elseif($type === 'settings')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path
                    d="M19.14,12.94c0.05-0.32,0.08-0.65,0.08-0.94s-0.03-0.62-0.08-0.94l2.03-1.58c0.19-0.15,0.25-0.42,0.16-0.65l-2.43-4.2c-0.1-0.23-0.34-0.3-0.55-0.22l-2.49,1c-0.34-0.26-0.72-0.48-1.12-0.68l-0.36-2.69C14.97,1.82,14.56,1.5,14,1.5c-0.56,0-1.06,0.32-1.25,0.82l-0.36,2.69c-0.4,0.2-0.78,0.42-1.12,0.68l-2.49-1c-0.22-0.08-0.45-0.01-0.55,0.22l-2.43,4.2c-0.1,0.23-0.03,0.5,0.16,0.65l2.03,1.58c-0.05,0.32-0.08,0.65-0.08,0.94s0.03,0.62,0.08,0.94l-2.03,1.58c-0.19,0.15-0.25,0.42-0.16,0.65l2.43,4.2c0.1,0.23,0.34,0.3,0.55,0.22l2.49-1c0.34,0.26,0.72,0.48,1.12,0.68l0.36,2.69c0.19,0.5,0.69,0.82,1.25,0.82c0.56,0,1.06-0.32,1.25-0.82l0.36-2.69c0.4-0.2,0.78-0.42,1.12-0.68l2.49,1c0.22,0.08,0.45,0.01,0.55-0.22l2.43-4.2c0.1-0.23,0.03-0.5-0.16-0.65L19.14,12.94z M12,15.25c-1.83,0-3.25-1.42-3.25-3.25s1.42-3.25,3.25-3.25s3.25,1.42,3.25,3.25S13.83,15.25,12,15.25z"
                    fill="none" stroke="#1e1e1e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5px"/>
            </svg>
        @elseif($type === 'exchange')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1e1e1e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 7h14l-6-6" />
                <path d="M19 17H5l6 6" />
            </svg>
        @endif

    </a>

@elseif($button_or_link === 'button')

    <button class="modal_btn {{$type}}" title="{{$title}}" wire:click="dispatchTo('{{$to}}', '{{$event}}')">
        @if($type === 'add')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path
                    d="M12,2C11.448,2,11,2.448,11,3v7H4c-0.552,0-1,0.448-1,1s0.448,1,1,1h7v7c0,0.552,0.448,1,1,1s1-0.448,1-1v-7h7c0.552,0,1-0.448,1-1s-0.448-1-1-1h-7V3c0-0.552-0.448-1-1-1z"
                    fill="#1d1b20"/>
            </svg>
        @elseif($type === 'checked')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M9.3,17.7l-4.7-4.7l1.4-1.4l3.3,3.3l7.3-7.3l1.4,1.4L9.3,17.7z" fill="#1d1b20"/>
            </svg>
        @elseif($type === 'delete')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M6,19c-1.1,0-2-0.9-2-2V7H2V5h5V3h6v2h5v2h-1v10c0,1.1-0.9,2-2,2H6z M8,7h8V5H8V7z"
                      fill="#1d1b20"/>
            </svg>
        @elseif($type === 'settings')
            <svg class="modal_btn_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path
                    d="M19.14,12.94c0.05-0.32,0.08-0.65,0.08-0.94s-0.03-0.62-0.08-0.94l2.03-1.58c0.19-0.15,0.25-0.42,0.16-0.65l-2.43-4.2c-0.1-0.23-0.34-0.3-0.55-0.22l-2.49,1c-0.34-0.26-0.72-0.48-1.12-0.68l-0.36-2.69C14.97,1.82,14.56,1.5,14,1.5c-0.56,0-1.06,0.32-1.25,0.82l-0.36,2.69c-0.4,0.2-0.78,0.42-1.12,0.68l-2.49-1c-0.22-0.08-0.45-0.01-0.55,0.22l-2.43,4.2c-0.1,0.23-0.03,0.5,0.16,0.65l2.03,1.58c-0.05,0.32-0.08,0.65-0.08,0.94s0.03,0.62,0.08,0.94l-2.03,1.58c-0.19,0.15-0.25,0.42-0.16,0.65l2.43,4.2c0.1,0.23,0.34,0.3,0.55,0.22l2.49-1c0.34,0.26,0.72,0.48,1.12,0.68l0.36,2.69c0.19,0.5,0.69,0.82,1.25,0.82c0.56,0,1.06-0.32,1.25-0.82l0.36-2.69c0.4-0.2,0.78-0.42,1.12-0.68l2.49,1c0.22,0.08,0.45,0.01,0.55-0.22l2.43-4.2c0.1-0.23,0.03-0.5-0.16-0.65L19.14,12.94z M12,15.25c-1.83,0-3.25-1.42-3.25-3.25s1.42-3.25,3.25-3.25s3.25,1.42,3.25,3.25S13.83,15.25,12,15.25z"
                    fill="none" stroke="#1e1e1e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5px"/>
            </svg>
        @elseif($type === 'exchange')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1e1e1e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 7h14l-6-6" />
                <path d="M19 17H5l6 6" />
            </svg>
        @endif
    </button>

@endif

