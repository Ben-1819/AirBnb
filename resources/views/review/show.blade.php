<?php
use App\Models\User;
?>
<!DOCTYPE html>

<x-app-layout>
    <div>
        <h1 class="text-xl">Review: {{$review->id}}</h1>
    </div>

    <div>
        <p>Review ID: {{$review->id}}</p>
        <?php
        $reviewer = User::find($review->reviewer_id);
        ?>
        <p>Review Writer: {{$reviewer->first_name}} {{$reviewer->last_name}}</p>
        <p>Review Title: {{$review->review_title}}</p>
        <textarea class="border-2 border-solid border-red-500" readonly>Review contents: {{$review->review_contents}}</textarea>
        <p>Rating: {{$review->rating}}</p>
    </div>
</x-app-layout>

</html>
