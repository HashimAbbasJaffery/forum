                            @props([
                                "name", 
                                "type" => "text",
                                "isLabeled" => "true",
                                "value" => "",
                                "id" => ""
                            ])
                            <div class="signup__section">
                                @if($isLabeled == "true")
                                    <label class="signup__label" for="{{ $name }}">{{ $name }}</label>
                                @endif
                                    <input id="{{ $id }}" value="{{ $value }}" type="{{ $type }}" class="form-control" name="{{ $name }}" >
                            </div>