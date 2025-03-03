<!DOCTYPE html>

<div>
    <h1 class="text-xl">Review Created Successfully</h1>
</div>

<div>
    <form action="{{route("property.addReview", $property->id)}}" method="post">
        @csrf
        @method("patch")
        <input type="hidden" name="review_id" value={{$review->id}}>
        <input type="hidden" name="property_id" value={{$property->id}}>
        <button class="h-20 w-40 border-2 border-solid border-red-500">Continue</button>
    </form>
</div>
</html>
