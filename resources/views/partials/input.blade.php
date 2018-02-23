<div class="form-group">
    <input placeholder="{{ $placeholder }}" type="{{ $type }}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}">
    @if ($errors->has($name))
        <span class="invalid-feedback">
            {{ $errors->first($name) }}
        </span>
    @endif
</div>