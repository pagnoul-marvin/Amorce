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

    public $donation;

    public function rules(): array
    {
        return [
            'note' => 'nullable|max:255',
            'amount' => 'required|numeric|min:0',
            'fund_id' => 'required',
            'date' => 'required|date',
            'csv' => 'required|mimes:csv',
        ];
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

            if ($hash === Transaction::where('hash', $hash)) {
                continue;
            } else {
                session(['transactionsNeedToBeLinked' => $datas]);
            }

            $transactionsNeedToBeLinked[] = $datas;

            //$toCreate = [
            //'hash' => $hash,
            // 'date' => Carbon::parse($datas[0])->format('Y-m-d'),
            // 'amount' => floatval(str_replace(',', '.', $datas[2])) * 100,
            //];
            //Transaction::create($toCreate);
        }
        fclose($handle);
        session(['transactionsNeedToBeLinked' => $transactionsNeedToBeLinked]);
    }
}
