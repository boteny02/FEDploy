<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Textbook - Computer Science',
            'category_id' => 4,
            'unit' => 'Copy',
        ]);
        
        Item::create([
            'name' => 'Textbook - Engineering Mathematics',
            'category_id' => 4,
            'unit' => 'Copy',
        ]);
        
        Item::create([
            'name' => 'Reference Book - Dictionary',
            'category_id' => 4,
            'unit' => 'Copy',
        ]);
        
        Item::create([
            'name' => 'Academic Journal - Science & Tech',
            'category_id' => 4,
            'unit' => 'Copy',
        ]);
        
        Item::create([
            'name' => 'Magazine - Tech Digest',
            'category_id' => 4,
            'unit' => 'Copy',
        ]);
        
        Item::create([
            'name' => 'E-book Reader (e.g. Kindle)',
            'category_id' => 4,
            'unit' => 'Piece',
        ]);
        
        Item::create([
            'name' => 'Library Card',
            'category_id' => 4,
            'unit' => 'Piece',
        ]);
        
        Item::create([
            'name' => 'CD-ROM Educational Software',
            'category_id' => 4,
            'unit' => 'Piece',
        ]);
        
        Item::create([
            'name' => 'Library Shelf',
            'category_id' => 4,
            'unit' => 'Piece',
        ]);
        
        Item::create([
            'name' => 'Library Barcode Scanner',
            'category_id' => 4,
            'unit' => 'Piece',
        ]);
    }
}
