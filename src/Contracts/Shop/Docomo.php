<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

interface Docomo extends CommonPayment
{
    // Api endpoint
    const ENTRY_TRAN            = '/payment/EntryTranDocomo.idPass';
    const EXEC_TRAN             = '/payment/ExecTranDocomo.idPass';
    const START_TRAN            = '/payment/DocomoStart.idPass';
    const CANCEL_TRAN           = '/payment/DocomoCancelReturn.idPass';
    const DOCOMO_INCREASE       = '/payment/DocomoIncrease.idPass';
    const DOCOMO_ACCEPT_SALES   = '/payment/DocomoSales.idPass';
    const DOCOMO_ACCEPT_ENTRY   = '/payment/EntryTranDocomoAccept.idPass';
    const DOCOMO_ACCEPT_EXEC    = '/payment/ExecTranDocomoAccept.idPass';
    const DOCOMO_ACCEPT_START   = '/payment/DocomoAcceptStart.idPass';
    const DOCOMO_TEMINATE       = '/payment/DocomoAcceptUserEnd.idPass';
}