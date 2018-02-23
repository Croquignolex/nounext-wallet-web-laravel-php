<label class="radio-inline">
    <input type="radio" name="{{ $name }}" value="{{ $value }}" {{ $check ?? '' }}>
    <span class="badge {{ $badge }}">{{ $label }}</span>
</label>