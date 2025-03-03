<!DOCTYPE html>

<x-app-layout>
    <div>
        <h1 class="text-xl">Review: {{$review->id}}</h1>
    </div>

    <div>
        <form action="{{route("review.update", $review)}}" method="post">
            @csrf
            @method("put")
            <input type="hidden" value={{$review->property_id}} name="property_id">
            <label for="review_title">Review Title:</label>
            <input type="text" name="review_title" id="review_title" class="border-2 border-solid border-red-500" required>
            <br>
            <label for="review_contents">Review Contents: </label>
            <textarea name="review_contents" id="review_contents" class="border-2 border-solid border-red-500" required></textarea>
            <br>
            <label for="rating">Rating (0-5): </label>
            <input type="number" id="rating" name="rating" class="border-2 border-solid border-red-500">
            <br>
            <button class="border-2 border-solid border-red-500">Save review</button>
        </form>
    </div>
</x-app-layout>

</html>
