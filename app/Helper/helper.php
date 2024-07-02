<?php

use Illuminate\Support\Str;
use App\Models\System\Config;
use App\Models\System\Module;
use Illuminate\Support\Facades\Auth;

function getConfig($slug)
{
    return Config::where('slug', $slug)->value('value') ?? '';
}

function statusBadge($item, $indexUrl)
{
    return $item->status ? '<a class="badge badge-success" href="' . $indexUrl . '/change-status/' . $item->id  . '">' . 'Active' . '</a>' : '<a class="badge badge-danger" href="' . $indexUrl . '/change-status/' . $item->id  . '">' . 'Inactive' . '</a>';
}

function paginate()
{
    return 10;
}

function authUser()
{
    return Auth::user();
}


function generateToken($length)
{
    return bin2hex(openssl_random_pseudo_bytes($length));
}

function generatePassword($length)
{
    return Str::random(6);
}

function printFirstNameOnly($name)
{
    $nameParts = explode(" ", $name);
    return $nameParts[0];
}

function moduleId($moduleName)
{
    return Module::where('route', $moduleName)->value('id') ?? null;
}

function limitWords($word, $limit)
{
    return Str::words($word, $limit, '...');
}

function convertToTime($time)
{
    $dateTime = \Carbon\Carbon::parse($time);
    $time12Hour = $dateTime->format('Y-m-d h:i A');
    return $time12Hour;
}

function convertToDate($date)
{
    $dateTime = \Carbon\Carbon::parse($date);
    return $dateTime->format('Y-m-d');
}

function indexImagePreview($path, $item)
{
    return '<img src="' . asset($path . '/' . $item->files()->value('title')) . '" height="100px" alt="">';
}
