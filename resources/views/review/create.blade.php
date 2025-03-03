<!DOCTYPE html>
<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-2xl">Create a review</h1>
                        <form action="{{route("review.store")}}" method="post">
                            @csrf
                            <input type="hidden" value={{$property->id}} name="property_id">
                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="review_title">Review Title:</label>
                                    <input type="text" name="review_title" id="review_title" value="{{old("review_title")}}" placeholder="Review Title" class="border-2 border-solid border-red-500" required>
                                    @error("review_title")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="review_contents">Review Contents: </label>
                                    <textarea name="review_contents" id="review_contents" value="{{old("review_contents")}}" placeholder="Review Contents" class="border-2 border-solid border-red-500" required></textarea>
                                    @error("review_contents")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>

                            <div class="row row-space mb-3">
                                <div class="col-6">
                                    <label for="rating">Rating (0-5): </label>
                                    <input type="number" id="rating" name="rating" value="{{old("rating")}}" placeholder="Rating" class="border-2 border-solid border-red-500" required>
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
