<?php

namespace IntVent\EBoekhouden\Models;

use DateTime;
use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Exceptions\EboekhoudenException;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenInvoiceList implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected string $invoice_number = '';
    protected string $relation_code = '';
    protected ?DateTime $date = null;
    protected int $payment_term = 0;
    protected float $total_excl_vat = 0.0;
    protected float $total_vat = 0.0;
    protected float $total_incl_vat = 0.0;
    protected float $total_outstanding = 0.0;
    protected ?string $url_to_pdf = null;
    protected array $lines = [];

    /**
     * EboekhoudenInvoiceList constructor.
     * @param array|null $item
     * @throws EboekhoudenException
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setInvoiceNumber($item['Factuurnummer'])
                ->setRelationCode($item['Relatiecode'])
                ->setDate(new DateTime($item['Datum']))
                ->setPaymentTerm($item['Betalingstermijn'])
                ->setTotalExclVat($item['TotaalExclBTW'])
                ->setTotalVat($item['TotaalBTW'])
                ->setTotalInclVat($item['TotaalInclBTW'])
                ->setTotalOutstanding($item['TotaalOpenstaand'])
                ->setUrlToPdf($item['URLPDFBestand']);

            $lines = $item['Regels']->cFactuurRegel;

            if (is_object($lines)) {
                $this->addLine(new EboekhoudenInvoiceLine((array)$lines));
            } else {
                $this->setLines(array_map(
                    fn (object $line): EboekhoudenInvoiceLine => new EboekhoudenInvoiceLine((array)$line),
                    $lines
                ));
            }
        }
    }

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoice_number;
    }

    /**
     * @param string $invoice_number
     * @return EboekhoudenInvoiceList
     */
    public function setInvoiceNumber(string $invoice_number): EboekhoudenInvoiceList
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    /**
     * @return string
     */
    public function getRelationCode(): string
    {
        return $this->relation_code;
    }

    /**
     * @param string $relation_code
     * @return EboekhoudenInvoiceList
     */
    public function setRelationCode(string $relation_code): EboekhoudenInvoiceList
    {
        $this->relation_code = $relation_code;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime|null $date
     * @return EboekhoudenInvoiceList
     */
    public function setDate(?DateTime $date): EboekhoudenInvoiceList
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return float
     */
    public function getPaymentTerm(): float
    {
        return $this->payment_term;
    }

    /**
     * @param int $payment_term
     * @return EboekhoudenInvoiceList
     */
    public function setPaymentTerm(int $payment_term): EboekhoudenInvoiceList
    {
        $this->payment_term = $payment_term;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalExclVat(): float
    {
        return $this->total_excl_vat;
    }

    /**
     * @param float $total_excl_vat
     * @return EboekhoudenInvoiceList
     */
    public function setTotalExclVat(float $total_excl_vat): EboekhoudenInvoiceList
    {
        $this->total_excl_vat = $total_excl_vat;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalVat(): float
    {
        return $this->total_vat;
    }

    /**
     * @param float $total_vat
     * @return EboekhoudenInvoiceList
     */
    public function setTotalVat(float $total_vat): EboekhoudenInvoiceList
    {
        $this->total_vat = $total_vat;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalInclVat(): float
    {
        return $this->total_incl_vat;
    }

    /**
     * @param float $total_incl_vat
     * @return EboekhoudenInvoiceList
     */
    public function setTotalInclVat(float $total_incl_vat): EboekhoudenInvoiceList
    {
        $this->total_incl_vat = $total_incl_vat;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalOutstanding(): float
    {
        return $this->total_outstanding;
    }

    /**
     * @param float $total_outstanding
     * @return EboekhoudenInvoiceList
     */
    public function setTotalOutstanding(float $total_outstanding): EboekhoudenInvoiceList
    {
        $this->total_outstanding = $total_outstanding;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrlToPdf(): ?string
    {
        return $this->url_to_pdf;
    }

    /**
     * @param string|null $url_to_pdf
     * @return EboekhoudenInvoiceList
     */
    public function setUrlToPdf(?string $url_to_pdf): EboekhoudenInvoiceList
    {
        $this->url_to_pdf = $url_to_pdf;

        return $this;
    }

    /**
     * @return EboekhoudenInvoiceLine[]
     */
    public function getLines(): array
    {
        if (empty($this->lines)) {
            return [];
        }

        return $this->lines;
    }

    /**
     * @param EboekhoudenInvoiceLine $line
     * @return EboekhoudenInvoiceList
     */
    public function addLine(EboekhoudenInvoiceLine $line): EboekhoudenInvoiceList
    {
        if (empty($this->lines)) {
            $this->lines = [];
        }
        $this->lines[] = $line;

        return $this;
    }

    /**
     * @param array $lines
     * @return EboekhoudenInvoiceList
     * @throws EboekhoudenException
     */
    public function setLines(array $lines): EboekhoudenInvoiceList
    {
        foreach ($lines as $line) {
            if (! ($line instanceof EboekhoudenInvoiceLine)) {
                throw new EboekhoudenException('All invoice lines must be instance of ' . EboekhoudenInvoiceLine::class);
            }
        }
        $this->lines = $lines;

        return $this;
    }
}
