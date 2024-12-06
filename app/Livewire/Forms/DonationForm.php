<?php

namespace App\Livewire\Forms;

use App\Models\Donation;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DonationForm extends Form
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
        Donation::create($this->except('csv'));
    }

    public function storeCSV(): void
    {
        $this->fund_id = 1;
        $this->amount = 0;
        $this->date = now();
        $this->validate();
        $handle = fopen($this->csv->path(), 'r');

        while (!feof($handle)) {
            $datas = [];

            $column_data = fgetcsv($handle);
            if ($column_data === false) {
                break;
            }

            $datas[] = $column_data;

            foreach ($datas as $data) {
                $this->date = Carbon::parse($data[0])->format('Y-m-d');
                $this->amount = intval(floatval(str_replace(',', '.', $column_data[2])) * 100);
                //$fund = $data[4];
                //$this->fund_id = Fund::where('account_number', $fund)->value('id');
                //if (!$this->fund_id) {
                  //  throw new \Exception("Fund not found");
                //}
            }
            Donation::create($this->except('csv'));
        }
        fclose($handle);
    }
}
