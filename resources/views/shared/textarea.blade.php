@php
    $label ??= null;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div @class(['form-group mb-2', $class])>
    <label for="{{ $name }}" class="form-label">{{ $label }}:</label>
    <textarea type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        id="{{ $name }}" placeholder="{{ $label }}">{{ old($name, $value) }}</textarea>
    @error($name)
        <small id="helpId" class="invalid-feedback">
            {{ $message }}
        </small>
    @enderror
</div>
