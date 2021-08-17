<?php

namespace IntVent\EBoekhouden\Models;

use DateTime;
use IntVent\EBoekhouden\Contracts\Arrayable;
use IntVent\EBoekhouden\Exceptions\EboekhoudenException;
use IntVent\EBoekhouden\Traits\ProtectedFieldsToArrayTrait;

class EboekhoudenInvoice implements Arrayable
{
    use ProtectedFieldsToArrayTrait;

    protected string $invoice_number = '';
    protected string $relation_code = '';
    protected ?DateTime $date = null;
    protected int $payment_term = 30;
    protected string $invoice_template = '';
    protected bool $send_per_email = false;
    protected string $email_subject = '';
    protected string $email_message = '';
    protected string $email_from_address = '';
    protected string $email_from_name = '';
    protected bool $automatic_incasso = false;
    protected string $incasso_iban = '';
    protected string $incasso_mandate_kind = '';
    protected string $incasso_mandate_id = '';
    protected ?DateTime $incasso_mandate_signature_date = null;
    protected bool $incasso_mandate_first = false;
    protected string $incasso_account_number = '';
    protected string $incasso_account_holder = '';
    protected string $incasso_city = '';
    protected string $incasso_description_row_1 = '';
    protected string $incasso_description_row_2 = '';
    protected string $incasso_description_row_3 = '';
    protected bool $process_in_ledger = false;
    protected string $mutation_description = '';
    protected array $lines = [];

    /**
     * EboekhoudenInvoice constructor.
     * @param array|null $item
     * @throws EboekhoudenException
     */
    public function __construct(array $item = null)
    {
        if (! empty($item)) {
            $this
                ->setInvoiceNumber($item['Factuurnummer'])
                ->setRelationCode($item['Relatiecode'])
                ->setDate($item['Datum'])
                ->setPaymentTerm($item['Betalingstermijn'])
                ->setInvoiceTemplate($item['Factuursjabloon'])
                ->setSendPerEmail($item['PerEmailVerzenden'])
                ->setEmailSubject($item['EmailOnderwerp'])
                ->setEmailMessage($item['EmailBericht'])
                ->setEmailFromAddress($item['EmailVanAdres'])
                ->setEmailFromName($item['EmailVanNaam'])
                ->setAutomaticIncasso($item['AutomatischeIncasso'])
                ->setIncassoIban($item['IncassoIBAN'])
                ->setIncassoMandateKind($item['IncassoMachtigingSoort'])
                ->setIncassoMandateId($item['IncassoMachtigingID'])
                ->setIncassoMandateSignatureDate($item['IncassoMachtigingDatumOndertekening'])
                ->setIncassoMandateFirst($item['IncassoMachtigingFirst'])
                ->setIncassoAccountNumber($item['IncassoMachtigingNummer'])
                ->setIncassoAccountHolder($item['IncassoTnv'])
                ->setIncassoCity($item['IncassoPlaats'])
                ->setIncassoDescriptionRow1($item['IncassoOmschrijvingRegel1'])
                ->setIncassoDescriptionRow2($item['IncassoOmschrijvingRegel2'])
                ->setIncassoDescriptionRow3($item['IncassoOmschrijvingRegel3'])
                ->setProcessInLedger($item['InBoekhoudingPlaatsen'])
                ->setMutationDescription($item['BoekhoudmutatieOmschrijving'])
                ->setLines($item['Regels']);
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
     * @param  string  $invoice_number
     * @return EboekhoudenInvoice
     */
    public function setInvoiceNumber(string $invoice_number): EboekhoudenInvoice
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
     * @param  string  $relation_code
     * @return EboekhoudenInvoice
     */
    public function setRelationCode(string $relation_code): EboekhoudenInvoice
    {
        $this->relation_code = $relation_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        if (is_null($this->date)) {
            return (new DateTime())->format('Y-m-d');
        }

        return $this->date->format('Y-m-d');
    }

    /**
     * @param  DateTime|null  $date
     * @return EboekhoudenInvoice
     */
    public function setDate(?DateTime $date): EboekhoudenInvoice
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentTerm(): int
    {
        return $this->payment_term;
    }

    /**
     * @param  int  $payment_term
     * @return EboekhoudenInvoice
     * @throws EboekhoudenException
     */
    public function setPaymentTerm(int $payment_term): EboekhoudenInvoice
    {
        if ($payment_term < 0) {
            throw new EboekhoudenException("Payment term must be a positive integer");
        }

        $this->payment_term = $payment_term;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceTemplate(): string
    {
        return $this->invoice_template;
    }

    /**
     * @param  string  $invoice_template
     * @return EboekhoudenInvoice
     */
    public function setInvoiceTemplate(string $invoice_template): EboekhoudenInvoice
    {
        $this->invoice_template = $invoice_template;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSendPerEmail(): bool
    {
        return $this->send_per_email;
    }

    /**
     * @param  bool  $send_per_email
     * @return EboekhoudenInvoice
     */
    public function setSendPerEmail(bool $send_per_email): EboekhoudenInvoice
    {
        $this->send_per_email = $send_per_email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailSubject(): string
    {
        return $this->email_subject;
    }

    /**
     * @param  string  $email_subject
     * @return EboekhoudenInvoice
     */
    public function setEmailSubject(string $email_subject): EboekhoudenInvoice
    {
        $this->email_subject = $email_subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailMessage(): string
    {
        return $this->email_message;
    }

    /**
     * @param  string  $email_message
     * @return EboekhoudenInvoice
     */
    public function setEmailMessage(string $email_message): EboekhoudenInvoice
    {
        $this->email_message = $email_message;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailFromAddress(): string
    {
        return $this->email_from_address;
    }

    /**
     * @param  string  $email_from_address
     * @return EboekhoudenInvoice
     */
    public function setEmailFromAddress(string $email_from_address): EboekhoudenInvoice
    {
        $this->email_from_address = $email_from_address;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailFromName(): string
    {
        return $this->email_from_name;
    }

    /**
     * @param  string  $email_from_name
     * @return EboekhoudenInvoice
     */
    public function setEmailFromName(string $email_from_name): EboekhoudenInvoice
    {
        $this->email_from_name = $email_from_name;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAutomaticIncasso(): bool
    {
        return $this->automatic_incasso;
    }

    /**
     * @param  bool  $automatic_incasso
     * @return EboekhoudenInvoice
     */
    public function setAutomaticIncasso(bool $automatic_incasso): EboekhoudenInvoice
    {
        $this->automatic_incasso = $automatic_incasso;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoIban(): string
    {
        return $this->incasso_iban;
    }

    /**
     * @param  string  $incasso_iban
     * @return EboekhoudenInvoice
     */
    public function setIncassoIban(string $incasso_iban): EboekhoudenInvoice
    {
        $this->incasso_iban = $incasso_iban;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoMandateKind(): string
    {
        return $this->incasso_mandate_kind;
    }

    /**
     * @param  string  $incasso_mandate_kind
     * @return EboekhoudenInvoice
     */
    public function setIncassoMandateKind(string $incasso_mandate_kind): EboekhoudenInvoice
    {
        $this->incasso_mandate_kind = $incasso_mandate_kind;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoMandateId(): string
    {
        return $this->incasso_mandate_id;
    }

    /**
     * @param  string  $incasso_mandate_id
     * @return EboekhoudenInvoice
     */
    public function setIncassoMandateId(string $incasso_mandate_id): EboekhoudenInvoice
    {
        $this->incasso_mandate_id = $incasso_mandate_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoMandateSignatureDate(): string
    {
        if (! is_null($this->incasso_mandate_signature_date)) {
            return $this->incasso_mandate_signature_date->format('y-m-d');
        }

        return (new DateTime('1970-01-01 00:00:00'))->format('Y-m-d');
    }

    /**
     * @param  DateTime|null  $incasso_mandate_signature_date
     * @return EboekhoudenInvoice
     */
    public function setIncassoMandateSignatureDate(?DateTime $incasso_mandate_signature_date): EboekhoudenInvoice
    {
        $this->incasso_mandate_signature_date = $incasso_mandate_signature_date;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIncassoMandateFirst(): bool
    {
        return $this->incasso_mandate_first;
    }

    /**
     * @param  bool  $incasso_mandate_first
     * @return EboekhoudenInvoice
     */
    public function setIncassoMandateFirst(bool $incasso_mandate_first): EboekhoudenInvoice
    {
        $this->incasso_mandate_first = $incasso_mandate_first;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoAccountNumber(): string
    {
        return $this->incasso_account_number;
    }

    /**
     * @param  string  $incasso_account_number
     * @return EboekhoudenInvoice
     */
    public function setIncassoAccountNumber(string $incasso_account_number): EboekhoudenInvoice
    {
        $this->incasso_account_number = $incasso_account_number;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoAccountHolder(): string
    {
        return $this->incasso_account_holder;
    }

    /**
     * @param  string  $incasso_account_holder
     * @return EboekhoudenInvoice
     */
    public function setIncassoAccountHolder(string $incasso_account_holder): EboekhoudenInvoice
    {
        $this->incasso_account_holder = $incasso_account_holder;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoCity(): string
    {
        return $this->incasso_city;
    }

    /**
     * @param  string  $incasso_city
     * @return EboekhoudenInvoice
     */
    public function setIncassoCity(string $incasso_city): EboekhoudenInvoice
    {
        $this->incasso_city = $incasso_city;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoDescriptionRow1(): string
    {
        return $this->incasso_description_row_1;
    }

    /**
     * @param  string  $incasso_description_row_1
     * @return EboekhoudenInvoice
     */
    public function setIncassoDescriptionRow1(string $incasso_description_row_1): EboekhoudenInvoice
    {
        $this->incasso_description_row_1 = $incasso_description_row_1;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoDescriptionRow2(): string
    {
        return $this->incasso_description_row_2;
    }

    /**
     * @param  string  $incasso_description_row_2
     * @return EboekhoudenInvoice
     */
    public function setIncassoDescriptionRow2(string $incasso_description_row_2): EboekhoudenInvoice
    {
        $this->incasso_description_row_2 = $incasso_description_row_2;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncassoDescriptionRow3(): string
    {
        return $this->incasso_description_row_3;
    }

    /**
     * @param  string  $incasso_description_row_3
     * @return EboekhoudenInvoice
     */
    public function setIncassoDescriptionRow3(string $incasso_description_row_3): EboekhoudenInvoice
    {
        $this->incasso_description_row_3 = $incasso_description_row_3;

        return $this;
    }

    /**
     * @return bool
     */
    public function getProcessInLedger(): bool
    {
        return $this->process_in_ledger;
    }

    /**
     * @param  bool  $process_in_ledger
     * @return EboekhoudenInvoice
     */
    public function setProcessInLedger(bool $process_in_ledger): EboekhoudenInvoice
    {
        $this->process_in_ledger = $process_in_ledger;

        return $this;
    }

    /**
     * @return string
     */
    public function getMutationDescription(): string
    {
        return $this->mutation_description;
    }

    /**
     * @param  string  $mutation_description
     * @return EboekhoudenInvoice
     */
    public function setMutationDescription(string $mutation_description): EboekhoudenInvoice
    {
        $this->mutation_description = $mutation_description;

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
     * @param  EboekhoudenInvoiceLine  $line
     * @return EboekhoudenInvoice
     */
    public function addLine(EboekhoudenInvoiceLine $line): EboekhoudenInvoice
    {
        if (empty($this->lines)) {
            $this->lines = [];
        }

        $this->lines[] = $line;

        return $this;
    }

    /**
     * @param  array  $lines
     * @return EboekhoudenInvoice
     * @throws EboekhoudenException
     */
    public function setLines(array $lines): EboekhoudenInvoice
    {
        foreach ($lines as $line) {
            if (! ($line instanceof EboekhoudenInvoiceLine)) {
                throw new EboekhoudenException('All invoice lines must be instance of '.EboekhoudenInvoiceLine::class);
            }
        }
        $this->lines = $lines;

        return $this;
    }
}
