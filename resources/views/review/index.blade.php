<?php
use App\Models\User;
?>
<!DOCTYPE html>
<x-app-layout>
    <div>
        <h1 class="text-2xl">All reviews</h1>
    </div>
    <div>
        <table class="border-2 border-solid border-red-500">
            <thead>
                <tr>
                    <td>Review ID</td>
                    <td>Property Reviewed</td>
                    <td>Reviewer</td>
                    <td>Review Title</td>
                    <td>Rating Given</td>
                    <td>Read Review</td>
                </tr>
            </thead>
            <tbody>
                @if(count($all_reviews) > 0)
                    @foreach($all_reviews as $review)
                        <tr>
                            <td>{{$review->id}}</td>
                            <td>{{$review->property_id}}</td>
                            <?php
                            $user = User::find($review->reviewer_id);
                            ?>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$review->review_title}}</td>
                            <td>{{$review->rating}}</td>
                            <td>
                                <form action="{{route("review.show", $review->id)}}" method="get">
                                    @csrf
                                    <button class="border-2 border-solid border-red-500">Read Review</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No reviews yet</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
</html>
