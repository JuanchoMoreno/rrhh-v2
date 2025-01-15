    @foreach ($clases as $clase)
        <option value="{{ $clase->id }}">{{ $clase->name }}</option>
    @endforeach
