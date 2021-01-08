<?php

namespace App\Exports;

use App\User;
use App\Transaction;
use App\Market;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithProperties;

class TransactionExport implements FromView,WithProperties
{
	protected $id_market;
	use Exportable;

	function __construct($foo )
	{
		$this->id_market = $foo;
	}

	public function properties(): array
	{
		return [
            'creator'        => 'E-Laundry Company',
            'title'          => 'Laporan E-Laundry',
            'keywords'       => 'invoices,export,spreadsheet',
            'category'       => 'Invoices',
            'manager'        => 'M Amien',
            'company'        => 'E-Laundry',
        ];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	$transaction = Transaction::where('transactions.kode_market','=',$this->id_market)
						->select('transactions.*')
						->latest()
						->get();

         return view('report.report_transaction_excel', [
            'users' => $transaction
        ]);
    }
}
