<?php

namespace msng\GmoPaymentGateway\Values\Transaction;

use msng\GmoPaymentGateway\Values\EnumValue;

class JobCd extends EnumValue
{
    // 有効性チェック
    const CHECK = 'CHECK';

    // 即時売上
    const CAPTURE = 'CAPTURE';

    // 仮売上
    const AUTH = 'AUTH';

    // 簡易オーソリ
    const SAUTH = 'SAUTH';
}
