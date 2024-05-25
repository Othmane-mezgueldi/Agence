@php
    $label ??= null;
    $class ??= null;
    $name ??= '';
    $value ??= '';

@endphp

<div @class(['form-check form-switch mb-2', $class])>
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>

    <input type="hidden" value="0" name="{{ $name }}">
    <input @checked(old($name, $value ?? false)) type="checkbox" value="1" name="{{ $name }}" id="{{ $name }}"
        class="form-check-input @error($name) is-invalid @enderror" role="switch">

    @error($name)
        <small id="helpId" class="invalid-feedback">
            {{ $message }}
        </small>
    @enderror
</div>
