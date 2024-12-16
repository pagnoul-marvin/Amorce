<?php

namespace App\Livewire\Forms;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionForm extends Form
{
    #[Validate]
    public $note;

    #[Validate]
    public $amount;

    #[Validate]
    public $fund_id;

    #[Validate]
    public $date;

    #[Validate]
    public $csv;

    #[Validate]
    public $hash;

    public $transaction;

    public function rules(): array
    {
        return [
            'note' => 'nullable|max:255',
            'amount' => 'required|numeric',
            'fund_id' => 'required',
            'date' => 'required|date',
            'csv' => 'required|mimes:csv',
            'hash' => 'required|string',
        ];
    }

    public function setTransaction(Transaction $transaction): void
    {
        $this->transaction = $transaction;
        $this->note = $transaction->note;
        $this->amount = $transaction->amount;
        $this->fund_id = $transaction->fund_id;
        $this->date = $transaction->date;
    }

    public function store(): void
    {
        $this->validateOnly('note');
        $this->validateOnly('amount');
        $this->validateOnly('fund_id');
        $this->validateOnly('date');
        Transaction::create([
            'note' => $this->note,
            'amount' => $this->amount * 100,
            'fund_id' => $this->fund_id,
            'date' => $this->date,
        ]);
    }

    public function manageCSV(): void
    {
        $this->validateOnly('csv');
        $handle = fopen($this->csv->path(), 'r');
        $transactionsNeedToBeLinked = session('transactionsNeedToBeLinked', []);

        while (!feof($handle)) {
            $datas = fgetcsv($handle);
            $str = '';
            if ($datas) {
                $str = implode(',', $datas);
            }
            $hash = md5($str);

            if (Transaction::where('hash', $hash)->exists()) {
                continue;
            } else {
                $datas[] = $hash;
                session(['transactionsNeedToBeLinked' => $datas]);
            }

            $transactionsNeedToBeLinked[] = $datas;
        }
        fclose($handle);
        session(['transactionsNeedToBeLinked' => $transactionsNeedToBeLinked]);
    }

    public function storeTransactionFromCSV():void
    {
        $this->validateOnly('note');
        $this->validateOnly('amount');
        $this->validateOnly('fund_id');
        $this->validateOnly('date');
        $this->validateOnly('hash');
        Transaction::create([
            'note' => $this->note,
            'amount' => $this->amount,
            'fund_id' => $this->fund_id,
            'date' => $this->date,
            'hash' => $this->hash,
        ]);
    }

    public function delete(Transaction $transaction): void
    {
        $transaction->delete();
    }
}
