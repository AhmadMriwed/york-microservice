<?php

namespace App\Http\Controllers;

use App\Http\Resources\FooterDetailResource;
use App\Models\FooterDetail;
use App\Http\Requests\StoreFooterDetailRequest;
use App\Http\Requests\UpdateFooterDetailRequest;

class FooterDetailController extends Controller
{
    /**
     * @OA\Get(
     *     path="/footer-details",
     *     summary="Get footer details",
     *     description="Retrieve all footer details",
     *     operationId="getFooterDetails",
     *     tags={"Footer"},
     *       @OA\Parameter(
     *         ref="#/components/parameters/Accept-Language"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved footer details",
     *     )
     * )
     */
    public function index()
    {
        return FooterDetailResource::collection(FooterDetail::get())
            ->additional(['message' => __('messages.retrievedSuccess')]);
    }

}
