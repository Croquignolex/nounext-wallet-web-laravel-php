<div class="dropdown-item app-main-dropdown-item app-main-border-top" title="{!! $notification->details !!}" data-toggle="tooltip" data-placement="bottom">
    <a href="#" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </a>

    <p>
        <a href="{{ $notification->url }}" class="text-{{ $notification->color }}">
            <span class="oi oi-{{ $notification->icon }}"></span>&nbsp;{{ $notification->title }}
            <small class="text-muted font-italic">- {{ $notification->created_at }}</small>
        </a><br>
        {!! text_format($notification->details, 40) !!}
    </p>
</div>

{{--TODO: format notification created at date --}}