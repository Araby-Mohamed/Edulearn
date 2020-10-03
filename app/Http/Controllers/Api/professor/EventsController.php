<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\EventsResource;
use App\Model\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $events = EventsResource::collection(Events::orderBy('id','DESC')->paginate(20));
        if($events) {
            // Pagination Data
            $data = [
                'count' => $events->count(),
                'currentPage' => $events->currentPage(),
                'hasMorePages' => $events->hasMorePages(),
                'lastPage' => $events->lastPage(),
                'nextPageUrl' => $events->nextPageUrl(),
                'previousPageUrl' => $events->previousPageUrl(),
                'perPage' => $events->perPage()
            ];
            return $this->apiResponse([$events, $data]);
        }
    }
}
