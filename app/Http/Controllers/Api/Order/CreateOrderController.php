<?php

namespace App\Http\Controllers\Api\Order;

use App\Application\Order\DTOs\CreateOrderDto;
use App\Application\Order\UseCases\CreateOrderUseCase;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\CreateOrderResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        Request $request,
        CreateOrderUseCase $useCase
    ): JsonResponse {
        $dto = new CreateOrderDto(
            $request->input('customer_id'), // todo: get from auth when auth will be implemented
        );

        $output = $useCase->execute($dto);

        return CreateOrderResource::make($output)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
