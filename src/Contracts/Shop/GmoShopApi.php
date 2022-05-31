<?php

namespace Nekoding\GmoPaymentGateway\Contracts\Shop;

interface GmoShopApi
{    
    /**
     * Using Credit card as payment
     *
     * @return CreditCard
     */
    public function creditCard(): CreditCard;  
        
    /**
     * Using Docomo as payment
     *
     * @return Docomo
     */
    public function docomo(): Docomo;
}