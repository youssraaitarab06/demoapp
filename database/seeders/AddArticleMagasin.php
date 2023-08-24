<?php

namespace Database\Seeders;
use App\Models\ArticleMagasin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddArticleMagasin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArticleMagasin=new ArticleMagasin();
        $ArticleMagasin->article_id=1;
        $ArticleMagasin->magasin_id=1;
        $ArticleMagasin->save();
    }
    }

