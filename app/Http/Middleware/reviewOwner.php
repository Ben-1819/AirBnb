<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Review;
class reviewOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $reviewId = $request->route("id");

        log::info("Property id: {id}", ["id" => $reviewId]);
        $review = Review::find($reviewId);

        if($review->reviewer_id == request()->user()->id){
            return $next($request);
        }
        elseif(!$review || request()->user()->withoutRole("superadmin")){
            return $next($request);
        }
        else{
            abort(403, "Not authorised to access this page");
        }
    }
}
