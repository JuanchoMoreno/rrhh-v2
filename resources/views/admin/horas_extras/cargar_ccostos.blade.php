@foreach ($ccostos as $ccosto)
    <option value="{{ $ccosto->id }}">{{ $ccosto->name }}</option>
@endforeach
