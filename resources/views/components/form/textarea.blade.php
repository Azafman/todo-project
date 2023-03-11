<div class="input-area">
    <label for="{{$name}}">
        {{$label}}
    </label>
    <textarea name="{{$name}}" class="txt-area" placeholder="{{empty($placeholder) ? '' : $placeholder}}" id="{{$name}}">{{$value ?? ''}}</textarea>
</div>