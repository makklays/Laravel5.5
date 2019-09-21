<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBitcoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitcoins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->double('price', 20, 8 );
            $table->double('price_2', 20, 8)->nullable();

            $table->json('fees');
            $table->json('limits')->nullable();
            $table->datetime('created_at');
        });

        $json = '{
            "UAH-BTC":{"id":1,"price":"0.00000416","fees":{"in_fix":2,"in_per":"0.50","out_fix":0.0005,"out_per":0},"limits":{"min":691,"max":14000,"max_out":"0.05827721","min_out":null}},
            "UAH-LTC":{"id":3,"price":"0.00060548","fees":{"in_fix":2,"in_per":"0.50","out_fix":0.01,"out_per":0},"limits":{"min":969,"max":14000,"max_out":"8.47672162","min_out":null}},
            "UAH-BCH":{"id":9,"price":"0.00013958","fees":{"in_fix":2,"in_per":"0.50","out_fix":0.001,"out_per":0},"limits":{"min":91,"max":14000,"max_out":"1.95421107","min_out":null}},
            "UAH-ETH":{"id":2,"price":"0.00023318","fees":{"in_fix":2,"in_per":"0.50","out_fix":0.01,"out_per":0},"limits":{"min":543,"max":14000,"max_out":"3.26454935","min_out":null}},
            "BTC-UAH":{"id":3,"price":"233199.9600","price_2":234374.7375,"fees":{"in_fix":0,"in_per":0,"out_fix":0,"out_per":"0.00"},"limits":{"min":0.0025,"max":"0.04534258","max_out":"10573.89","min_out":200}},
            "BTC-LTC":{"id":3,"price":"145.55234051","fees":{"in_fix":"0.00004115","in_per":"0.20000000","out_fix":0.01,"out_per":0},"limits":{"min":"0.00358765","max":"0.37787090","max_out":55,"min_out":0.5}},
            "LTC-BTC":{"id":1,"price":"0.00687929","fees":{"in_fix":"0.00001500","in_per":"0.20000000","out_fix":0.0005,"out_per":0},"limits":{"min":"0.36779293","max":"5087.73434435","max_out":35,"min_out":0.002}},
            "BTC-BCH":{"id":9,"price":"33.74242359","fees":{"in_fix":"0.00004115","in_per":"0.20000000","out_fix":0.001,"out_per":0},"limits":{"min":"0.00260167","max":"0.88908840","max_out":30,"min_out":0.01}},
            "BCH-BTC":{"id":1,"price":"0.02964300","fees":{"in_fix":"0.00001100","in_per":"0.20000000","out_fix":0.0005,"out_per":0},"limits":{"min":"0.08536178","max":"1180.71720130","max_out":35,"min_out":0.002}},
            "BTC-ETH":{"id":2,"price":"56.27925337","fees":{"in_fix":"0.00004115","in_per":"0.20000000","out_fix":0.01,"out_per":0},"limits":{"min":"0.00275150","max":"0.88842650","max_out":50,"min_out":0.1}},
            "LTC-UAH":{"id":3,"price":"1603.2419","price_2":1606.716,"fees":{"in_fix":0,"in_per":0,"out_fix":0,"out_per":"0.00"},"limits":{"min":0.0015,"max":"6.59531789","max_out":"10573.89","min_out":200}},
            "LTC-BCH":{"id":9,"price":"0.22941697","fees":{"in_fix":"0.00001500","in_per":"0.40000000","out_fix":0.001,"out_per":0},"limits":{"min":"0.04863601","max":"130.76626350","max_out":30,"min_out":0.01}},
            "BCH-LTC":{"id":3,"price":"4.27983745","fees":{"in_fix":"0.00001100","in_per":"0.40000000","out_fix":0.01,"out_per":0},"limits":{"min":"0.12084759","max":"12.85095515","max_out":55,"min_out":0.5}},
            "LTC-ETH":{"id":2,"price":"0.38668230","fees":{"in_fix":"0.00001500","in_per":"0.20000000","out_fix":0.01,"out_per":0},"limits":{"min":"0.28790577","max":"129.30511650","max_out":50,"min_out":0.1}},
            "BCH-UAH":{"id":3,"price":"6954.3363","price_2":6948.9365,"fees":{"in_fix":0,"in_per":0,"out_fix":0,"out_per":"0.00"}}
        }';
        $count = json_decode($json);

        $arr_dates = [
            '2019-09-20 16:53:04', '2019-09-21 16:54:04',
            '2019-09-20 16:55:05', '2019-09-21 16:58:08', '2019-09-21 16:57:10'
        ];

        foreach($count as $k => $item){
            DB::table('bitcoins')->insert([
                'title' => trim($k),
                'price' => (float) (isset($item->price) && $item->price >= 0 ? round($item->price, 8, PHP_ROUND_HALF_DOWN) : 0),
                'price_2' => (float) (isset($item->price_2) && $item->price_2 >= 0 ? round($item->price_2, 8, PHP_ROUND_HALF_DOWN) : 0),
                'fees' => (isset($item->fees) && !empty($item->fees) ? json_encode($item->fees) : ''),
                'limits' => (isset($item->limits) && !empty($item->limits) ? json_encode($item->limits) : ''),
                'created_at' => $arr_dates[rand(0,4)],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitcoins');
    }
}