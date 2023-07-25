<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class transactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Achat alimentaire',
            'Facture d\'électricité',
            'Essence',
            'Restaurant',
            'Shopping',
            'Voyage',
            'Salaire',
            'Loyer',
            'Assurance',
            'Divertissement',
        ];

        for ($i = 0; $i < 10; $i++) {
            DB::table('transactions')->insert([
                'name' => $this->getRandomCategory($categories),
                'amount' => rand(-100000, 100000)/ 100,
                'date_transaction' => $this->getRandomDate(),
            ]);
        }
    }

    private function getRandomCategory(array $categories)
    {
        return $categories[array_rand($categories)];
    }

    private function getRandomDate()
    {
        $startDate = strtotime('-1 year');
        $endDate = time();
        return date('Y-m-d H:i:s', rand($startDate, $endDate));
    }
}