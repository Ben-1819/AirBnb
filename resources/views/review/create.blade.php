<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <div class="m-auto">
            <div class="mt-5 bg-white rounded-lg shadow">
                <div class="flex">
                    <div class="flex-1 py-5 pl-5 overflow-hidden">
                        <h1 class="inline text-2xl font-semibold leading-none">Create a review for property: {{$property->id}}</h1>
                    </div>
                </div>
                <form action="{{route("review.store")}}" method="post">
                    @csrf
                    <div>
                        <input type="hidden" value={{$property->id}} name="property_id">
                    </div>

                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <label for="review_title">Review Title:</label>
                                <input type="text" name="review_title" id="review_title" value="{{old("review_title")}}" placeholder="Review Title" class="border-2 border-solid border-red-500" required>
                                @error("review_title")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                            <div class="flex-grow">
                                <label for="rating">Rating (0-5): </label>
                                <input type="number" id="rating" name="rating" value="{{old("rating")}}" placeholder="Rating" class="border-2 border-solid border-red-500" required>
                                @error("rating")
                                    <x-errors>{{ $message }}</x-errors>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <div class="flex items-center justify-center">
                                    <label for="review_contents">Review Contents: </label>
                                    <textarea name="review_contents" id="review_contents" value="{{old("review_contents")}}" placeholder="Review Contents" class="border-2 border-solid border-red-500" required></textarea>
                                    @error("review_contents")
                                        <x-errors>{{ $message }}</x-errors>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="px-5 pb-5">
                        <div class="flex">
                            <div class="flex-grow">
                                <div class="pt-5 flex items-center justify-center">
                                    <button class="border-2 border-solid border-red-500">Save Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
