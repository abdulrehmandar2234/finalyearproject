<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websites = [

            [
                'name' => 'Comuniti',
                'link' => 'https://comuniti.pt/en/',  
                'currency_id' => 1,
                'source' => 'src',
            ],
            [
                'name' => 'GoodAfter',
                'link' => 'https://goodafter.com/pt/',         
                'currency_id' => 1,     
                'source' => 'src',
            ],
            [
                'name' => 'Auchan',
                'link' => 'https://www.auchan.pt/Frontoffice/',   
                'currency_id' => 1,     
                'source' => 'src',      
            ],

            [
                'name' => 'Continente',
                'link' => 'https://www.continente.pt/pt-pt/public/Pages/homepage.aspx',              
                'currency_id' => 1,
                'source' => 'data-original',
            ],
            [
                'name' => 'Spar',
                'link' => 'https://www.spar.pt/',         
                'currency_id' => 1,      
                'source' => 'src',
            ],
            [
                'name' => 'Celeiro',
                'link' => 'https://www.celeiro.pt/',        
                'currency_id' => 1,    
                'source' => 'src',  
            ],
            [
                'name' => 'Froiz',
                'link' => 'https://www.froiz.pt/',               
                'currency_id' => 1,
                'source' => 'src',
            ],
            [
                'name' => 'E-leclerc',
                'link' => 'https://www.e-leclerc.pt/',  
                'currency_id' => 1,          
                'source' => 'src',    
            ],
            [
                'name' => 'Mercadao',
                'link' => 'https://mercadao.pt/api/Campaigns/catalogue/5b2d35b85ce104001af36fca/products?limit=25',                
                'currency_id' => 1,
                'source' => 'src',
            ],
            [
                'name' => 'Lidl',
                'link' => 'https://www.lidl.pt/pt/',          
                'currency_id' => 1,    
                'source' => 'src',
            ],
            [
                'name' => 'Bolama',
                'link' => 'http://www.bolama.pt/',        
                'currency_id' => 1,    
                'source' => 'src',  
            ],
            [
                'name' => 'Go Natural',
                'link' => 'https://lojaonline.gonatural.pt/',   
                'currency_id' => 1,   
                'source' => 'data-src',        
            ],
            [
                'name' => 'Aldi',
                'link' => 'https://www.aldi.pt/',          
                'currency_id' => 1,    
                'source' => 'data-srcset',
            ],
            [
                'name' => 'Minipreco',
                'link' => 'https://lojaonline.minipreco.pt',              
                'currency_id' => 1,
                'source' => 'data-original',
            ],
            [
                'name' => 'Myapolonia',
                'link' => 'https://myapolonia.com/',      
                'currency_id' => 1,    
                'source' => 'src',    
            ],          
        ];
        DB::table('websites')->insert($websites);    
    }
}
