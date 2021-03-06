<?php

namespace App\Http\Controllers\Api\Serial;

use App\Models\User;
use App\Models\Serial;
use App\Http\Controllers\Controller;
use App\Services\Price\PriceService;
use App\Services\Serial\SerialService;
use App\Http\Requests\Serial\SerialIndex;
use App\Http\Requests\Serial\SerialRequest;
use App\Http\Resources\Serial\SerialResource;
use App\Http\Resources\Serial\SerialCollection;

class SerialController extends Controller
{

    protected $serialService, $priceService;

    public function __construct(SerialService $serialService, PriceService $priceService)
    {
        $this->serialService = $serialService;
        $this->priceService = $priceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, SerialIndex $request)
    {
        $filters = array_merge(
            ["user" => $user->id],
            $request->only([
                "title",
                "created_at",
                "price",
                "posts",
                "amazing_price",
            ])
        );
        
        $serials = $this->serialService->list($filters);

        return  new SerialCollection($serials);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, SerialRequest $request)
    {

        $serial = $this->serialService->updateOrCreate(
            $user,
            $request->all()
        );

        return $this->success([
            "msg" => trans("dashboard.success.serial.create"),
            "data" => new SerialResource($serial)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @param  Serial $serial
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Serial $serial)
    {
        return new SerialResource(
            $serial->load(["prices", "episodes.post"])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Serial $serial, SerialRequest $request)
    {

        $serial = $this->serialService->updateOrCreate(
            $user,
            $request->all(),
            $serial
        );

        return $this->success([
            "msg" => trans("dashboard.success.serial.update"),
            "data" => new SerialResource($serial)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Serial $serial)
    {
        $this->serialService->delete($serial);

        return $this->success([
            "msg" => trans("dashboard.success.serial.delete")
        ]);
    }
}
