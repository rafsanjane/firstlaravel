<div class="mb-3">

    <label for="{{ $name }}" class="form-label">{{ $labelname }}</label>

    <input type="{{ $type ?? 'text'}}" class="form-control form-control {{ $inputClass ?? '' }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="Example: Electronics" value="{{ $value ??  ''}}">

    @if (!empty($errorName))
        @error($errorName)
        <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif
</div>
