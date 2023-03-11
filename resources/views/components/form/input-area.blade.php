<div class="input-area">
    <label for="{{$name}}">
        {{$label}}
    </label>
    <input value="{{$value ?? ''}}" name="{{$name}}" type="{{$type ?? 'text'}}" id="{{$name}}" {{empty($required) ? '' : $required }} placeholder="{{empty($placeholder) ? '' : $placeholder}}">

    {{-- empty($irineu) ? 'está vazio' : 'tem algo dentro' --}}
</div>