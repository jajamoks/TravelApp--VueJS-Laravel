<?php
if (env('APP_ENV') !== 'production') {
    return \net\authorize\api\constants\ANetEnvironment::SANDBOX;
}
return \net\authorize\api\constants\ANetEnvironment::PRODUCTION;
