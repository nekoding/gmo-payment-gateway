<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Site;

use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface GmoMembership
{

    // GMO API endpoint
    const SAVE_MEMBER   = '/payment/SaveMember.idPass';
    const UPDATE_MEMBER = '/payment/UpdateMember.idPass';
    const SEARCH_MEMBER = '/payment/SearchMember.idPass';
    const DELETE_MEMBER = '/payment/DeleteMember.idPass';
    
    /**
     * Register the member on the specified site.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#savemember
     */
    public function saveMember(array $data): ResponseParser;
    
    /**
     * Updates the member information of the specified site.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#updatemember
     */
    public function updateMember(array $data): ResponseParser;
    
    /**
     * Refers to the member information of the specified site.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#searchmember
     */
    public function searchMember(array $data): ResponseParser;
    
    /**
     * Deletes the member information of the specified site.
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/apimember#deletemember
     */
    public function deleteMember(array $data): ResponseParser;

}
