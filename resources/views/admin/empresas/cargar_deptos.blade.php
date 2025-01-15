<select name="departamento" class="form-control" id="select_depar">
    @foreach ($departamentos as $departamento)
        <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
    @endforeach
</select>

