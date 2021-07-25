<?php

namespace App\Core\Enums;

use App\Core\Abstracts\Enum;

class EnumsPost extends Enum
{
    const TYPE_POST = "post";
    const TYPE_PRODUCT = "product";
    const TYPE_PAGE = "page";

    const STATUS_PUBLISHED = "published" ;
    const STATUS_DISABLED = "disabled" ;
    const STATUS_DRAFT = "draft" ;

    const FORMAT_CONTEXT = "context" ;
    const FORMAT_PODCAST = "podcast" ;
    const FORMAT_VIDEO = "video" ;
}
