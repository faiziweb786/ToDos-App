<div class="col">
    <select class="form-control @error('gender') is-invalid  @enderror border border-warning" name="{{ $name }}" id="{{ $id }}"
        value="">
        {{ $slot }}
    </select>
    <span class="text-danger">
        @error('gender')
            {{ $message }}
        @enderror
    </span>
</div>