<?php

namespace App\Enum;

enum CommentEnum :int
{
    const IS_APPROVED = 1;
    const IS_NOT_APPROVED = 0;

    const IS_ACTIVE = 1;
    const IS_NOT_ACTIVE = 0;
}
