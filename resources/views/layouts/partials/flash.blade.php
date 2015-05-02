@if(session('flash_notification.message'))
    <div class="flash alert alert-{{ session('flash_notification.level') }} @if(session('flash_notification.ephemeral')) alert-ephemeral @endif">
        @if(session('flash_notification.dismissable'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @endif
        {{ trans(session('flash_notification.message')) }}
    </div>
@endif
