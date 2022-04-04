<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Site;

use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface GmoCreditCard
{

    // API Endpoint
    const SAVE_CARD             = '/payment/SaveCard.idPass';
    const TRADED_CARD           = '/payment/TradedCard.idPass';
    const SEARCH_CARD           = '/payment/SearchCard.idPass';
    const SEARCH_CARD_DETAIL    = '/payment/ExecTran.idPass';
    const DELETE_CARD           = '/payment/DeleteCard.idPass';
    
    /**
     * Register the card information with the specified member.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#savecard
     */
    public function saveCard(array $data): ResponseParser;
    
    /**
     * Register the card used for the transaction with the specified order ID.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#tradedcard
     */
    public function tradedCard(array $data): ResponseParser;
    
    /**
     * Refers to the card information of the specified member.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#searchcard
     */
    public function searchCard(array $data): ResponseParser;
    
    /**
     * Acquires the attribute information of the specified credit card.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#searchcarddetail
     */
    public function searchCardDetail(array $data): ResponseParser;
    
    /**
     * Delete card
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#deletecard
     */
    public function deleteCard(array $data): ResponseParser;

}
