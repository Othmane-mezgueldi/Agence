@php
    $label ??= null;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';

@endphp

<div @class(['form-group mb-2', $class])>
    <label for="{{ $name }}" class="form-label">{{ $label }}:</label>
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        id="{{ $name }}" placeholder="{{ $label }}" value="{{ old($name, $value) }}" />

    @error($name)
        <small id="helpId" class="invalid-feedback">
            {{ $message }}
        </small>
    @enderror
</div>
