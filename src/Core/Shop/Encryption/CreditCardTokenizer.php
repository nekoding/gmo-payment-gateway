<?php

namespace Nekoding\GmoPaymentGateway\Core\Shop\Encryption;

use Illuminate\Contracts\Encryption\EncryptException;
use Nekoding\GmoPaymentGateway\Contracts\Encryption\Token;
use phpseclib3\Crypt\RSA;

final class CreditCardTokenizer implements Token
{
    
    /**
     * Encrypted credit card detail
     *
     * @var string $encryptedCreditCard
     */
    private $encryptedCreditCard;

    public function __construct($data)
    {
        $gmoPublicKey = config('gmo-payment-gateway.public_key') ?? env('GMO_PUBLIC_KEY');

        if (!$gmoPublicKey) {
            throw new EncryptException("Public key cannot null");
        }

        if (is_array($data)) {
            $data = json_encode($data);
        }

        $rsa = RSA::loadPublicKey($gmoPublicKey);
        $rsaKey = $rsa->toString('PKCS8');

        openssl_public_encrypt($data, $result, $rsaKey);

        $this->encryptedCreditCard = base64_encode($result);
    }

    public static function encrypt($data): Token
    {
        return new self($data);
    }

    public function getEncryptionCreditCard(): string
    {
        return $this->encryptedCreditCard;
    }

}