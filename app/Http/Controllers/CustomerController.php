<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function findAll()
    {
        $data = Customers::paginate(20);

        if (count($data) == 0) {
            return $this->out(data: [], status: 'kosong', code: 204);
        } else {
            return $this->out(data: $data, status: 'OK');
        }
    }
}
