<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $labelname }}</label>
    <select class="form-select  form-control {{ $inputClass ?? '' }}" name="{{ $name }}" id="{{ $name }}" >

        {{$slot}}

    </select>

   @if (!empty($errorName))
   @error($errorName)
   <span class="text-danger">{{ $message }}</span>
   @enderror

   @endif
</div>
