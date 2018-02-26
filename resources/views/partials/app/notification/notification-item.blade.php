<div class="dropdown-item app-main-dropdown-item app-main-border-top" title="{!! $notification->details !!}" data-toggle="tooltip" data-placement="bottom">
    <button type="button" class="close" aria-label="Close" onclick="document.getElementById('delete-notification-{{ $notification->id }}').submit();">
        <span aria-hidden="true">&times;</span>
    </button>

    <p>
        <a href="{{ $notification->url }}" class="text-{{ $notification->color }}">
            <span class="oi oi-{{ $notification->icon }}"></span>&nbsp;{{ $notification->title }}
            <small class="text-muted font-italic">- {{ $notification->created_at }}</small>
        </a><br>
        {!! text_format($notification->details, 40) !!}
    </p>

    <form id="delete-notification-{{ $notification->id }}" action="{{ route_manager('notifications.destroy', [$notification]) }}" method="POST" class="hidden">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
</div>

{{--TODO: format notification created at date --}}