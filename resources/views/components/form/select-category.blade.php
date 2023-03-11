<div class="input-area">
    <label for="{{ $name }}">
        {{ $label }}
    </label>
    <select class="select" name="{{$name}}" id="{{ $name }}" {{ empty($required) ? '' : $required }}>
        <option selected disabled>Selecione uma opção</option>

         {{$slot}} 
    </select>
</div>
