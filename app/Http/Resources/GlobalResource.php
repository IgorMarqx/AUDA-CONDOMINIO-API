<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GlobalResource extends JsonResource
{
    protected array $data;
    protected int $statusCode;

    public function __construct(array $data, int $statusCode)
    {
        parent::__construct($data);
        $this->data['error'] = $data['error'];
        $this->data['message'] = $data['message'];
        $this->statusCode = $statusCode;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'error' => $this->data['error'],
            'message' => $this->data['message'],
            'timestamp' => Carbon::now()->format('Y-m-d H:i:s'),
            'path' => $request->fullUrl(),
        ];
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode($this->statusCode);
    }
}
