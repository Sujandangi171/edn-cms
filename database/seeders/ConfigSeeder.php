<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\System\Config;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ConfigSeeder extends Seeder
{
    protected $model;

    public function __construct(Config $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        Config::truncate();

        $directory = public_path() . '/uploads/config';
        if (is_dir($directory) != true) {
            File::makeDirectory($directory, $mode = 0755, true);
        }

        File::copy(public_path('images/cms_logo.png'), public_path('uploads/config/cms_logo.png'));
        // File::copy(public_path('images/site_logo.png'), public_path('uploads/config/site_logo.png'));
        File::copy(public_path('images/qr_code.png'), public_path('uploads/config/qr_code.png'));
        File::copy(public_path('images/fav_icon.png'), public_path('uploads/config/fav_icon.png'));

        $configs = [
            [
                'label' => 'CMS Title',
                'slug' => 'cms-title',
                'type' => 'text',
                'value' => 'Endeavor Nepal',
            ],
            [
                'label' => 'CMS Logo',
                'slug' => 'cms-logo',
                'type' => 'file',
                'value' => 'cms_logo.png',
            ],
            [
                'label' => 'Site Logo',
                'slug' => 'site-logo',
                'type' => 'file',
                'value' => 'site_logo.png',
            ],
            [
                'label' => 'Qr Code',
                'slug' => 'qr-code',
                'type' => 'file',
                'value' => 'qr_code.png',
            ],
            [
                'label' => 'Contact',
                'slug' => 'contact',
                'type' => 'text',
                'value' => '+977-01-5234535',
            ],
            [
                'label' => 'Email',
                'slug' => 'email',
                'type' => 'text',
                'value' => 'info@endeavornepal.com',
            ],
            [
                'label' => 'Location',
                'slug' => 'location',
                'type' => 'text',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.8476032935605!2d85.28362467532311!3d27.691104676191877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1971a0ce21a3%3A0x39ca4ba28cf82384!2sEndeavor%20Nepal%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1706685822257!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            ],
            [
                'label' => 'Address',
                'slug' => 'address',
                'type' => 'text',
                'value' => 'Rabi Bhawan -14, Kathmandu',
            ],
            [
                'label' => 'Fav-Icon',
                'slug' => 'fav-icon',
                'type' => 'file',
                'value' => 'fav_icon.png',
            ],
            [
                'label' => 'Opening-days',
                'slug' => 'opening-days',
                'type' => 'text',
                'value' => 'Monday-Friday (10:00 AM - 06:00 PM)',
            ],
            [
                'label' => 'Company Name',
                'slug' => 'company-name',
                'type' => 'text',
                'value' => 'Endeavor Nepal Pvt. Ltd.',
            ],




        ];

        foreach ($configs as $config) {
            $this->model->updateOrInsert(
                ['slug' => $config['slug']],
                [
                    'label' => $config['label'],
                    'slug' => $config['slug'],
                    'type' => $config['type'],
                    'value' => $config['value'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
