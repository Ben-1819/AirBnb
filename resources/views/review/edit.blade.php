<!DOCTYPE html>

<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-xl">Review: {{$review->id}}</h1>
                        <form action="{{route("review.update", $review)}}" method="post">
                            @csrf
                            @method("put")
                            <input type="hidden" value={{$review->property_id}} name="property_id">
                            <input type="hidden" value={{$review->reviewer_id}} name="reviewer_id">
                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="review_title">Review Title:</label>
                                    <input type="text" name="review_title" id="review_title" value={{$review->review_title}} class="border-2 border-solid border-red-500" required>
                                    @error("review_title")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="review_contents">Review Contents: </label>
                                    <textarea name="review_contents" id="review_contents" value={{$review->review_contents}} class="border-2 border-solid border-red-500" required></textarea>
                                    @error("review_contents")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="rating">Rating (0-5): </label>
                                    <input type="number" id="rating" name="rating" value={{$review->rating}} class="border-2 border-solid border-red-500" required>
                                    @error("rating")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="pt-2 text-end">
                                <button class="border-2 border-solid border-red-500">Save review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
</html>
