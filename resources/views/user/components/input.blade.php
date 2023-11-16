
    <div class="col">
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
            class="form-control @error('name') is-invalid @enderror border border-warning" placeholder="{{ $placeholder }}"
            {{--  value="{{ $data['name'] }}">  --}}
        <span class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </span>
    </div>