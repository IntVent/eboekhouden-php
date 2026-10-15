<?php

namespace IntVent\EBoekhouden\Tests;

use IntVent\EBoekhouden\Client;
use IntVent\EBoekhouden\Exceptions\EboekhoudenSoapException;
use IntVent\EBoekhouden\Filters\CostCenterFilter;
use IntVent\EBoekhouden\Filters\SaldiFilter;
use IntVent\EBoekhouden\Filters\SaldoFilter;
use IntVent\EBoekhouden\Models\EboekhoudenCostCenter;
use IntVent\EBoekhouden\Models\EboekhoudenInvoice;
use IntVent\EBoekhouden\Models\EboekhoudenInvoiceLine;
use IntVent\EBoekhouden\Models\EboekhoudenMutation;
use IntVent\EBoekhouden\Models\EboekhoudenMutationLine;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SoapClient;

class ClientTest extends TestCase
{
    /** @test */
    public function it_gets_cost_centers(): void
    {
        $client = $this->createClientForSoapCall(
            'GetKostenplaatsen',
            function (array $arguments): object {
                $this->assertSame([
                    'GetKostenplaatsen' => [
                        'SessionID' => 'session-id',
                        'SecurityCode2' => 'security-code',
                        'cFilter' => [
                            'KostenplaatsID' => 12,
                            'KostenplaatsParentID' => 4,
                            'Omschrijving' => 'Sales',
                        ],
                    ],
                ], $arguments);

                return $this->successfulResponse('GetKostenplaatsen', [
                    'Kostenplaatsen' => (object) [
                        'cKostenplaats' => (object) [
                            'KostenplaatsId' => 12,
                            'KostenplaatsParentId' => 4,
                            'Omschrijving' => 'Sales',
                        ],
                    ],
                ]);
            }
        );
        $filter = (new CostCenterFilter())
            ->setCostCenterId(12)
            ->setCostCenterParentId(4)
            ->setDescription('Sales');

        $costCenters = $client->getCostCenters($filter);

        $this->assertCount(1, $costCenters);
        $this->assertInstanceOf(EboekhoudenCostCenter::class, $costCenters[0]);
        $this->assertSame(12, $costCenters[0]->getCostCenterId());

        unset($client);
    }

    /** @test */
    public function it_gets_multiple_cost_centers_with_the_default_filter(): void
    {
        $client = $this->createClientForSoapCall(
            'GetKostenplaatsen',
            function (array $arguments): object {
                $this->assertSame([
                    'KostenplaatsID' => 0,
                    'KostenplaatsParentID' => 0,
                    'Omschrijving' => '',
                ], $arguments['GetKostenplaatsen']['cFilter']);

                return $this->successfulResponse('GetKostenplaatsen', [
                    'Kostenplaatsen' => (object) [
                        'cKostenplaats' => [
                            (object) [
                                'KostenplaatsId' => 12,
                                'KostenplaatsParentId' => 4,
                                'Omschrijving' => 'Sales',
                            ],
                            (object) [
                                'KostenplaatsId' => 13,
                                'KostenplaatsParentId' => 0,
                                'Omschrijving' => 'Support',
                            ],
                        ],
                    ],
                ]);
            }
        );

        $costCenters = $client->getCostCenters();

        $this->assertCount(2, $costCenters);
        $this->assertSame(12, $costCenters[0]->getCostCenterId());
        $this->assertSame(13, $costCenters[1]->getCostCenterId());

        unset($client);
    }

    /** @test */
    public function it_returns_no_cost_centers_when_the_response_has_none(): void
    {
        $client = $this->createClientForSoapCall(
            'GetKostenplaatsen',
            fn (array $arguments): object => $this->successfulResponse('GetKostenplaatsen')
        );

        $this->assertSame([], $client->getCostCenters());

        unset($client);
    }

    /** @test */
    public function it_throws_when_getting_cost_centers_returns_an_error(): void
    {
        $client = $this->createClientForSoapCall(
            'GetKostenplaatsen',
            fn (array $arguments): object => (object) [
                'GetKostenplaatsenResult' => (object) [
                    'ErrorMsg' => (object) [
                        'LastErrorCode' => 'ERR-01',
                        'LastErrorDescription' => 'Unable to get cost centers',
                    ],
                ],
            ]
        );
        $exception = null;

        try {
            $client->getCostCenters();
        } catch (EboekhoudenSoapException $caughtException) {
            $exception = $caughtException;
        }

        $this->assertInstanceOf(EboekhoudenSoapException::class, $exception);
        $this->assertSame('Unable to get cost centers', $exception->getMessage());

        unset($client);
    }

    /** @test */
    public function it_uses_the_cost_center_when_getting_a_balance(): void
    {
        $client = $this->createClientForSoapCall(
            'GetSaldo',
            function (array $arguments): object {
                $this->assertSame(12, $arguments['GetSaldo']['cFilter']['KostenPlaatsId']);

                return $this->successfulResponse('GetSaldo', ['Saldo' => 125.50]);
            }
        );
        $filter = (new SaldoFilter())->setCostCenterId(12);

        $this->assertSame(125.50, $client->getSaldo($filter));

        unset($client);
    }

    /** @test */
    public function it_uses_the_cost_center_when_getting_balances(): void
    {
        $client = $this->createClientForSoapCall(
            'GetSaldi',
            function (array $arguments): object {
                $this->assertSame(12, $arguments['GetSaldi']['cFilter']['KostenPlaatsId']);

                return $this->successfulResponse('GetSaldi');
            }
        );
        $filter = (new SaldiFilter())->setCostCenterId(12);

        $this->assertSame([], $client->getSaldi($filter));

        unset($client);
    }

    /** @test */
    public function it_sends_the_invoice_line_cost_center(): void
    {
        $client = $this->createClientForSoapCall(
            'AddFactuur',
            function (array $arguments): object {
                $this->assertSame(
                    12,
                    $arguments['AddFactuur']['oFact']['Regels'][0]['KostenplaatsID']
                );

                return $this->successfulResponse('AddFactuur', ['Factuurnummer' => 'INV-12']);
            }
        );
        $invoice = (new EboekhoudenInvoice())->addLine(
            (new EboekhoudenInvoiceLine())->setCostCenterId(12)
        );

        $this->assertSame('INV-12', $client->addInvoice($invoice));

        unset($client);
    }

    /** @test */
    public function it_sends_the_mutation_line_cost_center(): void
    {
        $client = $this->createClientForSoapCall(
            'AddMutatie',
            function (array $arguments): object {
                $this->assertSame(
                    12,
                    $arguments['AddMutatie']['oMut']['MutatieRegels'][0]['KostenplaatsID']
                );

                return $this->successfulResponse('AddMutatie', ['Mutatienummer' => 45]);
            }
        );
        $mutation = (new EboekhoudenMutation())->addLine(
            (new EboekhoudenMutationLine())->setCostCenterId(12)
        );

        $this->assertSame(45, $client->addMutation($mutation));

        unset($client);
    }

    private function createClientForSoapCall(string $expectedMethod, callable $callback): Client
    {
        $soapClient = $this->getMockBuilder(SoapClient::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['__soapCall'])
            ->getMock();

        $soapClient
            ->expects($this->exactly(2))
            ->method('__soapCall')
            ->willReturnCallback(
                function (string $method, array $arguments) use ($expectedMethod, $callback) {
                    if ($method === 'CloseSession') {
                        $this->assertSame(['SessionID' => 'session-id'], $arguments);

                        return null;
                    }

                    $this->assertSame($expectedMethod, $method);

                    return $callback($arguments);
                }
            );

        return $this->createClient($soapClient);
    }

    private function successfulResponse(string $method, array $result = []): object
    {
        $result['ErrorMsg'] = (object) [
            'LastErrorCode' => '',
        ];

        return (object) [
            $method . 'Result' => (object) $result,
        ];
    }

    private function createClient(SoapClient $soapClient): Client
    {
        $reflection = new ReflectionClass(Client::class);
        $client = $reflection->newInstanceWithoutConstructor();

        $soapClientProperty = $reflection->getProperty('soapClient');
        $soapClientProperty->setAccessible(true);
        $soapClientProperty->setValue($client, $soapClient);

        $sessionIdProperty = $reflection->getProperty('sessionId');
        $sessionIdProperty->setAccessible(true);
        $sessionIdProperty->setValue($client, 'session-id');

        $securityCodeProperty = $reflection->getProperty('secCode2');
        $securityCodeProperty->setAccessible(true);
        $securityCodeProperty->setValue($client, 'security-code');

        return $client;
    }
}
