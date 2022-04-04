<?php

namespace Nekoding\GmoPaymentGateway\Core\Site;

use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;
use Nekoding\GmoPaymentGateway\Contracts\Site\GmoSiteApi as GmoSiteApiContract;
use Nekoding\GmoPaymentGateway\Core\Response;
use Nekoding\GmoPaymentGateway\Core\Traits\HttpClient;

class GmoSiteApi extends GmoSiteApiContract
{

    use HttpClient;

    public function saveMember(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::SAVE_MEMBER, $data, $this->apiCredentials()));
    }

    public function updateMember(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::UPDATE_MEMBER, $data, $this->apiCredentials()));
    }

    public function searchMember(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_GET, self::SEARCH_MEMBER, $data, $this->apiCredentials()));
    }

    public function deleteMember(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::DELETE_MEMBER, $data, $this->apiCredentials()));
    }

    public function saveCard(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::SAVE_CARD, $data, $this->apiCredentials()));
    }

    public function tradedCard(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::TRADED_CARD, $data, $this->apiCredentials()));
    }

    public function searchCard(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::SEARCH_CARD, $data, $this->apiCredentials()));
    }

    public function searchCardDetail(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::SEARCH_CARD_DETAIL, $data, $this->apiCredentials()));
    }

    public function deleteCard(array $data): ResponseParser
    {
        return new Response($this->request(self::HTTP_POST, self::DELETE_CARD, $data, $this->apiCredentials()));
    }
}