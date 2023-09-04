<?php

namespace Palpalani\BayRewards\Resources;

use Palpalani\BayRewards\Objects\Store;
use Palpalani\BayRewards\Requests\Store\GetStoreCustomerRequest;

final class CustomerResource extends Resource
{
    /**
     * @return mixed|Store
     */
    public function get(string $access_token,int $page =1,int $limit = 25,int $type = 0,string $sortBy = "", string $search = ""): mixed
    {
        return $this->connector->send(new GetStoreCustomerRequest($access_token, $page, $limit, $type, $sortBy, $search))->dto();
    }
}