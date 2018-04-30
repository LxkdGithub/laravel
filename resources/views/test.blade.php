<?php
use App\Tool\Validate\ValidateCode;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Models\M3Result;
use App\Entity\TempEmail;
use App\Entity\Member;

$sendTemplateSMS = new SendTemplateSMS;
$sendTemplateSMS->sendTemplateSMS(13777804024, array(1234, 60), 1);