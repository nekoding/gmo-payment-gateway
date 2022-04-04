<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

use Closure;
use Nekoding\GmoPaymentGateway\Contracts\Response\ResponseParser;

interface Basic
{
    
    // Api endpoint
    const ENTRY_TRAN = '/payment/EntryTran.idPass';
    const EXEC_TRAN = '/payment/ExecTran.idPass';
    const ALTER_TRAN = '/payment/AlterTran.idPass';
    const CHANGE_TRAN = '/payment/ChangeTran.idPass';
    const SEARCH_TRADE = '/payment/SearchTrade.idPass';
    
    /**
     * EntryTran Transaction Registration
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/api#entrytran
     */
    public function entryTransaction(array $data, Closure $callback = null): ResponseParser;
    
    /**
     * ExecTran Settlement Execution
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/api#exectran
     */
    public function execTransaction(array $data): ResponseParser;
    
    /**
     * AlterTran payment change
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/api#altertran
     */
    public function alterTransaction(array $data): ResponseParser;
    
    /**
     * ChangeTran Transaction Registration
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/api#changetran
     */
    public function changeTransaction(array $data): ResponseParser;
    
    /**
     * SearchTrade Transaction status reference
     *
     * @param  array $data
     * @return ResponseParser
     * @see https://docs.mul-pay.jp/payment/credit/api#searchtrade
     */
    public function searchTrade(array $data): ResponseParser;
}