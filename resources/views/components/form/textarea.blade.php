@props([
    "name", 
    "type" => "text",
    "value" => "",
    "id" => ""
])
<div class="signup__section">
    <label class="signup__label" for="{{ $name }}">{{ $name }}</label>
    <textarea id="{{ $id }}" rows="10" class="form-control" name="{{ $name }}" >{{ $value }}</textarea>
</div>