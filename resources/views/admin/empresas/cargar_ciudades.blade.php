<select name="ciudad" class="form-control" id="select_ciud">
    @foreach ($ciudades as $ciudad)
        <option value="{{ $ciudad->id }}">{{ $ciudad->name }}</option>
    @endforeach
</select>