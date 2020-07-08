<?php

namespace IntVent\EBoekhouden;

use IntVent\EBoekhouden\Exceptions\EboekhoudenSoapException;
use IntVent\EBoekhouden\Models\EboekhoudenRelation;
use SoapClient;
use SoapFault;

class Client
{
    protected SoapClient $soapClient;
    protected ?string $sessionId = null;
    protected string $username;
    protected string $secCode1;
    protected string $secCode2;
    protected string $wsdl = 'https://soap.e-boekhouden.nl/soap.asmx?wsdl';

    /**
     * Client constructor.
     *
     * @param string $username
     * @param string $secCode1
     * @param string $secCode2
     * @throws EboekhoudenSoapException
     */
    public function __construct(string $username, string $secCode1, string $secCode2)
    {
        $this->username = $username;
        $this->secCode1 = $secCode1;
        $this->secCode2 = $secCode2;

        $this->createSoapClient();
    }

    /**
     * Create SoapClient to connect to E-Boekhouden.nl.
     *
     * @throws EboekhoudenSoapException
     */
    protected function createSoapClient(): void
    {
        if (! empty($this->soapClient) && ! empty($this->sessionId)) {
            return;
        }

        try {
            $this->soapClient = new SoapClient($this->wsdl);
        } catch (SoapFault $exception) {
            throw new EboekhoudenSoapException($exception->getMessage());
        }

        $result = $this->soapClient->__soapCall('OpenSession', [
            'OpenSession' => [
                'Username' => $this->username,
                'SecurityCode1' => $this->secCode1,
                'SecurityCode2' => $this->secCode2,
            ],
        ]);

        $this->checkError('OpenSession', $result);

        $this->sessionId = $result->OpenSessionResult->SessionID;
    }

    /**
     * Check E-Boekhouden.nl response for errors.
     *
     * @param string $methodName
     * @param object $response
     * @throws EboekhoudenSoapException
     */
    private function checkError(string $methodName, object $response): void
    {
        if (! empty($response->{$methodName . 'Result'}->ErrorMsg->LastErrorCode)) {
            throw new EboekhoudenSoapException($response->{$methodName . 'Result'}->ErrorMsg->LastErrorDescription);
        }
    }

    /**
     * Get all relations from E-Boekhouden.nl.
     *
     * @param string $keyword
     * @param string $code
     * @param int $id
     * @return EboekhoudenRelation[]
     * @throws EboekhoudenSoapException
     */
    public function getRelations($keyword = '', $code = '', $id = 0): array
    {
        $result = $this->soapClient->__soapCall('GetRelaties', [
            'GetRelaties' => [
                'SessionID' => $this->sessionId,
                'SecurityCode2' => $this->secCode2,
                'cFilter' => [
                    'Trefwoord' => $keyword,
                    'Code' => $code,
                    'ID' => $id,
                ],
            ],
        ]);

        $this->checkError('GetRelaties', $result);

        $relations = $result->GetRelatiesResult->Relaties->cRelatie;

        if (! is_array($relations)) {
            $relations = [$relations];
        }

        return array_map(fn ($item) => new EboekhoudenRelation((array) $item), $relations);
    }
}
