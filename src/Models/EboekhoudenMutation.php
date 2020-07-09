<?php

namespace IntVent\EBoekhouden\Models;

use DateTime;
use IntVent\EBoekhouden\Exceptions\EboekhoudenException;

class EboekhoudenMutation
{
    protected int $number = 0;
    protected string $kind = '';
    protected ?DateTime $date = null;
    protected string $ledger_code = '';
    protected ?string $relation_code = null;
    protected ?string $invoice_number = null;
    protected string $description = '';
    protected ?int $payment_term = null;
    protected array $lines = [];

    /**
     * EboekhoudenMutation constructor.
     * @param  array|null  $item
     * @throws EboekhoudenException
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setNumber($item['MutatieNr'])
                ->setKind($item['Soort'])
                ->setDate(new DateTime($item['Datum']))
                ->setLedgerCode($item['Rekening'])
                ->setRelationCode($item['RelatieCode'])
                ->setInvoiceNumber($item['Factuurnummer'])
                ->setDescription($item['Omschrijving'])
                ->setPaymentTerm($item['Betalingstermijn']);

            $lines = $item['MutatieRegels']->cMutatieListRegel;

            if (is_object($lines)) {
                $this->addLine(new EboekhoudenMutationLine((array) $lines));
            } else {
                $this->setLines(array_map(
                    fn (array $line) => new EboekhoudenMutationLine((array) $line),
                    $lines
                ));
            }
        }
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param  int  $number
     * @return EboekhoudenMutation
     */
    public function setNumber(int $number): EboekhoudenMutation
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @param  string  $kind
     * @return EboekhoudenMutation
     */
    public function setKind(string $kind): EboekhoudenMutation
    {
        $this->kind = $kind;

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
     * @param  DateTime|null  $date
     * @return EboekhoudenMutation
     */
    public function setDate(?DateTime $date): EboekhoudenMutation
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getLedgerCode(): string
    {
        return $this->ledger_code;
    }

    /**
     * @param  string  $ledger_code
     * @return EboekhoudenMutation
     */
    public function setLedgerCode(string $ledger_code): EboekhoudenMutation
    {
        $this->ledger_code = $ledger_code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRelationCode(): ?string
    {
        return $this->relation_code;
    }

    /**
     * @param  string|null  $relation_code
     * @return EboekhoudenMutation
     */
    public function setRelationCode(?string $relation_code): EboekhoudenMutation
    {
        $this->relation_code = $relation_code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoice_number;
    }

    /**
     * @param  string|null  $invoice_number
     * @return EboekhoudenMutation
     */
    public function setInvoiceNumber(?string $invoice_number): EboekhoudenMutation
    {
        $this->invoice_number = $invoice_number;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param  string  $description
     * @return EboekhoudenMutation
     */
    public function setDescription(string $description): EboekhoudenMutation
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentTerm(): ?int
    {
        return $this->payment_term;
    }

    /**
     * @param  int|null  $payment_term
     * @return EboekhoudenMutation
     */
    public function setPaymentTerm(?int $payment_term): EboekhoudenMutation
    {
        $this->payment_term = $payment_term;

        return $this;
    }

    /**
     * @return EboekhoudenMutationLine[]
     */
    public function getLines(): array
    {
        if (empty($this->lines)) {
            return [];
        }

        return $this->lines;
    }

    /**
     * @param  EboekhoudenMutationLine  $line
     * @return EboekhoudenMutation
     */
    public function addLine(EboekhoudenMutationLine $line): EboekhoudenMutation
    {
        if (empty($this->lines)) {
            $this->lines = [];
        }
        $this->lines[] = $line;

        return $this;
    }

    /**
     * @param  array  $lines
     * @return EboekhoudenMutation
     * @throws EboekhoudenException
     */
    public function setLines(array $lines): EboekhoudenMutation
    {
        foreach ($lines as $line) {
            if (! ($line instanceof EboekhoudenMutationLine)) {
                throw new EboekhoudenException('All mutation lines must be instance of '.EboekhoudenMutationLine::class);
            }
        }
        $this->lines = $lines;

        return $this;
    }

    /**
     * Get total line amount without vat
     * @return float
     */
    public function getAmountWithoutVat(): float
    {
        if (empty($this->lines)) {
            return 0.0;
        }

        return array_sum(array_map(fn ($line): float => $line->getAmount(), $this->lines));
    }

    /**
     * Get total line vat amount
     * @return float
     */
    public function getVatAmount(): float
    {
        if (empty($this->lines)) {
            return 0.0;
        }

        return array_sum(array_map(
            fn ($line): float => ($line->getAmount() / 100) * $line->getVatPercentage(),
            $this->lines
        ));
    }
}
