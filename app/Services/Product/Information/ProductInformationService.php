<?php

namespace App\Services\Product\Information;

use App\Models\Post;
use App\Models\ProductInformation;
use App\Repositories\Product\Information\ProductInformationRepository;
use App\Services\Product\Information\ProductInformationServiceInterface;

class ProductInformationService implements ProductInformationServiceInterface
{

    protected $productInformationRepo;

    public function __construct(ProductInformationRepository $productInformationRepo)
    {
        $this->productInformationRepo = $productInformationRepo;
    }

    /**
     * ساخت جزئیات محصول
     * @param Post $product
     * @param array $data
     * @return ProductInformation
     */
    public function updateOrCreate(Post $product, array $data)
    {
        $information =
            $this->productInformationRepo->updateOrCreate([
                "post_id" => $product->id,
            ], [
                "maximum_sell" => $data["maximum_sell"],
                "expire_day" => $data["expire_day"],
                "download_limit" => $data["download_limit"]
            ]);

        $product->productInformation()->save($information);

        return $information;
    }
}
