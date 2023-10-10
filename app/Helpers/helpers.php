<?php

function generateOTP(){
    $otp = mt_rand(1000,9999);
    return $otp;
}
