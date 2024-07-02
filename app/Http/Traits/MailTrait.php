<?php

namespace App\Http\Traits;

use App\Models\System\EmailTemplate;

trait MailTrait
{

    public function emailTemplate($data, $code)
    {
        $emailTemplate = EmailTemplate::where('code', $code)->first();
        $content = $emailTemplate->content;

        $pattern = '/%([^%]+)%/';
        preg_match_all($pattern, $content, $matches);

        $placeholders = $matches[1];

        foreach ($placeholders as $placeholder) {
            if (isset($data["%$placeholder%"])) {
                $content = str_replace("%$placeholder%", $data["%$placeholder%"],  $content);
            }
        }

        return [
            'content' => $content,
            'subject' => $emailTemplate->subject,
            'from' => $emailTemplate->from
        ];
    }
}
