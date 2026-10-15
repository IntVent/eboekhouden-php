<?php

namespace IntVent\EBoekhouden\Tests;

use IntVent\EBoekhouden\Filters\CostCenterFilter;
use IntVent\EBoekhouden\Filters\SaldiFilter;
use IntVent\EBoekhouden\Filters\SaldoFilter;
use IntVent\EBoekhouden\Models\EboekhoudenArticle;
use IntVent\EBoekhouden\Models\EboekhoudenCostCenter;
use IntVent\EBoekhouden\Models\EboekhoudenInvoiceLine;
use IntVent\EBoekhouden\Models\EboekhoudenMutationLine;
use PHPUnit\Framework\TestCase;

class CostCenterTest extends TestCase
{
    /** @test */
    public function it_has_default_cost_center_values(): void
    {
        $filter = new CostCenterFilter();
        $costCenter = new EboekhoudenCostCenter();

        $this->assertSame(0, $filter->getCostCenterId());
        $this->assertSame(0, $filter->getCostCenterParentId());
        $this->assertSame('', $filter->getDescription());
        $this->assertSame([
            'cost_center_id' => 0,
            'cost_center_parent_id' => 0,
            'description' => '',
        ], $costCenter->toArray());
    }

    /** @test */
    public function it_filters_cost_centers(): void
    {
        $filter = (new CostCenterFilter())
            ->setCostCenterId(12)
            ->setCostCenterParentId(4)
            ->setDescription('Sales');

        $this->assertSame(12, $filter->getCostCenterId());
        $this->assertSame(4, $filter->getCostCenterParentId());
        $this->assertSame('Sales', $filter->getDescription());
    }

    /** @test */
    public function it_maps_a_cost_center_response(): void
    {
        $costCenter = new EboekhoudenCostCenter([
            'KostenplaatsId' => 12,
            'KostenplaatsParentId' => 4,
            'Omschrijving' => 'Sales',
        ]);

        $this->assertSame(12, $costCenter->getCostCenterId());
        $this->assertSame(4, $costCenter->getCostCenterParentId());
        $this->assertSame('Sales', $costCenter->getDescription());
        $this->assertSame([
            'cost_center_id' => 12,
            'cost_center_parent_id' => 4,
            'description' => 'Sales',
        ], $costCenter->toArray());
    }

    /** @test */
    public function it_maps_cost_centers_on_api_models(): void
    {
        $models = [
            new EboekhoudenArticle([
                'ArtikelID' => 1,
                'ArtikelOmschrijving' => 'Consultancy',
                'ArtikelCode' => 'CONS',
                'GroepOmschrijving' => 'Services',
                'GroepCode' => 'SRV',
                'Eenheid' => 'hour',
                'InkoopprijsExclBTW' => 0.0,
                'VerkoopprijsExclBTW' => 100.0,
                'VerkoopprijsInclBTW' => 121.0,
                'BTWCode' => 'HOOG_VERK_21',
                'TegenrekeningCode' => '8000',
                'BtwPercentage' => 21.0,
                'KostenplaatsID' => 12,
                'Actief' => true,
            ]),
            new EboekhoudenInvoiceLine([
                'Aantal' => 1.0,
                'Eenheid' => 'hour',
                'Code' => 'CONS',
                'Omschrijving' => 'Consultancy',
                'PrijsPerEenheid' => 100.0,
                'BTWCode' => 'HOOG_VERK_21',
                'TegenrekeningCode' => '8000',
                'KostenplaatsID' => 12,
            ]),
            new EboekhoudenMutationLine([
                'BedragInvoer' => 121.0,
                'BedragExclBTW' => 100.0,
                'BedragBTW' => 21.0,
                'BedragInclBTW' => 121.0,
                'BTWCode' => 'HOOG_VERK_21',
                'BTWPercentage' => 21.0,
                'Factuurnummer' => 'INV-12',
                'TegenrekeningCode' => '8000',
                'KostenplaatsID' => 12,
            ]),
        ];

        foreach ($models as $model) {
            $this->assertSame(12, $model->getCostCenterId());
            $this->assertSame(12, $model->toArray()['cost_center_id']);
        }
    }

    /**
     * @test
     * @dataProvider costCenterAwareObjects
     */
    public function it_uses_cost_center_accessors($object): void
    {
        $this->assertSame($object, $object->setCostCenterId(12));
        $this->assertSame(12, $object->getCostCenterId());

        if (method_exists($object, 'toArray')) {
            $this->assertSame(12, $object->toArray()['cost_center_id']);
        }
    }

    public static function costCenterAwareObjects(): array
    {
        return [
            'cost center' => [new EboekhoudenCostCenter()],
            'article' => [new EboekhoudenArticle()],
            'invoice line' => [new EboekhoudenInvoiceLine()],
            'mutation line' => [new EboekhoudenMutationLine()],
            'saldo filter' => [new SaldoFilter()],
            'saldi filter' => [new SaldiFilter()],
        ];
    }
}
