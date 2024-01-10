<?php
declare(strict_types=1);

namespace Gian\Wms;

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Message\Response;

class InventoryController
{
    const MAX = 100;

    public function __invoke(ServerRequestInterface $request): Response
    {
        $request = $request->getQueryParams();
        $sku = $request['sku'] ?? null;
        if (!$sku) {
            return new Response(
                Response::STATUS_BAD_REQUEST,
                ['Content-Type' => 'application/json'],
                'Sku Not Defined!'
            );
        }

        $qty = mt_rand(1, self::MAX);
        if ($qty % 2 !== 0) {
            return new Response(
                Response::STATUS_INTERNAL_SERVER_ERROR,
                ['Content-Type' => 'application/json'],
                'Application Error'
            );
        }

        return Response::json(
            [
                'qty' => $qty,
                'sku' => $sku
            ]
        );
    }
}
