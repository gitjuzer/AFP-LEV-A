<?php

namespace Afp\Shared\Helpers;


abstract class UserTypeEnum extends BasicEnum
{
    const STUDENT = 'Diák';
    const TEACHER = 'Tanár';
    const ADMIN = 'Admin';
}