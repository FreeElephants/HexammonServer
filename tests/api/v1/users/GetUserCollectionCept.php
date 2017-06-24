<?php
$I = new ApiTester($scenario);
$I->wantToTest('user data api');

$I->sendGET('/users');
$I->seeResponseCodeIs(401);

$authKey = $I->getAuthKey('user', 'password');
$I->haveHttpHeader('Authorization', $authKey);
$I->sendGET('/users');
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson([
    [
        'id' => 1,
        'login' => 'user'
    ]
]);