<button {{$attributes->merge(["type" => "submit", "class" => "border-2 border-solid border-red-500"])}}>
    {{$slot}}
</button>
