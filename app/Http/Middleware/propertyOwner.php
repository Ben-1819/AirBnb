<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Property;

class propertyOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $propertyId = $request->route("id");
        log::info("Property id: {id}", ["id" => $propertyId]);
        $property = Property::find($propertyId);

        if($property->owner_id == request()->user()->id){
            return $next($request);
        }
        elseif(request()->user()->hasRole("superadmin")){
            return $next($request);
        }
        else{
            abort(403, "Not authorised to access this page");
        }
    }
}
