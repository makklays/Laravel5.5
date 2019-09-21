<?php
namespace App\Modules\Bitcoin\exports;

use App\Modules\Bitcoin\models\Bitcoin;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class BitcoinExport implements FromCollection
{
    protected $params;

    public function __construct(Request $request)
    {
        $this->params = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bitcoin::search($this->params)->orderBy('created_at', 'DESC')->get();
        //return Bitcoin::all();
    }
}
