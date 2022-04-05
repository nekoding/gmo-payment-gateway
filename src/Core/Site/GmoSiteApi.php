<?php

namespace Nekoding\GmoPaymentGateway\Core\Site;

use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;
use Nekoding\GmoPaymentGateway\Contracts\Site\GmoSiteApi as GmoSiteApiContract;
use Nekoding\GmoPaymentGateway\Core\Response;
use Nekoding\GmoPaymentGateway\Core\Traits\HttpClient;

final class GmoSiteApi extends GmoSiteApiContract
{
    use HttpClient;

    public function saveMember(array $data): ResponseParser
    {
        return new Response($this->request(self::SAVE_MEMBER, array_merge($data, $this->apiCredentials())));
    }

    public function updateMember(array $data): ResponseParser
    {
        return new Response($this->request(self::UPDATE_MEMBER, array_merge($data, $this->apiCredentials())));
    }

    public function searchMember(array $data): ResponseParser
    {
        return new Response($this->request(self::SEARCH_MEMBER, array_merge($data, $this->apiCredentials())));
    }

    public function deleteMember(array $data): ResponseParser
    {
        return new Response($this->request(self::DELETE_MEMBER, array_merge($data, $this->apiCredentials())));
    }

    public function saveCard(array $data): ResponseParser
    {
        return new Response($this->request(self::SAVE_CARD, array_merge($data, $this->apiCredentials())));
    }

    public function tradedCard(array $data): ResponseParser
    {
        return new Response($this->request(self::TRADED_CARD, array_merge($data, $this->apiCredentials())));
    }

    public function searchCard(array $data): ResponseParser
    {
        return new Response($this->request(self::SEARCH_CARD, array_merge($data, $this->apiCredentials())));
    }

    public function searchCardDetail(array $data): ResponseParser
    {
        return new Response($this->request(self::SEARCH_CARD_DETAIL, array_merge($data, $this->apiCredentials())));
    }

    public function deleteCard(array $data): ResponseParser
    {
        return new Response($this->request(self::DELETE_CARD, array_merge($data, $this->apiCredentials())));
    }
}